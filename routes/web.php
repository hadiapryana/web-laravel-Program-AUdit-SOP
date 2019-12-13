<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});


//Route::get('/master', function () {
   // return view('master.app');
//});
//Route::get('test','testController@index');

Route::get('/login','authController@login')->name('login');
Route::post('/postlogin','authController@postlogin');
Route::get('/logout','authController@logout');
Route::get('vsop','GController@lihatsopp');
Route::get('vsop/download/{id}','GController@downloadd')->name('vsop.download');


Route::group(['middleware'=> ['auth','checkRole:superadmin']],function(){

    
    Route::get('/beranda', function () {
        return view('home.beranda');
    });

    Route::get('/pengawas', function () {
        return view('dinas.edit');
    });


    Route::get('dashboard','masterController@master');
    //CRUD Dinas
    Route::get('vdinas','dinasController@lihatdinas');
    Route::post('/vdinas/create','dinasController@create');
    Route::get('/vdinas/{id}/edit','dinasController@edit');
    Route::post('/vdinas/{id}/update','dinasController@update');
    Route::get('/vdinas/{id}/delete','dinasController@delete');
    //CRUD Bidang/bagian/sekretariat
    //Route::get('vbidang','bidangController@lihatdinas');
    Route::get('/vbidang', 'bidangController@lihatbidang');
    Route::get('/vbidang/{id}','bidangController@LihatAjax');
    Route::post('/vbidang/create','bidangController@create');
    Route::get('/vbidang/{id}/edit','bidangController@edit');
    Route::post('/vbidang/{id}/update','bidangController@update');
    Route::get('/vbidang/{id}/delete','bidangController@delete');
    Route::get('/vbidangklik/{id}', 'bidangController@lihatbidangklik');

    
    //CRUD Aktivitas
    Route::get('vseksi','seksiController@lihatseksi');
    Route::get('/vseksi/{id}','seksiController@LihatbidangAjax');
    Route::get('/vseksitb/{id}','seksiController@LihatseksiAjax');
    Route::post('/vseksi/create','seksiController@create');
    Route::get('/vseksi/{id}/edit','seksiController@edit');
    Route::post('/vseksi/{id}/update','seksiController@update');
    Route::get('/vseksi/{id}/delete','seksiController@delete');
    Route::get('/vseksiklik/{id}', 'seksiController@lihatseksiklik');

    //CRUD PENGGUNA
    Route::get('vuser','userController@lihatuser');
    Route::post('/vuser/create','userController@create');
    Route::get('/vuser/{id}/edit','userController@edit');
    Route::post('/vuser/{id}/update','userController@update');
    Route::get('/vuser/{id}/delete','userController@delete');
});

Route::group(['middleware'=> ['auth','checkRole:adminsop']],function(){
    //admin SOP
    Route::get('/berandaAdminSOP', function () {
        return view('home.berandaAdminSOP');
    });

    //kelola pengawas
    Route::get('vKelolaPengawas','kelolapengawasController@lihatPengawas');
    Route::post('/vKelolaPengawas/create','kelolapengawasController@create');
    Route::get('/vKelolaPengawas/{id}/edit','kelolapengawasController@edit');
    Route::post('/vKelolaPengawas/{id}/update','kelolapengawasController@update');
    Route::get('/vKelolaPengawas/{id}/delete','kelolapengawasController@delete');

    //kelola Aktivitas
    Route::get('vaktivitas','aktivitasController@lihataktivitas');
    Route::post('/vaktivitas/create','aktivitasController@create');
    Route::get('/vaktivitas/{id}/edit','aktivitasController@edit');
    Route::post('/vaktivitas/{id}/update','aktivitasController@update');
    Route::get('/vaktivitas/{id}/delete','aktivitasController@delete');
    Route::get('/vaktivitasb/{id}','aktivitasController@LihatseksiAjax');
    Route::get('/vaktivitass/{id}','aktivitasController@LihataktivitasAjax');

    //kelola dokumen SOP
    Route::get('vdoksop','sopController@lihatSOPSetelahLogin');
    Route::post('/vdoksop/create','sopController@create');
    Route::get('/vdoksop/{id}/delete','sopController@delete');
    Route::get('/vdoksop/{id}/edit','sopController@edit');
    Route::post('/vdoksop/{id}/update','sopController@update');
    Route::get('/vdoksop/{id}/arsip','sopController@arsip');
    Route::post('/vdoksop/arsip_sop','arsipController@create');
    Route::get('/vdoksop/download/{id}','sopController@download')->name('sop.download');
    //surat kerja
    Route::get('vsurat','suratkerjaController@lihatsurat');
    Route::post('/vsurat/create','suratkerjaController@create');
    Route::get('/vsurat/{id}/edit','suratkerjaController@edit');
    Route::post('/vsurat/{id}/update','suratkerjaController@update');
    Route::get('/vsurat/{id}/delete','suratkerjaController@delete');

});

Route::group(['middleware'=> ['auth','checkRole:pengawas']],function(){
    //admin pengawas
    Route::get('/berandaPengawas', function () {
        return view('home.berandaPengawas');
    });
    //kelola pemantuan sop
    Route::get('/vpemantuan','jawabanController@lihatSOPSetelahLogin');
    Route::get('/vpemantuan/{id}/evaluasi','jawabanController@tambahevaluasi');
    Route::post('/vpemantuan/create','jawabanController@create');
    Route::get('/vpemantuan/{id}', 'jawabanController@lihatjawaban');
    Route::get('/vlaporan/laporan', 'jawabanController@lihatlaporan');
    Route::get('/vpemantuan/{id}/edit','jawabanController@edit');
    Route::post('/vpemantuan/{id}/update','jawabanController@update');
    Route::get('/vpemantuan/{id}/delete','jawabanController@delete');
});
Route::group(['middleware'=> ['auth','checkRole:pimpinan']],function(){
    
    //pimpinan
    Route::get('/berandaPimpinan', function () {
        return view('home.berandaPimpinan');
    });
    Route::get('/lihatlaporanperiode', function () {
        return view('pimpinan.laporanperiode');
    });
    
    Route::get('/lihatlaporan', 'pimpinanController@lihatlaporanpimpinan');
    Route::get('/lihatlaporanchart', 'pimpinanController@lihatchart');
    Route::get('/cetaklaporan/lihatlaporan_pdf', 'pimpinanController@cetak_pdf');
    Route::get('/print/{id}', 'pimpinanController@pdf_id');
    Route::get('/lihatlaporan/{id}', 'pimpinanController@pdf_aktivitas');
    Route::get('laporanperiode', 'pimpinanController@ambilbulan');
    Route::get('/lihatlaporan/{id}','pimpinanController@LihatAjaxp');

});
