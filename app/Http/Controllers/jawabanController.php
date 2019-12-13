<?php

namespace App\Http\Controllers;
use App\sop;
use App\aktivitas;
use App\jawaban;
use App\seksi;
use App\dinas;
use App\bidang;
use Illuminate\Http\Request;

class jawabanController extends Controller
{
    public function lihatSOPSetelahLogin(){
        $data_sop = sop::all();
       
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_pilihan = sop::join('aktivitas','sop.aktivitas_id','=','aktivitas.id')->get();
        $data_pilBidang = bidang::where('dinas_id','=','1' )->get();
        return view('pengawas.pemantuansop',compact('data_sop','data_dinas','data_bidang','data_seksi',
        'data_aktivitas','data_pilihan','data_pilBidang'));
    }

    public function tambahevaluasi($id)
    {
        $data_sop = \App\sop::find($id);
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        
        return view('pengawas.evaluasi',['sop'=>$data_sop,'data_dinas'=>$data_dinas,'data_seksi'=>$data_seksi,'data_aktivitas'=>$data_aktivitas,'data_bidang'=>$data_bidang]);


        //untuk melihat pengambilan data
        //dd($data_bidang);
    }

    public function create(Request $request)
    {   
        $jawaban= new\App\jawaban;
        $jawaban->aktivitas_id = $request->aktivitas_id;
        $jawaban->sop_id = $request->sop_id;
        $jawaban->tanggal = $request->tanggal;
        $jawaban->jwb1 = $request->jwb1;
        $jawaban->jwb2 = $request->jwb2;
        $jawaban->jwb3 = $request->jwb3;
        $jawaban->jwb4 = $request->jwb4;
        $jawaban->jwb5 = $request->jwb5;
        $jawaban->jwb6 = $request->jwb6;
        $jawaban->jwb7 = $request->jwb7;
        $jawaban->jwb8 = $request->jwb8;
        $jawaban->jwb9 = $request->jwb9;
        $jawaban->jwb10 = $request->jwb10;
        $jawaban->catatan1 = $request->catatan1;
        
        $jawaban->total = $request->jwb1+$request->jwb2+$request->jwb3+$request->jwb4+$request->jwb5+$request->jwb6+$request->jwb7+$request->jwb8+$request->jwb9+$request->jwb10;
        if ($jawaban->total*2/10 <= 5.0){
            $jawaban->hasil = 'tidak sesuai';
        }elseif($jawaban->total*2/10 <= 7.0){
            $jawaban->hasil = 'sesuai';
        }else{
            $jawaban->hasil = 'sangat sesuai';
        }
        $jawaban->save();
        //\App\jawaban::create($request->all());
        return redirect('vpemantuan')->with('sukses','Data berhasil ditambahkan');
    }


    public function lihatjawaban(Request $request, $id)
    {
        $data_jawaban = jawaban::all();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_sop = sop::select('id','nama_sop','versi')->get();
        

        if($id==0){
            $data_jawaban = jawaban::all();
        }else{
            $data_jawaban = jawaban::where('sop_id','=',$id )->get();
            $data_sop = sop::where('id',$id )->get();
        }
        return view ('pengawas.pemantuansophasil',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop]);
    }
    
    public function lihatlaporan()
    {
        $data_jawaban = jawaban::all();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_sop = sop::select('id','nama_sop','versi')->get();
        
        return view ('pengawas.laporan',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop]);
    }

    public function edit($id)
    {
        $data_jawaban = \App\jawaban::find($id);
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_sop = sop::select('id','nama_sop','versi')->get();
        
        return view('pengawas.editevaluasi',['jawaban'=>$data_jawaban,'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop]);


        //untuk melihat pengambilan data
        //dd($data_jawaban);
    }

    public function update(Request $request, $id)
    {
       
        $jawaban = \App\jawaban::find($id);
        $jawaban->jwb1 = $request->jwb1;
        $jawaban->jwb2 = $request->jwb2;
        $jawaban->jwb3 = $request->jwb3;
        $jawaban->jwb4 = $request->jwb4;
        $jawaban->jwb5 = $request->jwb5;
        $jawaban->jwb6 = $request->jwb6;
        $jawaban->jwb7 = $request->jwb7;
        $jawaban->jwb8 = $request->jwb8;
        $jawaban->jwb9 = $request->jwb9;
        $jawaban->jwb10 = $request->jwb10;
        $jawaban->catatan1 = $request->catatan1;
        $jawaban->total = $request->jwb1+$request->jwb2+$request->jwb3+$request->jwb4+$request->jwb5+$request->jwb6+$request->jwb7+$request->jwb8+$request->jwb9+$request->jwb10;
        if ($jawaban->total*2/10 <= 4.0){
            $jawaban->hasil = 'tidak sesuai';
        }elseif($jawaban->total*2/10 > 4.0 && $jawaban->total*2/10 <= 7.0){
            $jawaban->hasil = 'sesuai';
        }else{
            $jawaban->hasil = 'sangat sesuai';
        }
        $jawaban->save();
        return redirect('/vpemantuan')->with('sukses', 'data berhasil diubah');
    }
    public function delete($id)
    {
        $jawaban = \App\jawaban::find($id);
        $jawaban->delete($jawaban);
        return redirect('/vpemantuan')->with('sukses', 'data berhasil dihapus');
        
    }
}
