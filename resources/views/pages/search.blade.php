@extends('client.layoutsite')
@section('title','Tìm Kiếm')
@section('content')
<section class="content">
    <div class="container">
      @if(count($product))
      <h4 class="text-center">Tất cả sản phẩm tìm kiếm</h4>
      @else
      <h4 class="text-center">Không có sản phẩm này </h4>
      @endif
        <div class="row">

    @foreach($product as $search)
    <div class="col-md-3 my-2" >
        <div class="team-area">
            <div class="single-team">

                <img src="{{asset('images/'.$search->images)}}" />
                <div class="team-text">
                    <h5>{{$search->name}}</h5>
                    <p>{{number_format($search->price)}}</p>
                    <p>
                        <a href="{{url('/Add-Cart/'.$search->id)}}"><i class="fas fa-shopping-cart"></i></a>
                        
                    </p>
                </div>
            </div>
        </div>
    </div>

@endforeach
    </div>
    
    </div>
</section>
@endsection