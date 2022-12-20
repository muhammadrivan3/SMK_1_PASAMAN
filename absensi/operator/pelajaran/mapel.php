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

            <h2><i class="icon-calendar"></i> Mata Pelajaran </h2>

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
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;">Kelas</th>
                          <th class="text-center" style="width:20%;background-color: #404040; color:white;">Jurusan / Kosentrasi</th>
                          
                          <th class="text-center" colspan="2" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;">Option</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td class="text-center">1</td>
                          <td >MATEMATIKA</td>
                          <td class="text-center">X-A1</td>
                          <td class="text-center">Akuntansi</td>
                        </tr>
                        <tr>
                          <td class="text-center">2</td>
                          <td >IPA</td>
                          <td class="text-center">X-A1</td>
                          <td class="text-center">Akuntansi</td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td >PKN</td>
                          <td class="text-center">X-A1</td>
                          <td class="text-center">Akuntansi</td>
                        </tr>
                        <tr>
                          <td class="text-center">4</td>
                          <td >B.INDONESIA</td>
                          <td class="text-center">X-A1</td>
                          <td class="text-center">Akuntansi</td>
                        </tr>
                        <tr>
                          <td class="text-center">5</td>
                          <td >Akuntansi Keuangan</td>
                          <td class="text-center">X-A1</td>
                          <td class="text-center">Akuntansi-Keuangan</td>
                        </tr>
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
