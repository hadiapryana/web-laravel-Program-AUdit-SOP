@extends('master_adminSOP.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User</title>
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
              <h3 class="box-title">Data Pengawas</h3>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm right" style="float: right; margin-right: 10px;
    margin-bottom: 10px;"  data-toggle="modal" data-target="#tambahdinas">
                Tambah Pengawas
            </button>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover datatab">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email(s)</th>
                  <th>Nip</th>
                  <th>Jabatan</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_pengawas as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->nip}}</td>
                  <td>{{$user->jabatan}}</td>
                  <td>{{$user->role}}</td>
                  
                  <td><a href="/vKelolaPengawas/{{$user->id}}/edit" class="btn editbtn" data-toggle="modal" data-target=""><img src="{{ asset('admin/icon/edit.png') }}" height="20" width="20"></a>
                  <a href="/vKelolaPengawas/{{$user->id}}/delete" ><img src="{{ asset('admin/icon/delete.png') }}" height="20" width="20"></a></td>
           
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
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Pengawas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="vKelolaPengawas/create" method="POST">
                    {{csrf_field()}}
                   
                        <div class="form-group">
                            <label >Nama</label>
                            <input name="name" type="text" class="form-control"  placeholder="Nama"  required>
                        </div>
                        <div class="form-group">
                            <label >NIP</label>
                            <input name="nip" type="text" class="form-control"  placeholder="NIP" maxlength="12" onKeyPress="return kodeScript(event,'0123456789',this)" required>
                        </div>
                        <div class="form-group">
                            <label >Username</label>
                            <input name="username" type="text" class="form-control" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input name="email" type="email" class="form-control"  placeholder="Email"  required>
                        </div>
                        <div class="form-group">
                            <label >Jabatan</label>
                            <input name="jabatan" type="text" class="form-control"  placeholder="Jabatan" required>
                        </div>
                        <div class="form-group">
                            <label >Role</label>
                            <select name="role" class="form-control" id="dinas" style="margin-bottom: 10px;">
                           <option selected disabled>Pilih Hak Akses</option>
                           <option value="pengawas">Pengawas</option>
                      </select>
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"  value="{{old('password')}}" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"  value="{{old('password_confirmation')}}" required>
                            @if($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password_confirmation')}}
                                </div>
                                @endif
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