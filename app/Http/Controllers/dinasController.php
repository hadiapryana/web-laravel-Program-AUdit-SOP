<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\dinas;
use App\bidang;

class dinasController extends Controller
{
    public function lihatdinas()
    {
        $data_dinas = \App\dinas::all();

        return view ('dinas.dinas',['data_dinas' => $data_dinas]);
    }

    public function create(Request $request)
    {
        \App\dinas::create($request->all());
        return redirect('vdinas')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dinas = \App\dinas::find($id);
        return view('dinas.edit',['dinas'=>$dinas]);
    
        //untuk melihat pengambilan data
        //
    }

    public function update(Request $request, $id)
    {
       
        $dinas = \App\dinas::find($id);
        $dinas->update($request->all());
        return redirect('/vdinas')->with('sukses', 'data berhasil diubah');
        
            // $data_dinas = \App\dinas::find("id",$id)->update([
            // "nama_dinas", $request->nama_dinas,
            //"kepala_dinas", $request->kepala_dinas,
           // "alamat", $request->alamat,
            //"email", $request->email,
            //"no_telepon", $request->no_telepon]);
            
       
        //dd($dinas);
        
       // return redirect('vdinas')-with('sukses','data berhasil di update');

    }

    public function delete($id)
    {
        $dinas = \App\dinas::find($id);
        $dinas->delete($dinas);
        return redirect('/vdinas')->with('sukses', 'data berhasil dihapus');
        
    }

    


}
