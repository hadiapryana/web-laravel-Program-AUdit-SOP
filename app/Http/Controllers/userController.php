<?php

namespace App\Http\Controllers;
use Crypt;
use App\user;
use App\dinas;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function lihatuser()
    {
        
        $data_user = \App\user::all();
        $data_dinas = dinas::select('id','nama_dinas')->get();
        //foreach ($data_user as $row)
        //{
         //    Crypt::decrypt($row->password);
       // }   

        return view ('auths.user',['data_user' => $data_user, 'data_dinas'=>$data_dinas]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'password'=> 'required|min:6|confirmed'

        ]);
        
        \App\user::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'username' => $request->username,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'role' => $request->role,
            'dinas_id' => $request->dinas_id,
            'password' => bcrypt($request->password)
        ]);
        return redirect('vuser')->with('sukses','Data berhasil ditambahkan');
        //return $request;
    }

    public function edit($id)
    {
        $data_user = \App\user::find($id);
        return view('auths.edit',['user'=>$data_user]);
    
        //untuk melihat pengambilan data
        //
    }

    public function update(Request $request, $id)
    {
       
        $data_user = \App\user::find($id)
                    ->where('id', $id)
                    ->update
                    (['name' => $request->name,
                        'nip' => $request->nip,
                        'username' => $request->username,
                        'email' => $request->email,
                        'jabatan' => $request->jabatan,
                        'role' => $request->role,
                        'password' => bcrypt($request->password)
                    ]);
        return redirect('/vuser')->with('sukses', 'data berhasil diubah');
        
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
        $data_user = \App\user::find($id);
        $data_user->delete($data_user);
        return redirect('/vuser')->with('sukses', 'data berhasil dihapus');
        
    }
}
