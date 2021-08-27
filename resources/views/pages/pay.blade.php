@extends('client.layoutsite')
@section('title','Thanh Toán')
@section('content')
<section class="clearfix content">
    <div class="container">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
          
                    @csrf
                    <h3>Thong Tin Thanh Toán</h3>

                    <div class="form-group">
                        <label>Ho ten khach hang</label>
                        <input class="form-control" name="name" type="text" readonly value="{{Auth::user()->fullname}}" />
                    </div>
                    <div class="form-group">
                        <label>Dien Thoai</label>
                        <input class="form-control" name="phone" type="text" readonly value="{{Auth::user()->phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="text" readonly value="{{Auth::user()->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Dia Chi</label>
                        <input class="form-control" name="address" type="text"  value="" />
                    </div>
                   
                   
                    <div class="form-group">
                       <button type="submit" class="btn-success btn">Đặt Hàng</button>
                    </div>
           
            </div>
            <div class="col-md-6">
            
            <table class="table table-bordered">

<tr>
    <td class="text-center">Ma</td>
    <td style="width:150px;">Hinh Ảnh</td>
    <td>Ten San Pham</td>
    <td>Gia</td>
    <td style="width:150px;">So Luong</td>
    <td>Thanh Tien</td>
    <td></td>
</tr>

@foreach(Session::get("Cart")->products as $items)
    <tr>
        <td>{{$items['productinfo']->id}}</td>
        <td> <img src="{{asset('images/'.$items['productinfo']->images)}}" class="card-img-top" alt="" ></td>
        <td>{{$items['productinfo']->name}}</td>
        <td>{{number_format($items['productinfo']->price)}}<span>VND</span></td>
        <td><input  class="form-control" type="number" id="qty-{{$items['productinfo']->id}}" value="{{$items['quantity']}}" /></td>
        <td>{{number_format($items['productinfo']->price *$items['quantity'])}}<span>VND</span></td>
    
        

       
    </tr>
    @endforeach


</table>
<div class="col-md-5">

<p>Tam Tinh : <span>{{number_format(Session::get("Cart")->tonggia)}}đ</span></p>
<p>Phí Vân Chuyển: 30,000đ
<p>Thành Tiền :  <span>{{number_format(Session::get("Cart")->tonggia + 30000)}}đ</span></p>
<a href="{{asset('listcart')}}">Quay về giỏ hàng</a>

            </div>



        </div>
        </form>
    </div>

</section>
@endsection