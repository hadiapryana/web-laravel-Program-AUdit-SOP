@extends('master_Pimpinan.app')

@section('content')


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>------</title>
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

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  

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
              <h3 class="box-title">Data Laporan</h3>
            </div>
            
            <!-- Button trigger modal -->
            
				
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tampil" class="table table-bordered table-striped table-hover datatab">
              
                <thead>
                <tr>
                  <th>Nama Aktivitas</th>
                  <th>Nama SOP</th>
                  <th>Tanggal Audit</th>
                  <th>Versi</th>
                  <th>Keterangan  </th>
                  <th>Hasil</th>
                  <th>Action</th>
                 
                  
                </tr>
                </thead>
                <tbody id="jawaban">
                @foreach($data_jawaban as $jawaban)
                    <tr>
                        <td>{{ $jawaban->aktivitas->nama_aktivitas }}</td>
                        <td>{{ $jawaban->sop->nama_sop }}</td>
                        <td>{{ $jawaban->tanggal }}</td>
                        <td>{{ $jawaban->sop->versi }}</td>
                        <td>{{ $jawaban->catatan1 }}</td>
                        <td>{{ $jawaban->hasil }}</td>
                        <td><a href="/print/{{$jawaban->id}}">Cetak</a></td>
                        <!--<td><a href="/lihatlaporan/cetak_pdf">Cetak</a></td>-->
                        </tr>
                @endforeach
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
          <div id="chartnilai"></div>
      </div>
    </section>
    </div>
    <!-- /.content -->
    
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


<!-- page script -->


</html>



@endsection