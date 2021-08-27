@extends('client.layoutsite')
@section('title','Đăng Nhập')
@section('content')
<form name="form1" method="POST" action="login">
    <section class="clearfix content">
        <div class="container">
            <h1>Đăng Nhập</h1>
            <input type="hidden" name="_token" value="{{csrf_token()}}">  
            <div class="form-group">
                <label>Tên Đăng Nhập</label>
                <input type="text" name="email" class="form-control" placeholder="Tên Đăng Nhập" />
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Mật Khẩu" />
            </div>

            <div class="form-group">
                <button class="btn btn-success " type="submit">Đăng Nhập</button>
            </div>
            <div class="form-group">
            
            </div>

        </div>

    </section>
</form>
@endsection