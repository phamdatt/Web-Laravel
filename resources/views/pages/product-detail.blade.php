@extends('client.layoutsite')
@section('title','Chi Tiết Sản Phẩm')
@section('content')
<section>
  <div class="container">

    <div class="row">
      <div class="col-md-4">
        <div class="tab-container">

          <img src="{{asset('images/'.$row->images)}}" class="card-img-top" alt="...">
        </div>
      </div>
      <div class="col-md-6">
        <h4>{{$row->name}}</h3>

          <h4 class="card-price" style="margin-top:30px;margin-bottom:30px;">Giá: {{number_format($row->price)}}<sup>VNĐ</sup></h4>

          <input class="form-control" type="number" value="1" min="1" max="10" id="qty" style="width:100px;" />
          <button onclick="AddCart({{$row->id}})" class="btn-muahang">Mua Hang</button>
          <p class="coppyRight">
            HADES™ ✦ STREETWEAR BRAND LIMITED ✦

          </p>
          <p>
            Copyright © 2021 Hades. All rights reserved.
          </p>



      </div>
    </div>

    <h3>Sản Phẩm Cùng Loại</h3>
    <div class="row">
      @foreach($list_other as $items)
      <div class="col-md-3">

        <div class="team-area">
          <div class="single-team">

            <img src="{{asset('images/'.$items->images)}}" />
            <div class="team-text">
              <a href="{{$items->slug}}">
                <h5>{{$items->name}}</h5>
              </a>
              <p>{{number_format($items->price)}}</p>
              <p>
                <a onclick="AddCart({{$items->id}})"><i class="fas fa-shopping-cart"></i></a>

              </p>
            </div>
          </div>
        </div>


      </div>
      @endforeach
    </div>
  </div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

<script type="text/javascript">
  $(function() {
    $(".js-update-items").click(function(event) {
      event.preventDefault();
      let $this = $(this);

      let url = $this.attr('href');
      let qty = $("#qty").val();
      let idProduct = $this.attr('data-id-product');
      if (url) {
        $.ajax({
            url: url,
            data: {
              qty: qty,
              idProduct: idProduct
            }

          })
          .done(function(results) {
            location.reload();
            alert(results.messages);
          });
      }


    })
  })
</script>
@endsection