
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>------</title>
 
  <h3 align="center">LAPORAN<h3>

            <!-- /.box-header -->
              <table border="1">
              
                <thead>
                <tr>
                  <th>Nama Aktivitas</th>
                  <th>Nama SOP</th>
                  <th>Tanggal Audit</th>
                  <th>Versi</th>
                  <th>Hasil</th>
                  <th>Keterangan</th>
                  
                </tr>
                </thead>
                <tbody >
                @foreach($data_jawaban as $jawaban)
                    <tr>
                        <td>{{ $jawaban->aktivitas->nama_aktivitas }}</td>
                        <td>{{ $jawaban->sop->nama_sop }}</td>
                        <td>{{ $jawaban->tanggal }}</td>
                        <td>{{ $jawaban->sop->versi }}</td>
                        <td>{{ $jawaban->hasil }}</td>
                        <td>{{ $jawaban->catatan1 }}</td>
                        </tr>
                @endforeach
                </tbody>
               
              </table>
          
    <!-- /.content -->
    
   <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->    
</html>

