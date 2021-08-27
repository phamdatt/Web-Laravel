@extends('admin.layoutsite')
@section('title','Tất Cả Menu')
@section('content')
<section>

    <div class="content-wrapper my-2">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Danh Sách Menu</strong>
                    </h3>

                    <div class="card-tools">
                        <a class="btn btn-sm btn-success" href=""><i class="fas fa-plus"></i> Thêm mới</a>
                        <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i> Thùng rác</a>

                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Menu</th>
                                <th scope="col">Kiểu Menu</th>
                                <th scope="col">Link</th>
                                <th style="width:200px;">Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($list as $row)
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->type}}</td>
                                <td>{{$row->link}}</td>
                                <td>
                                    @if($row->status==1)
                                    <a class="btn btn-sm btn-success" href=""><i class="fas fa-toggle-on"></i></a>
                                    @else
                                    <a class="btn btn-sm btn-danger" href=""><i class="fas fa-toggle-off"></i></a>
                                    @endif
                                    <a class="btn btn-sm btn-info" href=""><i class="fas fa-edit"></i></a>

                                    <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->


    </div>
</section>

@endsection