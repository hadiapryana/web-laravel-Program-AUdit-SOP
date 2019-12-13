@extends('master.app')

@section('content')


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Bidang</title>
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
              <h3 class="box-title">Data Bidang/Bagian/Sekretariat</h3>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" style="float:right;margin-right: 10px;
    margin-bottom: 10px; "  data-toggle="modal" data-target="#tambahbidang">
                Tambah Bidang/Bagian/Sekretariat
            </button>
            
            <label style="margin-left: 10px;">Nama Dinas:</label>
            @foreach($data_dinas as $dinas)
                <label>{{$dinas->nama_dinas}}</label>
            @endforeach

            <!-- /.box-header -->
            <div class="box-body">
              <table id="tampil" class="table table-bordered table-striped table-hover datatab">
              
                <thead>
                <tr>
                  <th>Nama Bidang/Bagian/Sekretariat</th>
                  <th>Kepala  Bidang/Bagian/Sekretariat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="bidang">
                @foreach($data_bidang as $bidang)
                    <tr>
                        <td><a href="/vseksiklik/{{$bidang->id}}">{{ $bidang->nama_bidang }}</td>
                        <td>{{ $bidang->kepala_bidang }}</td>
                        <td><a href="/vbidang/{{$bidang->id}}/edit" onclick="return confirm('Apa anda yakin akan mengubah data ini ?')" class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/edit.png') }}" height="20" width="20"></a>
                  <a href="/vbidang/{{$bidang->id}}/delete" onclick="return confirm('Apa anda yakin akan menghapus data ini ?')"><img src="{{ asset('admin/icon/delete.png') }}" height="20" width="20"></a></td>
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
    <!--Tambah Modal -->
    <div class="modal fade" id="tambahbidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Bidang/Bagian/Sekretariat</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="vbidang/create" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      </div>
                      <select name="dinas_id" class="form-control" id="dinas" style="margin-bottom: 10px;">
                      @foreach($data_dinas as $dinas)
                                 <option value="{{$dinas->id}}">{{$dinas->nama_dinas}}</option>
                      @endforeach
                      </select>
                    </div>
                        <div class="form-group">
                            <label >Nama Bid/Bag/Sek</label>
                            <input name="nama_bidang" type="text" class="form-control"  placeholder="Nama Dinas" required>
                        </div>
                        <div class="form-group">
                            <label >Kepala Bid/Bag/Sek</label>
                            <input name="kepala_bidang" type="text" class="form-control" placeholder="Kepala Dinas" required>
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
$(document).ready(function(){
    $("#show").click(function(){
        $("#tampil").show(500);
    });
  });
</script>
<!--Reload otomatis data bidang dengan select menggunakan Ajax-->
<script type="text/javascript">
        $(document).ready(function(){
            $('#dinas').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('vbidang')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#bidang').empty();
                    $.each(data, function(vbidang, element){
                        $('#bidang').append("<tr><td>"+element.nama_bidang+"</td><td>"+element.kepala_bidang+"</td><td><a href='/vbidang/{{$bidang->id}}/edit' class='btn editbtn'><img src='{{ asset('admin/icon/edit.png') }}' height='20' width='20'></a><a href='/vbidang/{{$bidang->id}}/delete' class='btn editbtn'><img src='{{ asset('admin/icon/delete.png') }}' height='20' width='20'></a></td></tr>");
                    });
                });
            });
        });
    </script>
</html>



@endsection