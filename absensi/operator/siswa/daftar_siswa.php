<?php
include '../../db/koneksi.php';
// include '../akses.php';
include '../../layout/header.php';
?>

<div id="content" style="margin-top:60px;">
  <div class="regular-page-area section-padding-20">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="details-content">
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h2 id="xs" ><i class="icon-calendar"></i> SISWA </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/siswa/tambah_siswa" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                          <th class="text-center" style="background-color: #404040; color:white;">NAMA/NIS</th>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;" >L/P</th>
                          <th class="text-center" style="background-color: #404040; color:white;">TGL LAHIR</th>
                          
                          <th class="text-center" style="background-color: #404040; color:white;">ALAMAT</th>
                          
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;">KELAS/ROMBEL</th>
                          <th class="text-center" style="background-color: #404040; color:white;">JURUSAN</th>
                          <th class="text-center" style="background-color: #404040; color:white;">TELEPON</th>
                          <!-- <th>Wali Kelas</th> -->
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">OPTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                        $queryDataSiswa = mysqli_query($konek, "SELECT * FROM biodata_siswa JOIN wali_kelas ON biodata_siswa.lokal_siswa = wali_kelas.id_wali_kelas JOIN jurusan ON biodata_siswa.jurusan_siswa = jurusan.id_jurusan");
                        $no=1;
                        while ($dataSiswa = mysqli_fetch_array($queryDataSiswa)) {
                           ?>
                        <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td class="text-center"><?php echo strtoupper($dataSiswa['nama_siswa']); ?> <br> NIS : <?php echo $dataSiswa['nis_siswa']; ?> </td>
                          <td class="text-center" style="widtd:5%;"><?php echo $dataSiswa['jenis_kelamin_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['tgl_lahir_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['alamat_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['kelas_siswa']; ?> - <?php echo $dataSiswa['nama_lokal']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['nama_jurusan']; ?>-<?php echo $dataSiswa['kosentrasi_jurusan']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['telepon_siswa']; ?></td>
                          <td></td>
                        </tr>


                        <?php
                         } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="widget-content">
                    <div id="placeholder"></div>
                    <p id="choices"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../js/custom/custom.js"></script>
  <!--end-main-container-part-->
  <?php include '../../layout/footer.php'; ?>
