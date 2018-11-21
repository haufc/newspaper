<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TinTuc;
use Response;
use DB;
use Vmorozov\FileUploads\Uploader;
class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.tintuc.index');
    }
    public function index_ajax()
    {
        
        $model  = TinTuc::all('id','TieuDe','TomTat','SoLuotXem','idLoaiTin','NoiBat','Hinh','created_at');
        return Response::json($model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $model = LoaiTin::all('Ten','id')->get();
        $model =DB::table('loaitin')->get();
       return view('admin.tintuc.create',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $model = new TinTuc;
       $model->Hinh = Uploader::uploadFile($request->file('Hinh'), 'upload/tintuc');
       $model->TieuDe = $request->tieude;
       $model->TieuDeKhongDau = $request->tieude_khongdau;
       $model->TomTat = $request->tomtat;
       $model->Noidung = $request->noidung;
       $model->NoiBat = 1;
       $model->SoLuotXem = 0;
       $model->idLoaiTin = $request->idLoaiTin;
       $model->save();
       return back();
       
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
        return view('admin.tintuc.edit');
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
