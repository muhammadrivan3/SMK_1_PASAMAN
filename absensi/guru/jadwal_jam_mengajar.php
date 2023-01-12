<?php
include '../db/koneksi.php';
include 'akses.php';
include '../layout/header.php';
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
                  <h2 id="xs" ><i class="icon-calendar"></i> Jadwal </h2>
                </div>
                
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
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">No</th>

                          <th class="text-center" style="background-color: #404040; color:white;">Mata Pelajaran</th>
                          <th class="text-center" style="width:10%;background-color: #404040; color:white;">Kelas</th>
                          <th class="text-center" style="width:20%;background-color: #404040; color:white;">Jurusan / Kosentrasi</th>
                          <th class="text-center" style="width:20%;background-color: #404040; color:white;">jam</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $queryDataJamMengajar = mysqli_query($konek, "SELECT * FROM jam_mengajar JOIN mapel ON jam_mengajar.id_mapel = mapel.id_mapel 
                          JOIN jurusan ON jam_mengajar.id_jurusan = jurusan.id_jurusan WHERE id_guru=".$_SESSION['id_user']);
                        $no=1;
                        while($dataJamaMengajar = mysqli_fetch_array($queryDataJamMengajar)){
                         ?>
                         <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td ><?php echo $dataJamaMengajar['nama_mapel']; ?></td>
                          <td class="text-center"><?php 
                          $queryDataRuangan = mysqli_query($konek,"SELECT * FROM wali_kelas WHERE id_wali_kelas=".$dataJamaMengajar['ruangan']);
                          while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){
                            echo $dataRuangan['kelas']." - ".$dataRuangan['nama_lokal'];
                          } ?></td>
                          <td class="text-center"><?php echo $dataJamaMengajar['nama_jurusan']; ?> - <?php echo $dataJamaMengajar['kosentrasi_jurusan']; ?></td>
                          <td class="text-center"><?php echo $dataJamaMengajar['jam_mulai']; ?> - <?php echo $dataJamaMengajar['jam_berakhir']; ?></td>
                        </tr>
                        <?php  $no++;}?>
                        
                        
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
</div>
<script src="../js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../layout/footer.php'; ?>
