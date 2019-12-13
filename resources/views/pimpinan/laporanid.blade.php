
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

                    <tr>
                        <td>{{ $data_jawaban->aktivitas->nama_aktivitas }}</td>
                        <td>{{ $data_jawaban->sop->nama_sop }}</td>
                        <td>{{ $data_jawaban->tanggal }}</td>
                        <td>{{ $data_jawaban->sop->versi }}</td>
                        <td>{{ $data_jawaban->hasil }}</td>
                        <td>{{ $data_jawaban->catatan1 }}</td>
                        </tr>
                
                </tbody>
               
              </table>
              <br>
             <table >
                <tr>
                    <td>Pertanyaan</td> <td align="center"> Jawaban/Nilai</td></tr>
               <tr>
             <td>1. Kesesuaian dengan perkembangan kebijakan (dasar hukum) atau kekuatan hukum </td> <td align="center"> {{$data_jawaban->jwb1}} </td></tr>
             
             <tr>
             <td>2. kesesuaian penyimpanan dokumen dan penempatan peralatan </td> <td  align="center">{{$data_jawaban->jwb2}} </td></tr>
             
             <tr>
                 <td>3. apakah pernah terjadi kecelakaan kerja atau terdapat proses pelaksanaan yang membuat hampir mengalami kecelakaan </td> <td  align="center">{{$data_jawaban->jwb3}} </td></tr>
              
             <tr>
                 <td>4. apakah prosedur mudah dilaksanakan, mudah dipahami dan mudah diinformasikan </td> <td  align="center">{{$data_jawaban->jwb4}} </td></tr>

             <tr>
                 <td>5. melibatkan seluruh perangkat yang ada dalam struktur organisasi terkait urusan </td> <td  align="center">{{$data_jawaban->jwb5}} </td></tr>
    
             <tr>
                 <td>6. Semua orang dapat menjalankan perannya masing-masing atau sesuai dengan kualifikasi </td> <td  align="center">{{$data_jawaban->jwb6}} </td></tr>

             <tr>
                 <td>7. kesesuaian waktu yang dibutuhkan untuk melaksanakan setiap kegiatan </td> <td  align="center">{{$data_jawaban->jwb7}} </td></tr>

             <tr>
                 <td>8. persyaratan yang terdapat, apakah telah terpenuhi dan kesesuaian output atau keluaran setiap kegiatan </td> <td  align="center">{{$data_jawaban->jwb8}} </td></tr>

             <tr>
                <td>9. kesesuaian prosedur tahapan kegiatan dengan pelaksanaan kegiatan </td> <td  align="center">{{$data_jawaban->jwb9}} </td></tr>

             <tr>
                <td>10. kesesuaian Hasil akhir dari runtutan setiap prosedur telah tersedia </td> <td  align="center">{{$data_jawaban->jwb10}} </td></tr>

                <tr>
                    <td>TOTAL </td> <td  align="center">{{$data_jawaban->total}} </td></tr>
                <tr>
                    <td>HASIL (Total * 2 / 10)</td> <td  align="center">{{$data_jawaban->hasil}} </td></tr>
                <tr>
                    <td>KETERANGAN </td> <td  align="center">{{$data_jawaban->catatan1}} </td></tr>
             
              
             
                            
                    
             </table>
    <!-- /.content -->
    
   <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->    
</html>

