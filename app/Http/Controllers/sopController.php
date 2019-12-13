<?php

namespace App\Http\Controllers;
use App\sop as sop;
use App\user;
use App\aktivitas;
use App\seksi;
use App\dinas;
use App\bidang;
use App\arsipsop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Storage;

class sopController extends Controller
{
    public function lihatsop(){
        $data_sop = sop::where('dinas_id', '=', $user->dinas_id)->get();
        $data_user = user::select('dinas_id')->get();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_pilihan = sop::join('aktivitas','sop.aktivitas_id','=','aktivitas.id')->get();
        return view('home.vsop',compact('data_sop','data_dinas','data_bidang','data_seksi','data_aktivitas','data_pilihan'));
    }

    public function lihatSOPSetelahLogin(){
        $data_user = user::select('id','dinas_id','role')->get();
        
        $data_sop = sop::where('dinas_id','=', '1')->get();
        
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_pilihan = sop::join('aktivitas','sop.aktivitas_id','=','aktivitas.id')->get();
        $data_pilBidang = bidang::where('dinas_id','=','1' )->get();
        return view('kelolaSOP.sop',compact('data_sop','data_dinas','data_bidang','data_seksi',
        'data_aktivitas','data_pilihan','data_pilBidang'));
    }

    public function create(Request $request)
    {    
        $fileUrl = 'public/uploads/';
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs($fileUrl,$fileName);

		sop::create([
			
            'keterangan' => $request->keterangan,
            'dinas_id'=> $request->dinas_id,
            'bidang_id' => $request->bidang_id,
            'seksi_id' => $request->seksi_id,
            'aktivitas_id' => $request->aktivitas_id,
            'nama_sop' => $request->nama_sop,
            'file' => $request->file('file')->getClientOriginalName(),
            'versi' => $request->versi,
            'status' => $request->status,
            'tgl_penetapan' => $request->tgl_penetapan,
            'tgl_pemberhentian' => $request->tgl_pemberhentian,
            'keterangan' => $request->keterangan,
		]);
 
		
        //\App\sop::create($request->all());
        //$request->file->store('public/file_upload');
        return redirect('vdoksop')->with('sukses','Data berhasil ditambahkan');
    }
        
        
        //\App\sop::create($request->all());
        //return redirect('vdoksop')->with('sukses','Data berhasil ditambahkan')

    

    // public function lihatbidang(){
    //     $data_pilBidang = bidang::where('dinas_id','=','1' )->get();
    // }

    public function edit($id)
    {
        $data_sop = \App\sop::find($id);
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        
        return view('kelolaSOP.edit',['sop'=>$data_sop,'data_dinas'=>$data_dinas,'data_seksi'=>$data_seksi,'data_aktivitas'=>$data_aktivitas,'data_bidang'=>$data_bidang]);

    }

        //untuk melihat pengambilan data
        //dd($data_bidang);
        public function arsip($id)
        {
            $data_sop = \App\sop::find($id);
            $data_dinas = dinas::select('id','nama_dinas')->get();
            $data_bidang = bidang::select('id','nama_bidang')->get();
            $data_seksi = seksi::select('id','nama_seksi')->get();
            $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
            $data_dinas = dinas::select('id','nama_dinas')->get();
            
            return view('kelolaSOP.arsip',['sop'=>$data_sop,'data_dinas'=>$data_dinas,'data_seksi'=>$data_seksi,'data_aktivitas'=>$data_aktivitas,'data_bidang'=>$data_bidang]);
    
    
            //untuk melihat pengambilan data
            //dd($data_bidang);
        }
    
    public function update(Request $request, $id)
    {
       
        $sop = \App\sop::find($id);
        $sop->update($request->all());
        return redirect('/vdoksop')->with('sukses', 'data berhasil diubah');
    }

    public function download($id){
        // $data_sop = sop :: select('id','file')->get();
        // return view ('kelolaSOP.sop', compact('data_sop'));

        $data_sop = sop::find($id);

        $filename = $data_sop->file;

        $fileUrl = "/public/uploads/" . $filename;
        $data = Storage::get($fileUrl);

        // echo $data;
        $response = Response::make($data, 200);
        $response->header('Content-Type', 'application/pdf');

        
        return $response;
    }

    public function delete($id)
    {
        $data_sop = \App\sop::find($id);
        $data_sop->delete($data_sop);
        return redirect('/vdoksop')->with('sukses', 'data berhasil dihapus');
        
    }
    
    
}
