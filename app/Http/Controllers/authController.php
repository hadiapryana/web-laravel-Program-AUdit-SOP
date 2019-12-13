<?php

namespace App\Http\Controllers;
use Auth;
use App\users;
use Illuminate\Http\Request;

class authController extends Controller
{

    public function login(){
        return view ('auths.login');
    }

    public function postlogin(Request $request){
        //lihat data yabg di inputkan
        //dd($request->all());
        //if(Auth::attempt($request->only('username','password',''))){
        
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role'=>'pengawas'])){
                return redirect('/berandaPengawas');
            }elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role'=>'superadmin'])){
                return redirect('/beranda');
            }elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role'=>'adminsop'])){
                return redirect('/berandaAdminSOP');
            }elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role'=>'pimpinan'])){
                return redirect('/berandaPimpinan');
            }
                return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}