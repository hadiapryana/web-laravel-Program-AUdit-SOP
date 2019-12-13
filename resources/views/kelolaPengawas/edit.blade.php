@extends('master_adminSOP.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengawas</title>
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
              <h3 class="box-title">Ubah Data user</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="/vKelolaPengawas/{{$data_pengawas->id}}/update" method="POST">
              {{csrf_field()}}
                <!-- text input -->
                <div class="form-group">
                            <label >Nama</label>
                            <input name="name" type="text" class="form-control"  value="{{$data_pengawas->name}}" placeholder="Nama"  required>
                        </div>
                        <div class="form-group">
                            <label >NIP</label>
                            <input name="nip" type="text" class="form-control"  value="{{$data_pengawas->nip}}" placeholder="NIP" maxlength="12" onKeyPress="return kodeScript(event,'0123456789',this)" required>
                        </div>
                        <div class="form-group">
                            <label >Username</label>
                            <input name="username" type="text" class="form-control" value="{{$data_pengawas->username}}" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input name="email" type="email" class="form-control" value="{{$data_pengawas->email}}" placeholder="Email"  required>
                        </div>
                        <div class="form-group">
                            <label >Jabatan</label>
                            <input name="jabatan" type="text" class="form-control" value="{{$data_pengawas->jabatan}}" placeholder="Jabatan" required>
                        </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      </div>
                      <select name="role" class="form-control" id="dinas" style="margin-bottom: 10px;">
                        <option disabled selected>Pilih role</option>
                        <option value="pengawas" @if($data_pengawas->role == 'pengawas') selected @endif>Pengawas</option>
                      </select>
                    </div>
                    <div class="form-group">
                            <label >New Password</label>
                            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"  value="{{old('password')}}" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                        </div>
                        <div class="form-group">
                            <label >New password</label>
                            <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"  value="{{old('password_confirmation')}}" required>
                            @if($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password_confirmation')}}
                                </div>
                                @endif
                        </div>
                <button onclick="return confirm('Apa anda yakin data telah sesuai ?')" type="submit" name="upadatedata" class="btn btn-primary" style="float:right">Ubah</button>
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