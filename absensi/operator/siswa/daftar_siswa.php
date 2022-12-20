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

            <h2><i class="icon-calendar"></i> SISWA </h2>

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
                        <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">Muhammad Rivan <br> Nis : 123456789 </td>
                        <td class="text-center" style="widtd:5%;">L</td>
                        <td class="text-center">24-08-1988</td>
                        <td class="text-center">Pasaman Baru</td>
                        <td class="text-center">X-A1</td>
                        <td class="text-center">Akuntansi</td>
                        <td class="text-center">0812xxx</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">Muhammad Rivan <br> Nis : 123456789 </td>
                        <td class="text-center" style="widtd:5%;">L</td>
                        <td class="text-center">24-08-1988</td>
                        <td class="text-center">Pasaman Baru</td>
                        <td class="text-center">X-A1</td>
                        <td class="text-center">Akuntansi</td>
                        <td class="text-center">0812xxx</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">Muhammad Rivan <br> Nis : 123456789 </td>
                        <td class="text-center" style="widtd:5%;">L</td>
                        <td class="text-center">24-08-1988</td>
                        <td class="text-center">Pasaman Baru</td>
                        <td class="text-center">X-A1</td>
                        <td class="text-center">Akuntansi</td>
                        <td class="text-center">0812xxx</td>
                        <td></td>
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
<script src="../../js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
