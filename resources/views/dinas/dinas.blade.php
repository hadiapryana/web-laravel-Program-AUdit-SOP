@extends('master.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Dinas</title>
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
              <h3 class="box-title">Data Dinas</h3>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm right" style="float: right; margin-right: 10px;
    margin-bottom: 10px;"  data-toggle="modal" data-target="#tambahdinas">
                Tambah dinas
            </button>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table border="3" class="table table-bordered table-striped table-hover datatab">
                <thead>
                <tr>
                  <th>Nama Dinas</th>
                  <th>Kepala Dinas</th>
                  <th>Alamat(s)</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_dinas as $dinas)
                <tr>
                  <td><a href="/vbidangklik/{{$dinas->id}}">{{$dinas->nama_dinas}}</a></td>
                  <td>{{$dinas->kepala_dinas}}</td>
                  <td>{{$dinas->alamat}}</td>
                  <td>{{$dinas->email}}</td>
                  <td>{{$dinas->no_telepon}}</td>
                  <td><a href="/vdinas/{{$dinas->id}}/edit" class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/edit.png') }}" height="20" width="20"></a>
                  <a href="/vdinas/{{$dinas->id}}/delete" onclick="return confirm('Apa anda yakin akan menghapus data ini ?')"><img src="{{ asset('admin/icon/delete.png') }}" height="20" width="20"></a></td>
                  <!--<a href="" 
                        data-id="{{$dinas->id}}"
                        data-nama_dinas="{{$dinas->nama_dinas}}"  
                        data-kepala_dinas="{{$dinas->kepala_dinas}}" 
                        data-alamat="{{$dinas->alamat}}"
                        data-email="{{$dinas->email}}"
                        data-no_telepon="{{$dinas->no_telepon}}"
                        data-toggle="modal" data-target="#edit"><img src="{{ asset('admin/icon/edit.png') }}" height="20" width="20"></a>
                  
                  </td>-->
                   <!--<td><a href="/vdinas/{{$dinas->id}}/edit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="">Edit</a></td>-->
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
    <div class="modal fade" id="tambahdinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Dinas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="vdinas/create" method="POST">
                    {{csrf_field()}}
                   
                        <div class="form-group">
                            <label >Nama Dinas</label>
                            <input name="nama_dinas" type="text" class="form-control"  placeholder="Nama Dinas" required>
                        </div>
                        <div class="form-group">
                            <label >Kepala Dinas</label>
                            <input name="kepala_dinas" type="text" class="form-control" placeholder="Kepala Dinas" required>
                        </div>
                        <div class="form-group">
                            <label >Alamat</label>
                            <textarea name="alamat"  required class="form-control"  rows="3" ></textarea >
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input name="email" type="email" class="form-control"  placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label >No Telepon</label>
                            <input name="no_telepon" type="text" class="form-control"  placeholder="No_Telepon" maxlength="12" onKeyPress="return kodeScript(event,'0123456789',this)" required>
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

 

             <!-- Edit Modal
             <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Edit Dinas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="vdinas/{{$dinas->id}}/update" method="POST">
                    {{csrf_field()}}
                    
                    <input name="id" type="hidden" class="form-control"  placeholder="Nama Dinas" id="id">
                        <div class="form-group">
                            <label >Nama Dinas</label>
                            <input name="nama_dinas" type="text" class="form-control"  placeholder="Nama Dinas" id="nama_dinas">
                        </div>
                        <div class="form-group">
                            <label >Kepala Dinas</label>
                            <input name="kepala_dinas" type="text" class="form-control" placeholder="Kepala Dinas" id="kepala_dinas">
                        </div>
                        <div class="form-group">
                            <label >Alamat</label>
                            <textarea name="alamat" class="form-control"  rows="3" id="alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input name="email" type="email" class="form-control"  placeholder="Email" id="email">
                        </div>
                        <div class="form-group">
                            <label >No Telepon</label>
                            <input name="no_telepon" type="text" class="form-control"  id="no_telepon" placeholder="No_Telepon" maxlength="12" onKeyPress="return kodeScript(event,'0123456789',this)">
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="upadatedata" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
              </div>  
            </div> -->

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

<!-- Untuk Btn Edit menampilkan  
<script>
  $(document).ready(function() {
      $('.editbtn').on('click',function(){

        $('#editdinas').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children('td').map(function(){
            return$(this).text();
          }).get();

          console.log(data);
            $('#nama_dinas').val(data[0]);
            $('#kepala_dinas').val(data[1]);
            $('#alamat').val(data[2]);
            $('#email').val(data[3]);
            $('#no_telepon').val(data[4]);


      });
  });
  </script>-->

  

<!--Script Untuk inpuran No saja -->
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function kodeScript(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;

keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();

// check goodkeys
if (goods.indexOf(keychar) != -1)
	return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
  
if (key == 13) {
	var i;
	for (i = 0; i < field.form.elements.length; i++)
		if (field == field.form.elements[i])
			break;
	i = (i + 1) % field.form.elements.length;
	field.form.elements[i].focus();
	return false;
	};
// else return false
return false;
}
</script>
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function kodeScript(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;

keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();

// check goodkeys
if (goods.indexOf(keychar) != -1)
	return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
  
if (key == 13) {
	var i;
	for (i = 0; i < field.form.elements.length; i++)
		if (field == field.form.elements[i])
			break;
	i = (i + 1) % field.form.elements.length;
	field.form.elements[i].focus();
	return false;
	};
// else return false
return false;
}
</script>
</html>

@endsection