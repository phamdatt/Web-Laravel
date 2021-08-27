@extends('client.layoutsite')
@section('title','Tất cả sản phẩm')
@section('content')

<section class="clearfix maincontent">
    <div class="container">

        <div class="row">
            @section('category')
            @include('pages.mod-category')
            @endsection
        </div>
        <div class="row">
            @foreach($list as $product)

            <div class="col-md-3 my-2">
                <div class="team-area">
                    <div class="single-team">

                        <img src="{{asset('images/'.$product->images)}}" />
                        <div class="team-text">
                            <a href="{{$product->slug}}">
                                <h5>{{$product->name}}</h5>
                            </a>

                            <p>{{number_format($product->price)}}</p>
                            <p>
                                <a onclick="AddCart({{$product->id}})"><i class="fas fa-shopping-cart"></i></a>
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