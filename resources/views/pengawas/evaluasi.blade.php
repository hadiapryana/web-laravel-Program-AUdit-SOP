@extends('master_Pengawas.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Evaluasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="{{  URL::asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Font Awesome -->
  <link href="{{  URL::asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Ionicons -->
  <link href="{{  URL::asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- DataTables -->
  <link href="{{  URL::asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Theme style -->
  <link href="{{  URL::asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{  URL::asset('admin/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" >

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- Content Header (Page header) -->
<!-- Content Wrapper. Contains page content -->
<!-- As a link -->
<!-- As a heading -->
</head>

    
    <!-- Content Header (Page header) -->
    
    <section class="content">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div> 
     @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Evaluasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="/vpemantuan/create" method="POST">
              {{csrf_field()}}
                <!-- text input -->
                    <div class="form-group">
                            Nama Aktivitas : <label>{{$sop->aktivitas->nama_aktivitas}}</label>
                            <input  name="aktivitas_id" type="hidden" class="form-control" value="{{$sop->aktivitas_id}}" placeholder="Nama SOP" required hidden>
                        </div>
                        <div class="form-group">
                        Nama SOP : <label>{{$sop->nama_sop}}</label>
                            <input  name="sop_id" type="hidden" class="form-control" value="{{$sop->id}}" placeholder="File SOP" required>
                        </div>
                        <div class="form-group">
                            <input  name="tanggal" type="date" class="form-control"  required>
                        </div>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Range Nilai 1,2,3,4,5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1. Kesesuaian dengan perkembangan kebijakan (dasar hukum) atau kekuatan hukum</th>
                            <td>
                                <input type="radio"  name="jwb1" value="1" class="custom-control-input" style="margin-right: 10px;" checked>
                                <input type="radio"  name="jwb1" value="2"class="custom-control-input" style="margin-right: 10px;" checked>
                                <input type="radio"  name="jwb1" value="3" class="custom-control-input" style="margin-right: 10px;" checked>
                                <input type="radio"  name="jwb1" value="4" cla ss="custom-control-input" style="margin-right: 10px;" checked>
                                <input type="radio"  name="jwb1" value="5" class="custom-control-input" style="margin-right: 10px;" checked>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2. kesesuaian penyimpanan dokumen dan penempatan peralatan</th>
                            <td>
                                <input type="radio"  name="jwb2" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb2" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb2" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb2" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb2" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3. apakah pernah terjadi kecelakaan kerja atau terdapat proses pelaksanaan yang membuat hampir mengalami kecelakaan</th>
                            <td>
                                <input type="radio"  name="jwb3" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb3" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb3" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb3" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb3" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">4. apakah prosedur mudah dilaksanakan, mudah dipahami dan mudah diinformasikan</th>
                            <td>
                                <input type="radio"  name="jwb4" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb4" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb4" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb4" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb4" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">5. melibatkan seluruh perangkat yang ada dalam struktur organisasi terkait urusan </th>
                            <td>
                                <input type="radio"  name="jwb5" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb5" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb5" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb5" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb5" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">6. Semua orang dapat menjalankan perannya masing-masing atau sesuai dengan kualifikasi</th>
                            <td>
                                <input type="radio"  name="jwb6" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb6" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb6" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb6" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb6" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">7. kesesuaian waktu yang dibutuhkan untuk melaksanakan setiap kegiatan</th>
                            <td>
                                <input type="radio"  name="jwb7" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb7" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb7" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb7" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb7" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">8. persyaratan yang terdapat, apakah telah terpenuhi dan kesesuaian output atau keluaran setiap kegiatan</th>
                            <td>
                                <input type="radio"  name="jwb8" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb8" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb8" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb8" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb8" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">9. kesesuaian prosedur tahapan kegiatan dengan pelaksanaan kegiatan</th>
                            <td>
                                <input type="radio"  name="jwb9" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb9" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb9" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb9" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb9" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">10. kesesuaian Hasil akhir dari runtutan setiap prosedur telah tersedia </th>
                            <td>
                                <input type="radio"  name="jwb10" value="1" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb10" value="2" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb10" value="3" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb10" value="4" class="custom-control-input" style="margin-right: 10px;">
                                <input type="radio"  name="jwb10" value="5" class="custom-control-input" style="margin-right: 10px;">
                            </td>
                            </tr>
                        </tbody>
                        </table>
                        <textarea rows="3" cols="100" name="catatan1" Placeholder="ISI DENGAN PENILAIAN PENCATATAN" required></textarea>
                <button type="submit" name="upadatedata" class="btn btn-primary" style="float:right;    margin-top: 70px;">Tambah</button>
                </form>
                </div>
                </div>
                </div>
              </div>  
            </div>
            </div>

   <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
       <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script type="text/javascript" src="{{  URL::asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="{{  URL::asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- DataTables -->
<script type="text/javascript" src="{{  URL::asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript" src="{{  URL::asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- SlimScroll -->
<script type="text/javascript" src="{{  URL::asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script type="text/javascript" src="{{  URL::asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- AdminLTE App -->


<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{  URL::asset('admin/js/demo.js') }}"></script>




</html>

@endsection