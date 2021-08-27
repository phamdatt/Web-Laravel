<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Cart;
use Session;
use App\Models\User;
use Carbon\Carbon;

class CartController extends Controller
{
    function show(){
        return view('pages.cart');
    }
    function AddCart(Request $req,$id) {
        $list =Product::where('id',$id)->first();
        if($list !=null)
        {
           $oldCart = Session("Cart") ? Session("Cart") :null;
           $newCart = new Cart($oldCart);
           $newCart->AddCart($list,$id);
           $req->session()->put("Cart",$newCart);
        }else{
            echo "gio hang rong";

        }
        return redirect('listcart');

    } 
    function DeleteCart(Request $req,$id) {
        $oldCart = Session("Cart") ? Session("Cart") :null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products)>0){
            $req->Session()->put("Cart",$newCart);
        }else{
            $req->Session()->forget("Cart");
        }
        return back();
    }
    function UpdateCart(Request $req,$id,$quantity) {
        $oldCart = Session("Cart") ? Session("Cart") : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateCart($id,$quantity);
        $req->Session()->put("Cart",$newCart);
    return view("pages.cart",compact("newCart"));
        
    }
    function getPay() {
        if(Auth::check()==null){
            return view('pages.customer-login');
           
        }else{
            return view('pages.pay');
        } 
     
    }
    function saveinfoCart(Request $request) {
        $user = new User();
        $order = new Order();
        $orderdetail = new OrderDetail();
        $product = Session::get("Cart")->products ;
        $list =array([
            $order->userid =Auth::user()->id,
            $order->name=$request->name,
            $order->email=$request->email,
            $order->phone=$request->phone,
            $order->adress=$request->address,
            $order->updated_at=Carbon::now(),
            $order->created_at=Carbon::now()
        ]);
        $order->save();
        if($list){    
            $product = Session::get("Cart")->products ;
            foreach($product as $items){
                    $orderdetail->orderid =$order->id;
                    $orderdetail->productid = $items['productinfo']->id;
                    $orderdetail->price =$items['productinfo']->price;
                    $orderdetail->quantity =$items['quantity'];
                    $orderdetail->amount =$items['productinfo']->price *$items['quantity'];
                    $orderdetail->updated_at=Carbon::now();
                    $orderdetail->created_at=Carbon::now();

                $orderdetail->save();
                       
            }   
     
        }
        $request->session()->forget("Cart");
        return redirect('/');
      
      
 
    }
  
}
