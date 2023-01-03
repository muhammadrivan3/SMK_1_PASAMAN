<?php
include '../../db/koneksi.php';
include '../akses.php';
include '../../layout/header.php';
?>

<div id="content" style="margin-top:60px;">
  <div class="regular-page-area section-padding-20">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="details-content">
            <h2 id="xs"><i class="icon-calendar"></i> DAFTAR ABSENSI </h2>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                      <div style="overflow-x:auto;">
                        <table class="table table-bordered" style="width:100%;">
                          <caption id="caption">Absensi Harian</caption>
                          <thead>
                            <tr>
                              <th class="text-center thFixed"
                              style="width:5%; border-radius: 10px 0 0 0 ;" rowspan="3">No</th>
                              <th class="text-center thFixed " rowspan="3" style="min-width:300px;" >Nama/Nis  </th>
                              <th class="text-center thFixed " rowspan="1" colspan="10" >Hari</th>
                              
                              <th class="text-center thFixed" rowspan="2" colspan="5" style="">Total</th>
                              <th class="text-center thFixed " rowspan="3" style="min-width:300px;border-radius: 0 10px 0 0;">Keterangan</th>
                            </tr>
                           <tr>
                              <th  colspan="10" class="text-center thFixed">Senin</th>
                            </tr>
                            <tr>

                              <?php 
                              $loop_jam = 1;
                              for ($loop_jam; $loop_jam<2; $loop_jam++) { 
                               for ($i=1; $i <= 10; $i++) { 
                                ?>
                                <th style="width: 2%;"><?php echo $i; ?></th>

                              <?php }
                            } ?>
                            <th class="text-center thFixed">H</th>
                            <th class="text-center thFixed">I</th>
                            <th class="text-center thFixed">S</th>
                            <th class="text-center thFixed">A</th>
                            <th class="text-center thFixed">C</th>
                          </tr>

                        </thead>
                        <tbody>
                            <tr>
                              <td>1</td>
                              <td style="width:300px;">Muhammad Rivan</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>C</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              
                              
                              <td>60</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>Jam ke-1 Dia Hadir, Namun Dia Cabut Di Jam Ke-5, Emang Kelakuan Dia Kayak Gitu, Aneh Ananda Ini</td>
                            </tr>

                            
                          </tbody>
                        </table>
                      </div>
                    </div>

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
</div>

<script src="../../js/custom/custom.js"></script>
<script >
  $('.pane-hScroll').scroll(function() {
    $('.pane-vScroll').width($('.pane-hScroll').width() + $('.pane-hScroll').scrollLeft());
  });
</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
