@php 
use App\Models\Product;
use App\Models\Category;
$listcatid = Category::where(['status'=>1,'parentid'=>$catid])->select("id")->get();
$array_catid = array();
foreach($listcatid as $cat1){
$array_catid[]=$cat1->id;

}
$array_catid[] = $catid;
$list= Product::where('status','=',1)->whereIn('catid',$array_catid)->limit(4)->get();

@endphp 
<div class="container">
<div class="row">
 
@foreach($list as $product)
   <div class="col-md-3 my-2 "  >
        <div class="team-area">
            <div class="single-team">

                <img src="{{asset('images/'.$product->images)}}" />
                <div class="team-text">
                    <a href="{{$product->slug}}">
                    <h5>{{$product->name}}</h5>
                    </a>
                   
                    <p>{{number_format($product->price)}}</p>
                    <p>
                        <a  onclick="AddCart({{$product->id}})"><i class="fas fa-shopping-cart"></i></a>
                        
                    </p>
                    
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>

</div>