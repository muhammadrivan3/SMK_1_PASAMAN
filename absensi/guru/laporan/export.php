<?php
//import koneksi ke database
?>
<html>
<head>
  <title>LAPORAN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>LAPORAN ABSENSI</h2>
			<!-- <h4>(Inventory)</h4> -->
				<div class="data-tables datatable-dark">
				<table class="table table-bordered" style="width:100%;" id="mauexport">
                        <caption id="caption">Absensi Harian</caption>
                        <thead>
                          <tr>
                            <th class="text-center thFixed"
                            style="width:5%; border-radius: 10px 0 0 0 ;" rowspan="3">No</th>
                            <th class="text-center thFixed " rowspan="3" style="min-width:300px;" >Nama/Nis  </th>
                            <th class="text-center thFixed " rowspan="1" colspan="10" >Hari</th>

                            <th class="text-center thFixed" rowspan="2" colspan="5" style="">Total</th>
                            <th class="text-center thFixed " rowspan="3" style="min-width:300px;border-radius: 0 10px 0 0;">Keterangan</th>

                          </tr>
                          <tr>
                            <th  colspan="10" class="text-center thFixed">Senin</th>

                            <!-- <th style="width:100%;" class="text-center thFixed">Minggu</th> -->
                          </tr>
                          <tr>

                            <?php 
                            $loop_jam = 1;
                            for ($loop_jam; $loop_jam<2; $loop_jam++) { 
                             for ($i=1; $i <= 10; $i++) { 
                              ?>
                              <th style="width: 2%;"><?php echo $i; ?></th>

                            <?php }
                          } ?>
                          <th class="text-center thFixed">H</th>
                          <th class="text-center thFixed">I</th>
                          <th class="text-center thFixed">S</th>
                          <th class="text-center thFixed">A</th>
                          <th class="text-center thFixed">C</th>
                        </tr>

                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET['kelas']) && isset($_GET['lokal']) && isset($_GET['jurusan']) ){
                          $get_kelas = $_GET['kelas'];
                          $get_lokal = $_GET['lokal'];
                          $get_jurusan = $_GET['jurusan'];
                          $get_tgl = $_GET['tgl_absen'];
                          $get_jam = $_GET['jam'];
                          $no = 1;
                          $query = "SELECT * FROM biodata_siswa WHERE kelas_siswa = '$get_kelas' AND lokal_siswa = '$get_lokal' AND jurusan_siswa = '$get_jurusan';";
                          $query_tampilSiswa = mysqli_query($konek, $query);
                          if(mysqli_num_rows($query_tampilSiswa) > 0){
                            foreach($query_tampilSiswa as $items){
                              ?>
                              <tr>
                                <td><?php echo "".$no++; ?> </td>
                                <td><?php echo strtoupper($items['nama_siswa']);?></td>
                                <?php $lop=10;
                                $hadir=0;
                                $alfa=0;
                                $cabut=0;
                                $izin=0;
                                $sakit=0;
                                for ($i=1; $i <= $lop; $i++) { 
                                      // code...
                                  $queryDataAbsensiSiswa = mysqli_query($konek,"SELECT * FROM absensi_siswa WHERE id_siswa=".$items['id_siswa']." AND id_wali_kelas=".$get_lokal." AND id_jurusan=".$get_jurusan." AND jam_absensi=".$i." AND tgl_absensi='".$get_tgl."'");

                                  if(mysqli_num_rows($queryDataAbsensiSiswa) > 0){
                                    while($dataSiswa = mysqli_fetch_array($queryDataAbsensiSiswa)){
                                      
                                      if ($dataSiswa['absensi']=='H') {
                                            // code...
                                        $hadir++;
                                      }else if ($dataSiswa['absensi']=='A') {
                                            // code...
                                        $alfa++;
                                      }else if ($dataSiswa['absensi']=='C') {
                                            // code...
                                        $cabut++;
                                      }else if ($dataSiswa['absensi']=='I') {
                                            // code...
                                        $izin++;
                                      }else if ($dataSiswa['absensi']=='S') {
                                            // code...
                                        $sakit++;
                                      }
                                      if ($dataSiswa['absensi']=="C" || $dataSiswa['absensi']=="A") {
                                        // code...
                                        echo "<td style='color:red;'>".$dataSiswa['absensi']."</td>";
                                      }else{
                                        echo "<td>".$dataSiswa['absensi']."</td>";
                                      }
                                    }
                                  }else{
                                    echo "<td></td>";
                                  }
                                }
                                echo "<td>".$hadir."</td>";
                                echo "<td>".$izin."</td>";
                                echo "<td>".$sakit."</td>";
                                echo "<td>".$alfa."</td>";
                                echo "<td>".$cabut."</td>";
                                ?>
                              </tr>
                              <?php 
                            }
                          }}
                          ?>
                           
                          </tbody>
                        </table>
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>