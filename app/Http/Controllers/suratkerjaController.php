<?php

namespace App\Http\Controllers;

use App\sop;
use App\aktivitas;
use App\surat_kerja;
use Illuminate\Http\Request;

class suratkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihatsurat()
    {
        $data_surat = surat_kerja::all();
        $data_sop = sop::select('id','nama_sop')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_pilihan = surat_kerja::join('aktivitas','surat_kerja.aktivitas_id','=','aktivitas.id')->get();
        $data_pilih = surat_kerja::join('sop','surat_kerja.sop_id','=','sop.id')->get();
        return view('surat_kerja.surat_kerja',compact('data_surat','data_sop','data_aktivitas','data_pilihan','data_pilih'));
    }

    // public function LihatbidangAjax($id){
    //     if($id==0){
    //         $data_bidang = bidang::all();
    //     }else{
    //         $data_bidang = bidang::where('dinas_id','=',$id )->get();
    //     }
    //     return response()->json($data_bidang);

    // }

    // public function LihatseksiAjax($id){
    //     if($id==0){
    //         $data_seksi = seksi::all();
    //     }else{
    //         $data_seksi = seksi::where('bidang_id','=',$id )->get();
    //     }
    //     return response()->json($data_seksi);
        
    //     //dd($data_bidang);

    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create(Request $request)
    {
        \App\surat_kerja::create($request->all());
        return redirect('vsurat')->with('sukses','Data berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\seksi  $seksi
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(seksi $seksi)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\seksi  $seksi
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $data_surat = \App\surat_kerja::find($id);
        $data_sop = sop::select('id','nama_sop')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        
        return view('surat_kerja.edit',['surat_kerja'=>$data_surat,'data_sop'=>$data_sop, 'data_aktivitas'=>$data_aktivitas]);


        //untuk melihat pengambilan data
        //dd($data_seksi);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\seksi  $seksi
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        $data_surat = \App\surat_kerja::find($id);
        $data_surat->update($request->all());
        return redirect('/vsurat')->with('sukses', 'data berhasil diubah');
    }

    public function delete($id)
    {
        $data_surat = \App\surat_kerja::find($id);
        $data_surat->delete($data_surat);
        return redirect('/vsurat')->with('sukses', 'data berhasil dihapus');
        
    }

    // public function lihatseksiklik($id)
    // {
    //     $data_seksi = seksi::all();
    //     $data_dinas = dinas::select('id','nama_dinas')->get();
    //     $data_bidang = bidang::select('id','nama_bidang')->get();
        

    //     if($id==0){
    //         $data_seksi = seksi::all();
    //     }else{
    //         $data_seksi = seksi::where('bidang_id','=',$id )->get();
    //         $data_bidang = bidang::where('id','=',$id )->get();
    //     }
    //     return view ('seksi.seksiklik',['data_seksi' => $data_seksi,'data_dinas' => $data_dinas, 'data_bidang' => $data_bidang]);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\seksi  $seksi
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(seksi $seksi)
    // {
    //     //
    // }
}
