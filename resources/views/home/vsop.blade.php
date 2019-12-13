
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lihat SOP</title>
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
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<!-- Content Wrapper. Contains page content -->
<!-- As a link -->
<!-- As a heading -->
</head>
<nav class="navbar navbar-static-top" style=" background-color:#3c8dbc">
  <a class="navbar-brand" href="/">
    <img src="admin/img/Iconcimahi.png" width="30" height="30" alt="">
    
  </a>
</nav>
    <!-- Content Header (Page header) -->
    <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table File SOP</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover datatab">
              <thead>
                <tr>
                <th>Nama Dinas</th>
                <th>Nama Bidang/Bagian/Sekretariat</th>
                <th>Nama Seksi</th>
                <th>Nama Aktivitas</th>
                  <th>Nama SOP</th>
                  <th>Tanggla Penetapan</th>
                  <th>Status</th>
                  <th>Dokumen</th>
                  <th>Versi</th>
                  <th> Aksi </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_sop as $sop)
                
                <tr>
                  <td>{{$sop->dinas->nama_dinas}}</td>
                  <td>{{$sop->bidang->nama_bidang}}</td>
                  <td>{{$sop->seksi->nama_seksi}}</td>
                  <td>{{$sop->aktivitas->nama_aktivitas}}</td>
                  <td>{{$sop->nama_sop}} </td>
                  <td>{{$sop->tgl_penetapan}} </td>
                  <td>{{$sop->status}}</td>
                  <td>{{$sop->file}} </td>
                  <td>{{$sop->versi}} </td>
                  <td> <a href="{{ route('vsop.download', ['id'=> $sop->id]) }}" download="{{$sop->file}}" class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/download-button.png') }}" height="20" width="20"></td>
                        </td>
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
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/js/demo.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>
<script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>

</html>