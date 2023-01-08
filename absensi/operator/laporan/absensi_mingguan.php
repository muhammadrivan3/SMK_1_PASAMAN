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
            <h2 id="xs"><i class="icon-calendar"></i> ABSENSI </h2>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                      <div style="overflow-x:auto;">
                        <table class="table table-bordered" style="width:100%;">
                          <caption id="caption">ABSENSI MINGGUAN</caption>
                          <thead>
                            <tr>
                              <th class="text-center thFixed"
                              style="width:5%; border-radius: 10px 0 0 0 ;" rowspan="3">NO</th>
                              <th class="text-center thFixed " rowspan="3" style="min-width:300px;" >NAMA/NIS  </th>
                              <th class="text-center thFixed " rowspan="1" colspan="60" >MINGGU-1</th>
                              <th class="text-center thFixed" rowspan="2" colspan="5" >TOTAL</th>
                              <th class="text-center thFixed " rowspan="3" style="min-width:300px;border-radius: 0 10px 0 0;">KETERANGAN</th>
                              
                            </tr>
                           <tr>
                              <th  colspan="10" class="text-center thFixed">SENIN</th>
                              <th  colspan="10" class="text-center thFixed">SELASA</th>
                              <th  colspan="10" class="text-center thFixed">RABU</th>
                              <th  colspan="10" class="text-center thFixed">KAMIS</th>
                              <th  colspan="10" class="text-center thFixed">JUM'AT</th>
                              <th  colspan="10" class="text-center thFixed">SABTU</th>
                            </tr>
                            <tr>

                              <?php 
                              $loop_jam = 1;
                              for ($loop_jam; $loop_jam<7; $loop_jam++) { 
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
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
                              <td>H</td>
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
                              <td>Siswa Ini Agak Aneh, Namun dia Cabut hanya sesekali aja, Slebew... :)</td>
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

<script src="../../assets/js/custom/custom.js"></script>
<script >
  $('.pane-hScroll').scroll(function() {
    $('.pane-vScroll').width($('.pane-hScroll').width() + $('.pane-hScroll').scrollLeft());
  });
</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
