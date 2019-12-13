<?php

namespace App\Http\Controllers;
use App\aktivitas;
use App\seksi;
use App\dinas;
use App\bidang;
use Illuminate\Http\Request;

class aktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihataktivitas()
    {
        $data_aktivitas = aktivitas::all();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
      
        return view('aktivitas.aktivitas',compact('data_aktivitas','data_dinas','data_bidang','data_seksi'));
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
        \App\aktivitas::create($request->all());
        //dd($aktivitas);
       return redirect('vaktivitas')->with('sukses','Data berhasil ditambahkan');
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
        $data_aktivitas = \App\aktivitas::find($id);
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        
        return view('aktivitas.edit',['aktivitas'=>$data_aktivitas,'data_dinas'=>$data_dinas, 'data_bidang'=>$data_bidang, 'data_seksi'=>$data_seksi]);


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
        $data_aktivitas = \App\aktivitas::find($id);
        $data_aktivitas->update($request->all());
        return redirect('/vaktivitas')->with('sukses', 'data berhasil diubah');
    }

    public function delete($id)
    {
        $data_aktivitas = \App\aktivitas::find($id);
        $data_aktivitas->delete($data_aktivitas);
        return redirect('/vaktivitas')->with('sukses', 'data berhasil dihapus');
        
    }

    public function lihataktivitasklik($id)
    {
        $data_aktivitas = aktivitas::all();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        

        if($id==0){
            $data_aktivitas = aktivitas::all();
        }else{
            $data_aktivitas = aktivitas::where('aktivitas_id','=',$id )->get();
        }
        return view ('aktivitas.aktivitasklik',['data_aktivitas' => $data_aktivitas,'data_dinas' => $data_dinas, 'data_bidang' => $data_bidang,'data_seksi' => $data_seksi]);
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
