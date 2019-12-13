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

class pimpinanController extends Controller
{
    public function lihatlaporanpimpinan()
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

        return view ('pimpinan.lihatlaporan',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop, 'categories'=>$categories, 'data'=>$data]);
    }

    public function lihatchart()
    {
        $data_jawaban = jawaban::all();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_sop = sop::select('id','nama_sop','versi')->get();
        



        
        //menyiapkan data untuk chart
        $categories=[];
        $data6=[];$data7=[];$data8=[];$data9=[];$data10=[];$data11=[];$data12=[];$data13=[];$data14=[];$data15=[];$data16=[];$data17=[];$data18=[];$data19=[];$data20=[];
        $datap7=0;$datap7s=0;$datap10=0;$datap10s=0;$datap13=0;$datap13s=0;$datap14=0;$datap14s=0; $datap15=0;$datap15s=0;$datap16=0;$datap16s=0;$datap18=0;$datap18s=0;$datap19=0;$datap19s=0; $datap20=0;$datap20s=0;   
        foreach($data_aktivitas as $ak){
        $series [] = $ak->nama_aktivitas;
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 6){ 
                $cek = $jwb->aktivitas_id;
                $data6 [] = $jwb->total;
                $datap6 = jawaban::where('aktivitas_id','=','6' )->orderBy('total', 'desc')->limit(1)->get();
                $datap6s = jawaban::where('aktivitas_id','=','6' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 7){ 
                $data7 [] = $jwb->total;
                $datap7 = jawaban::where('aktivitas_id','=','7' )->orderBy('total', 'desc')->limit(1)->get();
                $datap7s = jawaban::where('aktivitas_id','=','7' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 8){ 
                $data8 [] = $jwb->total;
                $datap8 = jawaban::where('aktivitas_id','=','8' )->orderBy('total', 'desc')->limit(1)->get();
                $datap8s = jawaban::where('aktivitas_id','=','8' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 9){ 
                $data9 [] = $jwb->total;
                $datap9 = jawaban::where('aktivitas_id','=','9' )->orderBy('total', 'desc')->limit(1)->get();
                $datap9s = jawaban::where('aktivitas_id','=','9' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 10){ 
                $data10 [] = $jwb->total;
                $datap10 = jawaban::where('aktivitas_id','=','10' )->orderBy('total', 'desc')->limit(1)->get();
                $datap10s = jawaban::where('aktivitas_id','=','10' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 11){ 
                $data11 [] = $jwb->total;
                $datap11 = jawaban::where('aktivitas_id','=','11' )->orderBy('total', 'desc')->limit(1)->get();
                $datap11s = jawaban::where('aktivitas_id','=','11' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 12){ 
                $data12 [] = $jwb->total;
                $datap12 = jawaban::where('aktivitas_id','=','12' )->orderBy('total', 'desc')->limit(1)->get();
                $datap12s = jawaban::where('aktivitas_id','=','12' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 13){ 
                $data13 [] = $jwb->total;
                $datap13 = jawaban::where('aktivitas_id','=','13' )->orderBy('total', 'desc')->limit(1)->get();
                $datap13s = jawaban::where('aktivitas_id','=','13' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 14){ 
                $data14 [] = $jwb->total;
                $datap14 = jawaban::where('aktivitas_id','=','14' )->orderBy('total', 'desc')->limit(1)->get();
                $datap14s = jawaban::where('aktivitas_id','=','14' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 15){ 
                $data15 [] = $jwb->total;
                $datap15 = jawaban::where('aktivitas_id','=','15' )->orderBy('total', 'desc')->limit(1)->get();
                $datap15s = jawaban::where('aktivitas_id','=','15' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 16){ 
                $data16 [] = $jwb->total;
                $datap16 = jawaban::where('aktivitas_id','=','16' )->orderBy('total', 'desc')->limit(1)->get();
                $datap16s = jawaban::where('aktivitas_id','=','16' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 17){ 
                $data17 [] = $jwb->total;
                $datap17 = jawaban::where('aktivitas_id','=','17' )->orderBy('total', 'desc')->limit(1)->get();
                $datap17s = jawaban::where('aktivitas_id','=','17' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 18){ 
                $data18 [] = $jwb->total;
                $datap18 = jawaban::where('aktivitas_id','=','18' )->orderBy('total', 'desc')->limit(1)->get();
                $datap18s = jawaban::where('aktivitas_id','=','18' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 19){ 
                $data19 [] = $jwb->total;
                $datap19 = jawaban::where('aktivitas_id','=','19' )->orderBy('total', 'desc')->limit(1)->get();
                $datap19s = jawaban::where('aktivitas_id','=','19' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        foreach($data_jawaban as $jwb ){
            if($jwb->aktivitas_id == 20){ 
                $data20 [] = $jwb->total;
                $datap19 = jawaban::where('aktivitas_id','=','20' )->orderBy('total', 'desc')->limit(1)->get();
                $datap19s = jawaban::where('aktivitas_id','=','20' )->orderBy('total', 'asc')->limit(1)->get();
            }
            
        }
        
        

        //Pemanggilan data di view
        //{!!json_encode($data)!!}

        //dd(json_encode($data));

        return view ('pimpinan.lihatchart',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop, 'series'=>$series,
         'data6'=>$data6,
         'data7'=>$data7,
         'data8'=>$data8,
         'data9'=>$data9,
         'data10'=>$data10,
         'data11'=>$data11,
         'data12'=>$data12,
         'data13'=>$data13,
         'data14'=>$data14,
         'data15'=>$data15,
         'data16'=>$data16,
         'data17'=>$data17,
         'data18'=>$data18,
         'data19'=>$data19,
         'data20'=>$data20,
         'datap6'=>$datap6,
         'datap6s'=>$datap6s,
         'datap7'=>$datap7,
         'datap7s'=>$datap7s,
         'datap8'=>$datap8,
         'datap8s'=>$datap8s,
         'datap9'=>$datap9,
         'datap9s'=>$datap9s,
         'datap10'=>$datap10,
         'datap10s'=>$datap10s,
         'datap11'=>$datap11,
         'datap11s'=>$datap11s,
         'datap12'=>$datap12,
         'datap12s'=>$datap12s,
         'datap13'=>$datap13,
         'datap13s'=>$datap13s,
         'datap14'=>$datap14,
         'datap14s'=>$datap14s,
         'datap15'=>$datap15,
         'datap15s'=>$datap15s,
         'datap16'=>$datap16,
         'datap16s'=>$datap16s,
         'datap17'=>$datap17,
         'datap17s'=>$datap17s,
         'datap18'=>$datap18,
         'datap18s'=>$datap18s,
         'datap19'=>$datap19,
         'datap19s'=>$datap19s,
         'datap20'=>$datap20,
         'datap20s'=>$datap20s]);
         
         
     }

    public function LihatAjaxp($id){
        if($id==0){
            $data_jawaban = jawaban::all();
        }else{
            $data_jawaban = jawaban::with('aktivitas','sop')->where('aktivitas_id','=',$id )->get();
            
        }
        return response()->json($data_jawaban);

    }
    
	public function cetak_pdf()
{
	
    //return 'text';
    
    $data_jawaban = jawaban::all();
    $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
    $data_sop = sop::select('id','nama_sop','versi')->get();
    
    //dd($data_jawaban);
    $pdf = PDF::loadview('pimpinan.lihatlaporan_pdf', compact('data_jawaban','data_aktivitas','data_sop'));
    return $pdf->download('laporan_'.date('Y-m-d-H-i-s').'.pdf');
 
	//$pdf = PDF::loadview('pimpinan.lihatlaporan_pdf',['data_jawaban'=>$data_jawaban,'data_aktivitas'=>$data_aktivitas]);
    //return ($pdf)->download('lihatlaporan_pdf');
    
}

public function pdf_id($id)
{
	
    //return 'text';
    
    $data_jawaban = jawaban::find($id);
    $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
    $data_sop = sop::select('id','nama_sop','versi')->get();
    

    //dd($data_jawaban);
    $pdf = PDF::loadview('pimpinan.laporanid', compact('data_jawaban','data_aktivitas','data_sop'));
    return $pdf->download('laporan_'.date('Y-m-d-H-i-s').'.pdf');
 
	//$pdf = PDF::loadview('pimpinan.lihatlaporan_pdf',['data_jawaban'=>$data_jawaban,'data_aktivitas'=>$data_aktivitas]);
    //return ($pdf)->download('lihatlaporan_pdf');
    
}

public function pdf_aktivitas($aktivitas_id)
{
	
    //return 'text';
    
    $data_jawaban = jawaban::find($aktivias_id);
    $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
    $data_sop = sop::select('id','nama_sop','versi')->get();
    

    //dd($data_jawaban);
    $pdf = PDF::loadview('pimpinan.laporanid', compact('data_jawaban','data_aktivitas','data_sop'));
    return $pdf->download('laporan_'.date('Y-m-d-H-i-s').'.pdf');
 
	//$pdf = PDF::loadview('pimpinan.lihatlaporan_pdf',['data_jawaban'=>$data_jawaban,'data_aktivitas'=>$data_aktivitas]);
    //return ($pdf)->download('lihatlaporan_pdf');
    
}

public function lihatlaporan_pdf()
    {
        $data_jawaban = jawaban::all();
        $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
        $data_sop = sop::select('id','nama_sop','versi')->get();
        
        return view ('pimpinan.lihatlaporan_pdf',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop]);
    }

public function ambilbulan(Request $request)
 {
     
         $from = $request->from;
         $to = $request->to;
         $data_jawaban = jawaban::whereBetween('tanggal',[$from,$to] )->get();
         $data_aktivitas = aktivitas::select('id','nama_aktivitas')->get();
         $data_sop = sop::select('id','nama_sop','versi')->get();
     
        return view ('pimpinan.laporanperiode',['data_jawaban' => $data_jawaban, 'data_aktivitas'=>$data_aktivitas, 'data_sop'=>$data_sop]);

     
     //dd($from);
     }

}

