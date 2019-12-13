<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\dinas;
use App\bidang;

class bidangController extends Controller
{
    public function lihatbidang()
    {
        $data_bidang = bidang::all();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        return view('bidang.vbidang',compact('data_bidang','data_dinas'));
    }

    public function LihatAjax($id){
        if($id==0){
            $data_bidang = bidang::all();
        }else{
            $data_bidang = bidang::where('dinas_id','=',$id )->get();
        }
        return response()->json($data_bidang);

    }

    public function create(Request $request)
    {
        
        \App\bidang::create($request->all());
        return redirect('vbidang')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data_bidang = \App\bidang::find($id);
        $data_dinas = dinas::select('id','nama_dinas')->get();
        
        return view('bidang.edit',['bidang'=>$data_bidang,'data_dinas'=>$data_dinas]);


        //untuk melihat pengambilan data
        //dd($data_bidang);
    }

    public function update(Request $request, $id)
    {
       
        $bidang = \App\bidang::find($id);
        $bidang->update($request->all());
        return redirect('/vbidang')->with('sukses', 'data berhasil diubah');
    }
    public function delete($id)
    {
        $bidang = \App\bidang::find($id);
        $bidang->delete($bidang);
        return redirect('/vbidang')->with('sukses', 'data berhasil dihapus');
        
    }

    public function lihatbidangklik(Request $request, $id)
    {
        $data_bidang = \App\bidang::find($id);
        $data_dinas = dinas::select('id','nama_dinas')->get();
        

        if($id==0){
            $data_bidang = bidang::all();
        }else{
            $data_bidang = bidang::where('dinas_id','=',$id )->get();
            $data_dinas = dinas::where('id',$id )->get();
        }
        return view ('bidang.vbidangklik',['data_bidang' => $data_bidang, 'data_dinas'=>$data_dinas]);
    }



}
