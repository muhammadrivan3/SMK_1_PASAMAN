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
                            <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">No</th>
                            
                            <th class="text-center" style="background-color: #404040; color:white;" >Nama Jurusan</th>
                            <th class="text-center" style="background-color: #404040; color:white;" >Kosentrasi</th>
                            <th class="text-center" style="background-color: #404040; color:white;" >Kaproka</th>
                            <th class="text-center" colspan="2" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;">Option</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">1</td>
                            <td class="text-center" >Akuntansi</td>
                            <td class="text-center" >Keuangan</td>
                            <td class="text-center" >Hendri,S.Pd</td>
                            <td class="text-center"></td>
                          </tr>
                          <tr>
                            <td class="text-center">2</td>
                            
                            <td class="text-center" >Akuntansi</td>
                            <td class="text-center" >Pajak</td>
                            <td class="text-center" >Hendra,S.Pd</td>
                            <td class="text-center"></td>

                          </tr>

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
