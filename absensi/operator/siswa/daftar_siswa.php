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
                          <th class="text-center " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">No</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Nama/Nis</th>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;" >L/P</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Tgl Lahir</th>
                          
                          <th class="text-center" style="background-color: #404040; color:white;">Alamat</th>
                          
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;">Kelas/Lokal</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Jurusan</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Telepon</th>
                          <!-- <th>Wali Kelas</th> -->
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">Option</th>

                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                        $queryDataSiswa = mysqli_query($konek, "SELECT * FROM biodata_siswa");
                        $no=1;
                        while ($dataSiswa = mysqli_fetch_array($queryDataSiswa)) {
                           ?>
                        <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['nama_siswa']; ?> <br> Nis : <?php echo $dataSiswa['nis_siswa']; ?> </td>
                          <td class="text-center" style="widtd:5%;"><?php echo $dataSiswa['jenis_kelamin_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['tgl_lahir_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['alamat_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['kelas_siswa']; ?></td>
                          <td class="text-center"><?php echo $dataSiswa['jurusan_siswa']; ?></td>
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
