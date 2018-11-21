@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    
                    <form action="{{route('tintuc.store')}}" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Loại Tin</label>
                            <select class="form-control" id="loaitin" name="idLoaiTin">
                                
                                @foreach ($model as $l)
                            <option value="{{$l->id}}">{{$l->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="tieude" placeholder="Nhập tiêu đề" required/>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề (Không dấu)</label>
                            <input class="form-control" name="tieude_khongdau" placeholder="Tiêu đề không dấu" required/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <input class="form-control" name="tomtat" placeholder="Tóm tắt" required/>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" name="noidung" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control-file" name="Hinh" id="Hinh" required/>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection