@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Tin tức
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tắt</th>
                        <th>Thumbnail</th>
                        <th>Loại Tin</th>
                        <th>Views</th>
                        <th>Ranking</th>
                        <th>Ngày tạo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="table_content">
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
         jQuery.extend({
            getValues: function(url) {
                var result = null;
                $.ajax({
                // headers: {
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                url: url,
                type: 'get',
                async: false,
                success: function(data) {
                    result = data;
                },
                error: function(a,b,c){
                    console.log(a);
                    console.log(b);
                    console.log(c);
                } 
        });
       return result;
        }
    });
    var data  = $.getValues('{{route("tintuc.ajax")}}');
    function display(data){
        $('.even gradeD').remove();
        data.forEach(e => {
            var a = 'dcm';
           var str  = '<tr class="even gradeD" align="center"><td>'
           + e.id         + '</td><td>'
           + e.TieuDe     + '</td><td>'
           + e.TomTat     + '</td><td>'
           + e.Hinh       + '</td><td>'
           + e.idLoaiTin  + '</td><td>'
           + e.SoLuotXem  + '</td><td>'
           + e.NoiBat     + '</td><td>'
           + e.created_at + '</td><td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td></tr>';
        $('tbody').append(str);
        });
    }
   display(data);
    </script>
@endsection