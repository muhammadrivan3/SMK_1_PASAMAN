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

              <h2><i class="icon-calendar"></i> Lokal </h2>

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
                              <th class="text-center" style="width:5%;background-color: #404040; color:white;" >Kelas</th>
                              <!-- <th class="text-center" >Jurusan</th> -->
                              <th class="text-center" style="background-color: #404040; color:white;" >Nama Lokal</th>
                              <th class="text-center" style="background-color: #404040; color:white;" >Wali Kelas</th>
                              <th class="text-center" colspan="2" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;">Option</th>
                              <!-- <th colspan="10">Mata Pelajaran</th> -->
                              
                          </tr>
                          </thead>
                          <tbody>
                           <tr>
                             <td>1</td>
                             <td>X</td>
                             <td>A1</td>
                             <td>Abulwafa,S.pd</td>
                           </tr>
                           <tr>
                             <td>2</td>
                             <td>X</td>
                             <td>A2</td>
                             <td>Abulwafa,S.pd</td>
                           </tr>
                           <tr>
                             <td>3</td>
                             <td>X</td>
                             <td>A3</td>
                             <td>Abulwafa,S.pd</td>
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
