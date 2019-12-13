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
              <h3 class="box-title"></h3>
            </div>
               
          <div id="chartnilai"></div>
      
            <!-- /.box-header -->
            <div class="box-body">
            <div id=""></div>
            <h3>Kesimpulan</h3>
            @foreach($datap6 as $total)
                <?php if($total->aktivitas_id == 6){ 
                echo ''.$total->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total->tanggal;
                echo ' Memiliki Nilai Tertinggi dengan Nilai : ';
                echo $total->total;
                echo '<br>';
                }?>
           @endforeach
           @foreach($datap6s as $total1)
                <?php if($total1->aktivitas_id == 6){ 
                echo ''.$total1->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total1->tanggal;
                echo ' Memiliki Nilai Terendah dengan Nilai : ';
                echo $total1->total;
                echo '<br>';
                echo '<br>';
                }?>
           @endforeach

            @foreach($datap8 as $total)
                <?php if($total->aktivitas_id == 8){ 
                echo ''.$total->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total->tanggal;
                echo ' Memiliki Nilai Tertinggi dengan Nilai : ';
                echo $total->total;
                echo '<br>';
                }?>
           @endforeach
           @foreach($datap8s as $total1)
                <?php if($total1->aktivitas_id == 8){ 
                echo ''.$total1->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total1->tanggal;
                echo ' Memiliki Nilai Terendah dengan Nilai : ';
                echo $total1->total;
                echo '<br>';
                echo '<br>';
                }?>
           @endforeach

           @foreach($datap9 as $total)
           <?php if($total->aktivitas_id == 9){ 
           echo ''.$total->aktivitas->nama_aktivitas;
           echo ' Pada Tanggal '.$total->tanggal;
           echo ' Memiliki Nilai Tertinggi dengan Nilai : ';
           echo $total->total;
           echo '<br>';
           }?>
      @endforeach
      @foreach($datap9s as $total1)
           <?php if($total1->aktivitas_id == 9){ 
           echo ''.$total1->aktivitas->nama_aktivitas;
           echo ' Pada Tanggal '.$total1->tanggal;
           echo ' Memiliki Nilai Terendah dengan Nilai : ';
           echo $total1->total;
           echo '<br>';
           echo '<br>';
           }?>
      @endforeach

      @foreach($datap11 as $total)
                <?php if($total->aktivitas_id == 11){ 
                echo ''.$total->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total->tanggal;
                echo ' Memiliki Nilai Tertinggi dengan Nilai : ';
                echo $total->total;
                echo '<br>';
                }?>
           @endforeach
           @foreach($datap11s as $total1)
                <?php if($total1->aktivitas_id == 11){ 
                echo ''.$total1->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total1->tanggal;
                echo ' Memiliki Nilai Terendah dengan Nilai : ';
                echo $total1->total;
                echo '<br>';
                echo '<br>';
                }?>
           @endforeach

           @foreach($datap12 as $total)
                <?php if($total->aktivitas_id == 12){ 
                echo ''.$total->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total->tanggal;
                echo ' Memiliki Nilai Tertinggi dengan Nilai : ';
                echo $total->total;
                echo '<br>';
                }?>
           @endforeach
           @foreach($datap12s as $total1)
                <?php if($total1->aktivitas_id == 12){ 
                echo ''.$total1->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total1->tanggal;
                echo ' Memiliki Nilai Terendah dengan Nilai : ';
                echo $total1->total;
                echo '<br>';
                echo '<br>';
                }?>
           @endforeach

           @foreach($datap17 as $total)
                <?php if($total->aktivitas_id == 17){ 
                echo ''.$total->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total->tanggal;
                echo ' Memiliki Nilai Tertinggi dengan Nilai : ';
                echo $total->total;
                echo '<br>';
                }?>
           @endforeach
           @foreach($datap17s as $total1)
                <?php if($total1->aktivitas_id == 17){ 
                echo ''.$total1->aktivitas->nama_aktivitas;
                echo ' Pada Tanggal '.$total1->tanggal;
                echo ' Memiliki Nilai Terendah dengan Nilai : ';
                echo $total1->total;
                echo '<br>';
                echo '<br>';
                }?>
           @endforeach
            <!-- /.box-header -->
            <div class="box-body">

                
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
            $('#jawaban').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('vpemantuan')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#aktivitas').empty();
                    $.each(data, function(vpemantuan, element){
                        $('#aktivitas').append("<tr><td>"+element.nama_aktivitas+"</td><td>"+element.nama_sop+"</td><td>"+element.tanggal+"</td><td>"+element.versi+"</td><td>"+element.hasil+"</td></tr>");
                    });
                });
            });
        });
    </script>

<script src="http://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartnilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Audit SOP'
    },
    xAxis: {
        categories: [
            'Periode 1',
            'Periode 2',
            'Periode 3',
            'Periode 4',
            'periode 5'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai Audit'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Nilai</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Penyusunan dan perumusan rencana strategis',
        data: {!!json_encode($data6)!!}
    }, {
        name: 'Pengumpulan Data dan Kinerja',
        data: {!!json_encode($data7)!!}
    }, {
        name: 'Penambahan Koleksi Bacaan',
        data: {!!json_encode($data8)!!}
    }, {
        name: 'Pembuatan Kartu Perpustakaan',
        data: {!!json_encode($data9)!!}
    }, {
        name: 'Peminjaman buku',
        data: {!!json_encode($data10)!!}
    } , {
        name: 'Pengembalian dan atau perpanjangan buku',
        data: {!!json_encode($data11)!!}
    } , {
        name: 'Penggunaan Internet',
        data: {!!json_encode($data12)!!}
    } , {
        name: 'Pergantian Buku Hilang',
        data: {!!json_encode($data13)!!}
    } , {
        name: 'Pengembalian Buku Rusak',
        data: {!!json_encode($data14)!!}
    } , {
        name: 'Perpustakaan Keliling',
        data: {!!json_encode($data15)!!}
    } , {
        name: 'Penambahan Koleksi Bacaan',
        data: {!!json_encode($data16)!!}
    } , {
        name: 'Penyimpanan Data Administratif',
        data: {!!json_encode($data17)!!}

    }]
});
</script>
    <!--
    <script src="http://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartnilai', {
  title: {
        text: 'AUDIT SOP'
    },

    yAxis: {
        title: {
            text: 'Nilai SOP'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        name: 'Penyusunan dan perumusan rencana strategis',
        data: {!!json_encode($data6)!!}
    }, {
        name: 'Pengumpulan Data dan Kinerja',
        data: {!!json_encode($data7)!!}
    }, {
        name: 'Penambahan Koleksi Bacaan',
        data: {!!json_encode($data8)!!}
    }, {
        name: 'Pembuatan Kartu Perpustakaan',
        data: {!!json_encode($data9)!!}
    }, {
        name: 'Peminjaman buku',
        data: {!!json_encode($data10)!!}
    } , {
        name: 'Pengembalian dan atau perpanjangan buku',
        data: {!!json_encode($data11)!!}
    } , {
        name: 'Penggunaan Internet',
        data: {!!json_encode($data12)!!}
    } , {
        name: 'Pergantian Buku Hilang',
        data: {!!json_encode($data13)!!}
    } , {
        name: 'Pengembalian Buku Rusak',
        data: {!!json_encode($data11)!!}
    } , {
        name: 'Perpustakaan Keliling',
        data: {!!json_encode($data15)!!}
    } , {
        name: 'Penambahan Koleksi Bacaan',
        data: {!!json_encode($data16)!!}
    } , {
        name: 'Penyimpanan Data Administratif',
        data: {!!json_encode($data17)!!}
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

</script>
-->

</html>



@endsection