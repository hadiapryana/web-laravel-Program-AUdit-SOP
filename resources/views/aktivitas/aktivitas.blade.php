@extends('master_adminSOP.app')

@section('content')


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Aktivitas</title>
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
              <h3 class="box-title">Data Aktivitas</h3>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" style="float:right;margin-right: 10px;
    margin-bottom: 10px; "  data-toggle="modal" data-target="#tambahaktivitas">
                Tambah Aktivitas
            </button>

            
            <!-- /.box-header -->
            <div class="box-body">
            <table border="0">
              <tr>
              <td><div class="input-group">
                <select class="custom-select bidang" id="bidang" aria-label="Example select with button addon" style="height: 34px;margin-bottom: 10px;padding-right: 50px;margin-right: 5px;"> 
                <option selected disabled>Pilih Big/Bag/Sek</option>
                    @foreach($data_bidang as $bidang)
                            <option value="{{$bidang->id}}">{{$bidang->nama_bidang}}</option>
                      @endforeach
                </select></td>
                <td><div class="input-group">
                <select class="custom-select seksi tampil lihatseksi" id="seksi" aria-label="Example select with button addon" style="height: 34px;margin-bottom: 10px;padding-right: 50px;margin-right: 5px;"> 
                <option selected disabled>Pilih Seksi</option>
                    @foreach($data_seksi as $seksi)
                            <option></option>
                      @endforeach
                </select></td>
               
                
              </tr>
            </table>
              <table id="tampiltabel" class="table table-bordered table-striped table-hover datatab">
              
                <thead>
                <tr>
                  <th>Nama Aktivitas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="aktivitas">
                @foreach($data_aktivitas as $aktivitas)
                    <tr>
                        <td>{{ $aktivitas->nama_aktivitas }}</td>
                          <!--<td><a >{{ $aktivitas->kepala_aktivitas }}</td>-->
                        <td><a href="/vaktivitas/{{$aktivitas->id}}/edit" onclick='return confirm("Apa anda yakin akan mengubah data ini ?")' class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/edit.png') }}" height="20" width="20"></a>
                  <a href="/vaktivitas/{{$aktivitas->id}}/delete" onclick='return confirm("Apa anda yakin akan menghapus data ini ?")' ><img src="{{ asset('admin/icon/delete.png') }}" height="20" width="20"></a></td>
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
    <div class="modal fade" id="tambahaktivitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="vaktivitas/create" method="post">
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
                      <select name="bidang_id" class="form-control" id="bidang" style="margin-bottom: 10px;">
                      @foreach($data_bidang as $bidang)
                                 <option value="{{$bidang->id}}">{{$bidang->nama_bidang}}</option>
                      @endforeach
                      </select>
                      <select name="seksi_id" class="form-control" id="seksi" style="margin-bottom: 10px;">
                      @foreach($data_seksi as $seksi)
                                 <option value="{{$seksi->id}}">{{$seksi->nama_seksi}}</option>
                      @endforeach
                      </select>
                    </div>
                    
                        <div class="form-group">
                            <label >Nama Aktivitas</label>
                            <input name="nama_aktivitas" type="text" class="form-control"  placeholder="Nama Aktivitas" required>
                        </div>
                        <div class="form-group">
                            <label >Kepala Aktivitas</label>
                            <input name="kepala_aktivitas" type="text" class="form-control" placeholder="Kepala Aktivitas" required>
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

  <!--menampilkan select bidang-->
  <script>
$(document).ready(function(){
    $('.bidang').click(function(){
        $('.tampil').show(500);
    });
});</script>

<!--menampilkan button tampil tabel-->
<script>
$(document).ready(function(){
    $('.lihatseksi').click(function(){
        $('.tampilseksi').show(500);
    });
});</script>


<!--menampilkan tabel-->
 <script>
$(document).ready(function(){
    $("#lihattabel").click(function(){
        $("#tampiltabel").show(500);
    });
});</script>

<!--konfirmasi ubdah dan hapus-->
<script>
			function konfirmasiUbah(){
				var konfirmasi = confirm("Pakah anda yakin akan mengubah data ?");
				var text = "";
				
				if(konfirmasi === true) {
					text = "Kamu klik Tombol OK";
				}else{
					text = "Kamu klik Tombol Cancel";
				}
				
				document.getElementById("hasil").innerHTML = text;
			}
		</script>

<!--menampilkan data pada tabel-->
<script type="text/javascript">
        $(document).ready(function(){
            $('#bidang').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('vaktivitasb')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#seksi').empty();
                    $.each(data, function(vaktivitasb, element){
                        $('#seksi').append("<option selected disabled hidden>"+'Pilih Seksi'+"</option>");
                        $('#seksi').append("<option value="+element.id+">"+element.nama_seksi+"</option>");
                    });
                });
            });
        });
    </script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#seksi').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('vaktivitass')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#aktivitas').empty();
                    $.each(data, function(vaktivitass, element){
                        $('#aktivitas').append("<tr><td>"+element.nama_aktivitas+"</td><td>"+element.kepala_aktivitas+"</td><td><a href='/vaktivitas/"+element.id+"/edit' class='btn editbtn'><img src='{{ asset('admin/icon/edit.png') }}' height='20' width='20'></a><a href='/vaktivitas/"+element.id+"/delete' class='btn editbtn'><img src='{{ asset('admin/icon/delete.png') }}' height='20' width='20'></a></td></tr>");
                    });
                });
            });
        });
    </script>


</html>



@endsection