<?php

namespace App\Http\Controllers;
use App\sop as sop;
use App\aktivitas;
use App\seksi;
use App\dinas;
use App\bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Storage;

class GController extends Controller
{
    public function lihatsopp(){
        $data_sop = sop::all();
       
        $data_dinas = dinas::select('id','nama_dinas')->get();
        $data_bidang = bidang::select('id','nama_bidang')->get();
        $data_seksi = seksi::select('id','nama_seksi')->get();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_pilihan = sop::join('aktivitas','sop.aktivitas_id','=','aktivitas.id')->get();
        return view('home.vsop',compact('data_sop','data_dinas','data_bidang','data_seksi','data_aktivitas','data_pilihan'));
    }

    public function downloadd($id){
        // $data_sop = sop :: select('id','file')->get();
        // return view ('kelolaSOP.sop', compact('data_sop'));

        $data_sop = sop::find($id);

        $filename = $data_sop->file;

        $fileUrl = "/public/uploads/" . $filename;
        $data = Storage::get($fileUrl);

        echo $data;
        //$response = Response::make($data, 200);
       // $response->header('Content-Type', 'application/pdf');

        
        return $response;
    }
}
