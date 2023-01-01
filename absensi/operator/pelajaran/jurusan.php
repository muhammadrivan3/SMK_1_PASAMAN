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
                  <h2 id="xs" ><i class="icon-calendar"></i> JURUSAN </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/pelajaran/tambah_jurusan" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>

            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> 
                      <!-- <div class="widget-content nopadding"> -->
                       <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                            
                            <th class="text-center" style="background-color: #404040; color:white;" >NAMA JURUSAN</th>
                            <th class="text-center" style="background-color: #404040; color:white;" >KOSENTRASI</th>
                            <th class="text-center" style="background-color: #404040; color:white;" >KAPROKA</th>
                            <th class="text-center" colspan="2" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;">OPTION</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $queryDataJurusan = mysqli_query($konek,"SELECT * FROM jurusan JOIN biodata_guru ON jurusan.kaproka_jurusan = biodata_guru.id_guru ");
                          $no=1;
                          while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){
                            ?>
                          <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td class="text-center" ><?php echo $dataJurusan['nama_jurusan']; ?></td>
                            <td class="text-center" ><?php echo $dataJurusan['kosentrasi_jurusan']; ?></td>
                            <td class="text-center" ><?php echo strtoupper($dataJurusan['nama_guru']); ?></td>
                            <td class="text-center"></td>
                          </tr>
                          <?php 
                          $no++;
                          } ?>
                          

                        </tbody>
                      </table>
                      <!-- A button to open the popup form -->
                      
                      

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
</div>
<script src="../../js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
