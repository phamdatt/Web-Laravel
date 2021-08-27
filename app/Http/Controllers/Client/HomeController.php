<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Links;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;

class HomeController extends Controller
{
    function home()
    {
        $list = Category::where(['parentid' => 0, 'status' => 1])->orderBy('orders', 'asc')->get();

        return view('pages.home', compact('list'));
    }

    function Getsearch(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->key . '%')->get();
        if ($product != null) {
            return view('pages.search', compact('product'));
        } else {
            return view('pages.home');
        }
    }
    function index($slug = "")
    {
        if ($slug == "") {
            return $this->home();
        } else {
            $row_link = Links::where('slug', $slug);
            if ($row_link->count() > 0) {
                $row = $row_link->first();
                $type = $row->type;
                if ($type == "custom") {
                    return $this->product($slug);
                }
                //loai san pham
                if ($type == "category") {
                    return $this->product_category($slug);
                }
                //chu de bai viet 
                if ($type == "topic") {
                    return $this->post_topic($slug);
                }
                //trang don
                if ($type == "page") {
                    return $this->post_page($slug);
                }
            } else {
                if (Product::where(['status' => 1, 'slug' => $slug])->count() > 0) {
                    return $this->product_detail($slug);
                }
                if (Post::where(['status' => 1, 'slug' => $slug])->count() > 0) {
                    return $this->post_detail($slug);
                }
            }
        }
    }
    function product_category($slug)
    {
        $row_cat = Category::where('slug', $slug)->first();
        $catid = $row_cat->id;
        $title = $row_cat->name;

        $list_cat1 = Category::where(['parentid' => $catid, 'status' => 1])->select("id")->get();
        $arr_catid = array();
        foreach ($list_cat1 as $row_cat1) {
            $arr_catid[] = $row_cat1->id;
            if (Category::where(['parentid' => $catid, 'status' => 1])->count()) {


                $list_cat2 = Category::where(['parentid' => $row_cat1['id'], 'status' => 1])->select("id")->get();
                foreach ($list_cat2 as $row_cat2) {
                    $arr_catid[] = $row_cat2->id;
                    if (Category::where(['parentid' => $row_cat2->id, 'status' => 1])->count()) {
                        $list_cat3 = Category::where(['parentid' => $row_cat2->id, 'status' => 1])->select("id")->get();

                        foreach ($list_cat3 as $row_cat3) {
                            $arr_catid[] = $row_cat3->id;
                        }
                    }
                }
            }
        }
        $arr_catid[] = $catid;



        $list = Product::where(['status' => 1])->whereIn('catid', $arr_catid)
            ->orderBy('create_at', 'desc')
            ->paginate(15);

        return view('pages.product-category', compact('list'));
    }
    function product_detail($slug)
    {
        $row = Product::where('slug', $slug)->first();
        $catid = $row->catid;
        $id = $row->id;
        $list_cat1 = Category::where(['parentid' => $catid, 'status' => 1])->select("id")->get();
        $arr_catid = array();
        foreach ($list_cat1 as $row_cat1) {
            $arr_catid[] = $row_cat1->id;
            if (Category::where(['parentid' => $catid, 'status' => 1])->count()) {


                $list_cat2 = Category::where(['parentid' => $row_cat1['id'], 'status' => 1])->select("id")->get();
                foreach ($list_cat2 as $row_cat2) {
                    $arr_catid[] = $row_cat2->id;
                    if (Category::where(['parentid' => $row_cat2->id, 'status' => 1])->count()) {
                        $list_cat3 = Category::where(['parentid' => $row_cat2->id, 'status' => 1])->select("id")->get();

                        foreach ($list_cat3 as $row_cat3) {
                            $arr_catid[] = $row_cat3->id;
                        }
                    }
                }
            }
        }
        $arr_catid[] = $catid;


        $list_other = Product::where([['status', '=', '1'], ['id', '!=', $id]])->whereIn('catid', $arr_catid)->orderBy('create_at', 'desc')
            ->limit(8)->get();
        return view('pages.product-detail', compact('list_other', 'row'));
    }
    private function post_topic($slug)
    {
        $row_cat = Topic::where('slug', $slug)->first();
        $catid = $row_cat->id;
        $title = $row_cat->name;

        $list_cat1 = Topic::where(['parentid' => $catid, 'status' => 1])->select("id")->get();
        $arr_catid = array();
        foreach ($list_cat1 as $row_cat1) {
            $arr_catid[] = $row_cat1->id;
            if (Topic::where(['parentid' => $catid, 'status' => 1])->count()) {


                $list_cat2 = Topic::where(['parentid' => $row_cat1['id'], 'status' => 1])->select("id")->get();
                foreach ($list_cat2 as $row_cat2) {
                    $arr_catid[] = $row_cat2->id;
                    if (Topic::where(['parentid' => $row_cat2->id, 'status' => 1])->count()) {
                        $list_cat3 = Topic::where(['parentid' => $row_cat2->id, 'status' => 1])->select("id")->get();

                        foreach ($list_cat3 as $row_cat3) {
                            $arr_catid[] = $row_cat3->id;
                        }
                    }
                }
            }
        }
        $arr_catid[] = $catid;
        $list = Post::where(['status' => 1])->whereIn('topid', $arr_catid)
            ->orderBy('created_at', 'desc')
            ->paginate(8);



        return view('pages.post-category', compact('list'));
    }
    function post_page($slug)
    {

        $list = Post::where(['status' => 1, 'type' => 'page', 'slug' => $slug])->first();
        return view('pages.page-category', compact('list'));
    }

    private function post_detail($slug)
    {


        $post = Post::where('slug', $slug)->first();

        return view('pages.post-detail', compact('post'));
    }
    function product($slug)
    {
        $list = Product::all();



        return view('pages.allProduct', compact('list'));
    }
}
