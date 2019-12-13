<?php

namespace App\Http\Controllers;

use App\jawaban;
use App\sop as sop;
use App\aktivitas;
use App\seksi;
use App\dinas;
use App\bidang;
use PDF;
use Illuminate\Http\Request;

class lihatchartController extends Controller
{
    public function chart()
    {
        $data_jawaban = jawaban::all();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_sop = sop::select('id','nama_sop','versi')->get();
        
        //menyiapkan data untuk chart
        $categories=[];
        $data=[];
        foreach($data_aktivitas as $ak){
         $categories [] = $ak->nama_aktivitas;
        }
        foreach($data_jawaban as $jwb){
            $data [] = $jwb->total;
        }

        //dd(json_encode($categories));

        return view ('pimpinan.lihatchart',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop, 'categories'=>$categories, 'data'=>$data]);
    }
}
