<?php
Namespace App\Http\Controllers;
use Crypt;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class kelolapengawasController extends Controller
{
    public function lihatPengawas()
    {
       
        $data_pengawas = \App\User::where('role','=',"pengawas")->get();
        //foreach ($data_user as $row)
        //{
         //    Crypt::decrypt($row->password);
       // }   
        return view ('kelolaPengawas.pengawas',['data_pengawas' => $data_pengawas]);
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
            'password' => bcrypt($request->password)
        ]);
        return redirect('vKelolaPengawas')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data_pengawas = \App\user::find($id);
        return view('kelolaPengawas.edit',['data_pengawas'=>$data_pengawas]);
    
        //untuk melihat pengambilan data
        //
    }

    public function update(Request $request, $id)
    {
       
        $data_pengawas = \App\user::find($id)
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
        return redirect('/vKelolaPengawas')->with('sukses', 'data berhasil diubah');
        
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
        $data_pengawas = \App\user::find($id);
        $data_pengawas->delete($data_pengawas);
        return redirect('/vKelolaPengawas')->with('sukses', 'data berhasil dihapus');
        
    }
}