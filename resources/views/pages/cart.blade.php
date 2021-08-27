@extends('client.layoutsite')
@section('title','Giỏ Hàng')
@section('content')

@if(Session::has("Cart") !=null)
<section class="content">
<div class="container">
<div class="row">
    <div class="col-md-12 " id="list-cart">
    <table class="table table-bordered">

<tr>
    <td class="text-center">Ma</td>
    <td style="width:150px;">Hinh Ảnh</td>
    <td>Ten San Pham</td>
    <td>Gia</td>
    <td>So Luong</td>
    <td>Thanh Tien</td>
    <td>Cập Nhật</td>
</tr>

@foreach(Session::get("Cart")->products as $items)
    <tr>
        <td>{{$items['productinfo']->id}}</td>
        <td> <img src="{{asset('images/'.$items['productinfo']->images)}}" class="card-img-top" alt=""></td>
        <td>{{$items['productinfo']->name}}</td>
        <td>{{number_format($items['productinfo']->price)}}<span>VND</span></td>
        <td><input  class="form-control" type="number" id="qty-{{$items['productinfo']->id}}" value="{{$items['quantity']}}" /></td>
        <td>{{number_format($items['productinfo']->price *$items['quantity'])}}<span>VND</span></td>
        <td>
        <i class="fas fa-edit" onclick="UpdateCart({{$items['productinfo']->id}})"></i>

        </td>
        

        <td>
            <a href="{{url('/Delete-Cart/'.$items['productinfo']->id)}}" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
    @endforeach


   

</table>
    </div>
</div>
<a href="{{route('pay')}}" class="btn-success btn">Thanh Toan</a>
     

       
               
             
          
            @else
            <div class="row">
            <img src="{{asset('images/gh.jpeg')}}" style=" margin-left: auto;
  margin-right: auto;"/>
               
            </div>
            <h5 class="text-center">giỏ hàng rỗng</h5>
       
        
            @endif
           

       
    </div>

            <script>
                function UpdateCart(id) {
    
    $.ajax({
        url:'Update-Cart/' +id+'/'+$("#qty-"+id).val(),    
        type:'GET',

    }).done(function(response){
        RenderListCart(response);
        alertify.success("Cap nhat thanh cong");
    });
}

function RenderListCart(response) {
    $("#list-cart").empty();
    $("#list-cart").html(response);

}

            </script>
        

          
</section>


@endsection
