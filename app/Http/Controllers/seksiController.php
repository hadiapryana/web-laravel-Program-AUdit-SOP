<?php

namespace App\Http\Controllers;

use App\seksi;
use App\dinas;
use App\bidang;
use Illuminate\Http\Request;

class seksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihatseksi()
    {
        $data_seksi = seksi::all();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        return view('seksi.seksi',compact('data_seksi','data_dinas','data_bidang'));
    }

    public function LihatbidangAjax($id){
        if($id==0){
            $data_bidang = bidang::all();
        }else{
            $data_bidang = bidang::where('dinas_id','=',$id )->get();
        }
        return response()->json($data_bidang);

    }

    public function LihatseksiAjax($id){
        if($id==0){
            $data_seksi = seksi::all();
        }else{
            $data_seksi = seksi::where('bidang_id','=',$id )->get();
        }
        return response()->json($data_seksi);
        
        //dd($data_bidang);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        \App\seksi::create($request->all());
        return redirect('vseksi')->with('sukses','Data berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\seksi  $seksi
     * @return \Illuminate\Http\Response
     */
    public function show(seksi $seksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\seksi  $seksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_seksi = \App\seksi::find($id);
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        
        return view('seksi.edit',['seksi'=>$data_seksi,'data_dinas'=>$data_dinas, 'data_bidang'=>$data_bidang]);


        //untuk melihat pengambilan data
        //dd($data_seksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seksi  $seksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_seksi = \App\seksi::find($id);
        $data_seksi->update($request->all());
        return redirect('/vseksi')->with('sukses', 'data berhasil diubah');
    }

    public function delete($id)
    {
        $data_seksi = \App\seksi::find($id);
        $data_seksi->delete($data_seksi);
        return redirect('/vseksi')->with('sukses', 'data berhasil dihapus');
        
    }

    public function lihatseksiklik($id)
    {
        $data_seksi = seksi::all();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        

        if($id==0){
            $data_seksi = seksi::all();
        }else{
            $data_seksi = seksi::where('bidang_id','=',$id )->get();
            $data_bidang = bidang::where('id','=',$id )->get();
        }
        return view ('seksi.seksiklik',['data_seksi' => $data_seksi,'data_dinas' => $data_dinas, 'data_bidang' => $data_bidang]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seksi  $seksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(seksi $seksi)
    {
        //
    }
}
