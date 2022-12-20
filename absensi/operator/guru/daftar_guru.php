<?php
include "../../db/koneksi.php";
include "../akses.php";
include "../../layout/header.php"
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
                  <h2 id="xs" ><i class="icon-calendar"></i> GURU </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_guru" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>

            <div id="myDiv" class="container-fluid">

              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                     <table class="table table-bordered" >
                      <thead>
                        <tr>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">No</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Nama/Nip</th>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;">L/P</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Tgl Lahir</th>
                          <th class="text-center"style="background-color: #404040; color:white;">Alamat</th>
                          <th class="text-center"style="background-color: #404040; color:white;">Status</th>
                          <th class="text-center"style="background-color: #404040; color:white;">Jabatan</th>
                          <th class="text-center"style="background-color: #404040; color:white;">Telepon</th>
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">Option</th>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">EDI SUPARNI,S.Pd.M.Pd.T <br> Nip : 19770705 </td>
                        <td class="text-center" style="widtd:5%;">L</td>
                        <td class="text-center">24-08-1988</td>
                        <td class="text-center">Pasaman Baru</td>
                        <td class="text-center">PNS</td>
                        <td class="text-center">Kepala Sekolah</td>
                        <td class="text-center">0812xxx</td>
                        <td class="text-center" colspan="2">Option</td>
                      </tr>
                      <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">EDI SUPARNI,S.Pd.M.Pd.T <br> Nip : 19770705 </td>
                        <td class="text-center" style="widtd:5%;">L</td>
                        <td class="text-center">24-08-1988</td>
                        <td class="text-center">Pasaman Baru</td>
                        <td class="text-center">PNS</td>
                        <td class="text-center">Kepala Sekolah</td>
                        <td class="text-center">0812xxx</td>
                        <td class="text-center" colspan="2">Option</td>
                      </tr>
                      <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">EDI SUPARNI,S.Pd.M.Pd.T <br> Nip : 19770705 </td>
                        <td class="text-center" style="widtd:5%;">L</td>
                        <td class="text-center">24-08-1988</td>
                        <td class="text-center">Pasaman Baru</td>
                        <td class="text-center">PNS</td>
                        <td class="text-center">Kepala Sekolah</td>
                        <td class="text-center">0812xxx</td>
                        <td class="text-center" colspan="2">Option</td>
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
<script type="text/javascript">
  var nav = document.querySelector('nav');

  window.addEventListener('scroll', function () {
    if (window.pageYOffset > 50) {
      nav.classList.add('bg-dark', 'shadow');
    } else {
      nav.classList.remove('bg-dark', 'shadow');
    }
  });
</script>

<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>