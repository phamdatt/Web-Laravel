@extends('client.layoutsite')
@section('title','Tất cả sản phẩm')
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