@extends('master_adminSOP.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data SOP</title>
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
              <h3 class="box-title">Data SOP</h3>
            </div>
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-primary btn-sm right" style="float: right; margin-right: 10px; margin-bottom: 10px;"  data-toggle="modal" data-target="#tambahsop">
                Tambah SOP
            </button>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover datatab">
                <thead>
                <tr>
                <th>Nama Aktivitas</th>
                  <th>Nama SOP</th>
                  <th>Dokumen</th>
                  <th>Versi</th>
                  <th>Tanggal Penetapan</th>
                  <th>Status</th>
                  <th>Catatan</th>
                  <th>Tanggal Pemberhentian</th>
                  <th> Aksi </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_sop as $sop)
                <tr>
                  <td>{{$sop->aktivitas->nama_aktivitas}}</td>
                  <td>{{$sop->nama_sop}} </td>
                  <td>{{$sop->file}} </td>
                  <td>{{$sop->versi}} </td>
                  <td>{{$sop->tgl_penetapan}}</td>
                  <td>{{$sop->status}}  </td>
                  <td>{{$sop->keterangan}}</td>
                  <td>{{$sop->tgl_pemberhentian}}</td>
                  <td> <a href="/vdoksop/{{$sop->id}}/edit" onclick='return confirm("Apa anda yakin akan mengubah data ini ?")' class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/edit.png') }}" height="20" width="20"></a>
                  <a href="/vdoksop/{{$sop->id}}/delete" onclick='return confirm("Apa anda yakin akan menghapus data ini ?")' ><img src="{{ asset('admin/icon/delete.png') }}" height="20" width="20"></a>
                  <a href="{{ route('sop.download', ['id'=> $sop->id]) }}" download="{{$sop->file}}" class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/download-button.png') }}" height="20" width="20"></a>
                  <a href="/vdoksop/{{$sop->id}}/arsip" onclick='return confirm("Apa anda yakin akan mengarsipkan data ini ?")' class="btn editbtn" data-toggle="modal" data-target="">Arsipkan</a></td>
                        
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
    
    <!-- /.content -->
    <!--Tambah Modal -->
    <div class="modal fade" id="tambahsop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Tambah SOP</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="vdoksop/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      </div>
                      <select  name="dinas_id" class="form-control" id="dinas" style="margin-bottom: 10px;">
                      @foreach($data_dinas as $dinas)
                                 <option value="{{$dinas->id}}">{{$dinas->nama_dinas}}</option>
                      @endforeach
                      </select>
                      <select name="bidang_id" class="form-control" id="bidang" style="margin-bottom: 10px;">
                      @foreach($data_pilBidang as $bid)
                                 <option value="{{$bid->id}}">{{$bid->nama_bidang}}</option>
                      @endforeach
                      </select>
                      <select name="seksi_id" class="form-control" id="seksi" style="margin-bottom: 10px;">
                      @foreach($data_seksi as $sek)
                                 <option value="{{$sek->id}}">{{$sek->nama_seksi}}</option>
                      @endforeach
                      </select>
                      <select name="aktivitas_id" class="form-control" id="aktivitas" style="margin-bottom: 10px;">
                      @foreach($data_aktivitas as $akt)
                                 <option value="{{$akt->id}}">{{$akt->nama_aktivitas}}</option>
                      @endforeach
                      </select>
                    </div>
                    
                        <div class="form-group">
                            <label >Nama SOP</label>
                            <input name="nama_sop" type="text" class="form-control"  placeholder="Nama SOP" required>
                        </div>
                        <div class="form-group">
                            <label >File SOP</label>
                            <input name="file" type="file" class="form-control" id="file" placeholder="File SOP" onchange="return validasiFile()">
                        </div>
                        <div class="form-group">
                            <label >Versi</label>
                            <input name="versi" type="text" class="form-control" placeholder="versi" required>
                        </div>
                        <div class="form-group">
                            <label >Status</label>
                            <input name="status" type="text" class="form-control" placeholder="status" required>
                        </div>
                        
                        <div class="form-group">
                            <label >tanggal Penetapan</label>
                            <input name="tgl_penetapan" type="date" class="form-control" placeholder="tgl_penetapan" required>
                        </div>
                        <div class="form-group">
                            <label>tanggal pemberhentian</label>
                            <input name="tgl_pemberhentian"  type="date" class="form-control" placeholder="tgl_pemberhentian" required >
                        </div>
                        <div class="form-group">
                            <label >keterangan</label>
                            <textarea name="keterangan" type="text" cols="90" rows="4" placeholder="keterangan" required placeholder="Belum disahkan" style="
                            height: 80px;
                            width: 500px;
                        "></textarea>
                        </div>


                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    $('#time').inputmask('hh:mm:ss', { 'placeholder': 'hh:mm:ss' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
  </script>

<script>
    function validasiFile(){
    var file = document.getElementById('file');
    var pathFile = file.value;
    var ekstensiOk = /(\.pdf|\.docx|\.doc|\.xlsx|\.pptx)$/i;
    if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .pdf/.docx/.xlsx/.pptx');
        file.value = '';
        return false;
      }
    }

  </script>
</html>

@endsection