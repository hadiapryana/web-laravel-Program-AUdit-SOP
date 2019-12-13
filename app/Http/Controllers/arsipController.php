<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class arsipController extends Controller
{
    public function create(Request $request)
    {
       
        \App\arsipsop::create($request->all());
        return redirect('/vdoksop')->with('sukses', 'data berhasil diarsipkan');
        // return $request;
    }
}
