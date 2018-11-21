<?php

namespace App\Http\Controllers\Admin;

use App\LoaiTin;
use App\TheLoai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = LoaiTin::all();
        return view('admin.loaitin.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = DB::table('theloai')->get();
        return view('admin.loaitin.create',compact('model'));
        //
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
        $model = new LoaiTin();
        $model->Ten = $request->Ten;
        $model->TenKhongDau= $request->TenKhongDau;
        $model->idTheLoai= $request->idTheLoai;
        $model->save();
        return back()->with('thongbao');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
