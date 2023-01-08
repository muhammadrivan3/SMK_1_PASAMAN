<?php
include '../../db/koneksi.php';
include '../akses.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="http://localhost/SMK_1_PASAMAN/absensi/assets/css/bootstrap.min.css" /> 
  <link rel="stylesheet" href="http://localhost/SMK_1_PASAMAN/absensi/assets/css/bootstrap-responsive.min.css" /> 
  <link href="http://localhost/SMK_1_PASAMAN/absensi/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="shortcut icon" href="http://localhost/SMK_1_PASAMAN/absensi/assets/image/<?PHP echo $data['photo_sekolah']; ?>" />
  <link rel="stylesheet" href="http://localhost/SMK_1_PASAMAN/absensi/assets/css/custom/style.css">
</head>
<body >
  <!-- HEADER -->
  <div class="row">
    <div class="text-center col-3" >
      <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/logosmk.png" style="width:30%; margin-top: 25%;">  
    </div>
    <div class="text-center col-6" >
      <h4>PEMERINTAH PROVINSI SUMATERA BARAT</h4>
      <h2>DINAS PENDIDIKAN</h2>
      <h2>CABANG DINAS WILAYAH VI</h2>
      <h1>SMK NEGERI 1 PASAMAN</h1> 
      <h6>Jln. Pertanian Padang Tujuh Kec.Pasaman Kab.Pasaman Barat Kode Pos. 26366</h6>
    </div>
    <div class="text-center col-3" >
      <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/logosmk.png" style="width:30%; margin-top: 25%;">  
    </div>
  </div>
  <hr style="border: 3px solid black;">
  <!-- CONTENT -->

  <?php if ($) {
    // code...
  }?>
  <div>
    <div class="row">
      <div class="text-center col" >
        <h3>DAFTAR ABSENSI SISWA</h3> 
      </div>
    </div>
    <div class="cetak" style="margin:10;">
      <table class="table table-bordered" style="width:100%;">
        <caption id="caption">Absensi Harian</caption>
        <thead>
          <tr>
            <th class="text-center thFixed"
            style="width:5%; border-radius: 10px 0 0 0 ;" rowspan="3">NO</th>
            <th class="text-center thFixed " rowspan="3" style="min-width:300px;" >NAMA/NIS  </th>
            <th class="text-center thFixed " rowspan="3" style="width:10px;" >L/P</th>
            <th class="text-center thFixed " rowspan="1" colspan="10" >HARI</th>

            <th class="text-center thFixed" rowspan="2" colspan="5" style="">TOTAL</th>
            <th class="text-center thFixed " rowspan="3" style="min-width:100px;border-radius: 0 10px 0 0;">KETERANGAN</th>

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
              <th class="text-center" style="width: 5%;"><?php echo $i; ?></th>

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
        $no = 1;
        $query = "SELECT * FROM biodata_siswa WHERE kelas_siswa = '$_POST[get_kelas]' AND lokal_siswa = '$_POST[get_lokal]' AND jurusan_siswa = '$_POST[get_jurusan]';";
        $query_tampilSiswa = mysqli_query($konek, $query);
        if(mysqli_num_rows($query_tampilSiswa) > 0){
          foreach($query_tampilSiswa as $items){
            ?>
            <tr>
              <td class='text-center'><?php echo "".$no++; ?> </td>
              <td><?php echo strtoupper($items['nama_siswa']);?></td>
              <td class='text-center'><?php echo strtoupper($items['jenis_kelamin_siswa']);?></td>
              <?php $lop=10;
              $hadir=0;
              $alfa=0;
              $cabut=0;
              $izin=0;
              $sakit=0;
              for ($i=1; $i <= $lop; $i++) { 
                                      // code...
                $queryDataAbsensiSiswa = mysqli_query($konek,"SELECT * FROM absensi_siswa WHERE id_siswa=".$items['id_siswa']." AND id_wali_kelas=".$_POST['get_lokal']." AND id_jurusan=".$_POST['get_jurusan']." AND jam_absensi=".$i." AND tgl_absensi='".$_POST['get_tgl']."'");

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
                      echo "<td class='text-center' style='color:red;'>".$dataSiswa['absensi']."</td>";
                    }else{
                      echo "<td class='text-center'>".$dataSiswa['absensi']."</td>";
                    }
                    ?>

                    <input type='hidden' name='input_absensi_siswa[]' value="<?php echo $dataSiswa['id_absensi']; ?>" />
                    <?php
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
              echo "<td></td>";
              ?>

            </tr>
            <?php 
          }}
          ?>

      </tbody>
    </table>
  </div>
</div>
<br>
<!-- FOOTER -->
<div class="row">
  <div class="col-5" >
    <div class="col" style="margin-left:10%;"><h6>Diketahui,</h6></div>
    <div class="col" style="margin-left:10%;"><h6>Kepala Sekolah</h6></div>
    <div class="col" style="margin-left:10%;"><br><br><br></div>
    <div class="col" style="margin-left:10%;"><h6><b><u>Edi Supanri, S.Pd, M.Pd, T</u></b></h6></div>
    <div class="col" style="margin-left:10%;"><h6>NIP. 19770705 200801 1 006</h6></div> 
  </div>
  <div class="text-center col-4">

  </div>
  <div class="col-3" >
    <div class="col" style="margin-left:10%;"><h6>Diketahui,</h6></div>
    <div class="col" style="margin-left:10%;"><h6>Wakil Kurikulum</h6></div>
    <div class="col" style="margin-left:10%;"><br><br><br></div>
    <div class="col" style="margin-left:10%;"><h6><b><u>Desi Novita, S.Pd</u></b></h6></div>
    <div class="col" style="margin-left:10%;"><h6>NIP. 19811121 201101 1 006</h6></div>
  </div>
</div>
</body>
</html>
