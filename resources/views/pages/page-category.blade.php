@extends('client.layoutsite')
@section('title','Giới Thiệu')
@section('slider')
@include('pages.mod-slider')
@endsection
@section('content')
<section class="clearfix content">
    <div class="container">
        <div class="row">

            <div class="col-md tab-container">
                <h5>{{$list->name}}</h5>

                {!!$list->detai!!}



            </div>


        </div>
    </div>
</section>
@endsection