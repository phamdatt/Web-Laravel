@extends('client.layoutsite')
@section('title','Dang Ki')
@section('content')
<section class='dangky my-4'>
    <div class="container">
        <div class="row">

            <div class="col-md">
                <h3 class="">Đăng ký khách hàng</h3>
                <form action="{{route('save')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input class="form-control" type="text" name="fullname" required placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input class="form-control" type="text" name="phone" required placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email" required placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Giới tính</label>
                        <select class="form-control" name="gender" id="">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input class="form-control" type="text" name="username" required placeholder="Tên đăng nhập">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" required placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="">Xác nhận lại mật khẩu</label>
                        <input class="form-control" type="password" name="password_con" required placeholder="Xác nhận mật khẩu">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="DANGKY">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection