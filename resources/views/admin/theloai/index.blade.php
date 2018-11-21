@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Danh sách</small>
                    </h1>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success"> {{session('thongbao')}}</div>
                    @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên thể loại</th>
                        <th>Tên không dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--<tr class="odd gradeX" align="center">--}}
                        {{--<td>1</td>--}}
                        {{--<td>Tin Tức</td>--}}
                        {{--<td>None</td>--}}
                        {{--<td>Hiện</td>--}}
                        {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>--}}
                        {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>--}}
                    {{--</tr>--}}
                    {{--<tr class="even gradeC" align="center">--}}
                        {{--<td>2</td>--}}
                        {{--<td>Bóng Đá</td>--}}
                        {{--<td>Thể Thao</td>--}}
                        {{--<td>Ẩn</td>--}}
                        {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>--}}
                        {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>--}}
                    {{--</tr>--}}
                    @foreach($data as $item)
                        <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->Ten}}</td>
                        <td>{{$item->TenKhongDau}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('theloai.destroy',$item->id)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('theloai.edit',$item->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection