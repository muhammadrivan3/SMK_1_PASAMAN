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
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/pelajaran/tambah_mapel" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
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
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>

                          <th class="text-center" style="background-color: #404040; color:white;">MATA PELAJARAN</th>
                          <!-- <th class="text-center" style="width:5%;background-color: #404040; color:white;">Kelas</th> -->
                          <th class="text-center" style="width:20%;background-color: #404040; color:white;">JURUSAN / KOSENTRASI</th>
                          
                          <th class="text-center" colspan="2" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;">OPTION</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                        $queryDataMapel = mysqli_query($konek,"SELECT * FROM mapel JOIN jurusan ON mapel.Kosentrasi = jurusan.id_jurusan");
                        $no=1;
                        while($dataMapel = mysqli_fetch_array($queryDataMapel)){?>
                          <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td ><?php echo $dataMapel['nama_mapel']; ?></td>
                          
                          <td class="text-center"><?php echo $dataMapel['nama_jurusan']."-".$dataMapel['kosentrasi_jurusan']; ?></td>
                        </tr>


                        <?php $no++;} ?>
                        
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
