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
                  <h2 id="xs" ><i class="icon-calendar"></i> MATA PELAJARAN </h2>
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
                          <th class="text-center" style="width:3%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>

                          <th class="text-center" style=" width: 32%; background-color: #404040; color:white;">MATA PELAJARAN</th>
                          <th class="text-center" style="background-color: #404040; color:white;">GURU</th>
                          <th class="text-center" style="background-color: #404040; color:white;">JAM</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $queryDataSiswa = mysqli_query($konek,"SELECT * FROM biodata_siswa WHERE id_siswa=".$_SESSION['id_user']);
                        
                        while($dataSiswa = mysqli_fetch_array($queryDataSiswa)){?>
                          <?php
                          $arrayHari = array('SENIN','SELASA','RABU','KAMIS',"JUM'AT",'SABTU');
                          foreach($arrayHari as $hari){
                            echo "<tr><td></td><td class='text-center' colspan='3' style='opacity:50%;background-color:#999999; color:white; border-radius: 10px 10px 0 0 ;'>".$hari."</td></tr>";
                        ?>
                        <?php
                        $no=1;
                        $queryDataMepel = mysqli_query($konek,"SELECT * FROM jam_mengajar JOIN mapel ON jam_mengajar.id_mapel = mapel.id_mapel JOIN biodata_guru ON jam_mengajar.id_guru = biodata_guru.id_guru WHERE kelas='".$dataSiswa['kelas_siswa']."' AND ruangan=".$dataSiswa['lokal_siswa']." AND id_jurusan=".$dataSiswa['jurusan_siswa']." AND hari='".$hari."'");
                        if ($queryDataMepel != null) {
                          // code...
                        
                        while($dataMapel = mysqli_fetch_array($queryDataMepel)){?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $dataMapel['nama_mapel']; ?></td>
                              <td><?php echo strtoupper($dataMapel['nama_guru']); ?></td>
                              <td><?php echo $dataMapel['jam_mulai']; ?> - <?php echo $dataMapel['jam_berakhir']; ?></td>
                            </tr>
                        <?php
                        $no++;
                        }}
                         ?>
                        <?php
                          }
                        }
                        ?>
                        
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
<script src="../../js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
