@extends('client.layoutsite')
@section('title','Trang Chủ')
@section('slider')
@include('pages.mod-slider')
@endsection
@section('category')
@include('pages.mod-category')
@endsection
@section('content')
<section class="content">
@foreach($list as $cat)

@includeIf('pages.product',['catid'=>$cat->id])
@endforeach
</section>
@endsection
