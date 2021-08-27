@php
use App\Models\Slider;
$slider1= Slider::where(['status'=>1,'position'=>'slideshow'])->orderBy('create_at','desc')->get();
@endphp 
<div class="col-md">


<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  @foreach($slider1 as $sl)
    <div class="carousel-item active">
   
        <img src="{{asset('images/'.$sl->images)}}" class="d-block w-100" alt="...">
 
    </div>
    @endforeach
  </div>
</div>
</div>