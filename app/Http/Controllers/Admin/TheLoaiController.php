<?php

namespace App\Http\Controllers\Admin;

use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TheLoai::all(); //ham lay tat ca cac the loai
        return view('admin.theloai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'Ten'=>'required|min:3|max:100',
        ],['Ten.required'=>'Bạn chưa nhập tên','Ten.min'=>'Tên phải có từ 3 ký tự','Ten.max'=>'Tên phải ngắn hơn 100 ký tự']);
        $model = new TheLoai();
        $model->Ten = $request->Ten;
        $model->TenKhongDau= $request->TenKhongDau;
        $model->save();
        return back()->with('thongbao','Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = TheLoai::find($id);
       return view('admin.theloai.edit',['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = TheLoai::find($id);
        $this->validate($request,[
            'Ten'=>'required|min:3|max:100',
        ],['Ten.required'=>'Bạn chưa nhập tên','Ten.min'=>'Tên phải có từ 3 ký tự','Ten.max'=>'Tên phải ngắn hơn 100 ký tự']);
        $model->Ten = $request->Ten;
        $model->TenKhongDau= $request->TenKhongDau;
        $model->save();
        return redirect('admin/theloai/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $listLT = DB::table('loaitin')->where('idTheLoai',$id)->get();
        foreach ($listLT as $item){
            DB::table('tintuc')->where('idLoaiTin',$item->id)->delete();
    }
        DB::table('loaitin')->where('idTheLoai',$id)->delete();
        DB::table('theloai')->where('id',$id)->delete();
        return back();
    }
}
