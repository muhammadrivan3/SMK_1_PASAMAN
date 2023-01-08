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
            <h2 id="xs"><i class="icon-calendar"></i> GURU </h2>
            <div id="myDiv" class="container-fluid">
              <hr>
              <form action="" method="GET">
                <div class="container">
                 <div class="row row-cols-auto">
                  <div class="col-1">Kelas</div>
                  <div class="col">:</div>
                  <div class="col">
                    <select name="kelas" class="form-control" id="kelas" style="width:200px;">
                      <option value="">Kelas</option>
                      <option value="X">X</option>
                      <option value="XI">XI</option>
                      <option value="XII">XII</option>
                    </select>
                  </div>
                  <div class="col-1">Lokal</div>
                  <div class="col">:</div>
                  <div class="col-2">
                    <select name="lokal" class="form-control" id="lokal" style="width:200px;">
                      <option value="">Lokal</option>
                      <?php 
                      $queryDataRuangan = mysqli_query($konek, "SELECT * FROM wali_kelas ");
                      while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){
                        echo "<option value=".$dataRuangan['id_wali_kelas'].">".$dataRuangan['nama_lokal']."</option>";
                        ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row row-cols-auto">
                  <div class="col-1">Jurusan</div>
                  <div class="col">:</div>
                  <div class="col">
                    <select name="jurusan" class="form-control" id="jurusan" style="width:200px; margin: ;">
                      <option value="">Jurusan</option>
                      <?php 
                      $queryDataJurusan = mysqli_query($konek, "SELECT * FROM jurusan;");

                      while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){
                        if ($dataJurusan['kosentrasi_jurusan'] != null) {
                            // code...
                          echo "<option value=".$dataJurusan['id_jurusan'].">".$dataJurusan['nama_jurusan']."-".$dataJurusan['kosentrasi_jurusan']."</option>";
                        }else{
                          echo "<option value=".$dataJurusan['id_jurusan'].">".$dataJurusan['nama_jurusan']."</option>";
                        }
                        ?>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-1">Bulan</div>
                  <div class="col">:</div>
                  <div class="col"><input type="month" name="tgl_absen" class="form-control" style="width:200px;"></div>
                </div>
                <br>
                <div class="row row-cols-auto">

                  <div class="col">
                    <button style="padding-top: calc(0.375rem + 1px);
                    padding-bottom: calc(0.375rem + 1px);
                    margin-bottom: 0; width:20%; border-color:white; width:100px;" type="submit"><i class="icon-search"></i>Cari</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <br>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title">
                  <div style="overflow-x:auto;">
                    <table class="table table-bordered" style="width:100%;">
                      <caption id="caption">Absensi Bulanan</caption>
                      <thead>
                        <tr>
                          <th class="text-center thFixed"
                          style="width:5%; border-radius: 10px 0 0 0 ;" rowspan="3">No</th>
                          <th class="text-center thFixed " rowspan="2" style="min-width:300px;" >Nama/Nis  </th>
                          <th class="text-center thFixed " rowspan="1" colspan="31" >Bulanan</th>
                          <th class="text-center thFixed" rowspan="1" colspan="5" >Total</th>
                          <th class="text-center thFixed " rowspan="2" style="min-width:300px;border-radius: 0 10px 0 0;">Keterangan</th>

                        </tr>
                        <tr>

                          <?php 
                          $loop_jam = 1;
                          for ($loop_jam; $loop_jam<32; $loop_jam++) { 
                               // for ($i=1; $i <= 10; $i++) { 
                            ?>
                            <th style="width: 2%;"><?php echo $loop_jam; ?></th>

                            <?php
                               // }
                          } ?>
                          <th class="text-center thFixed">H</th>
                          <th class="text-center thFixed">I</th>
                          <th class="text-center thFixed">S</th>
                          <th class="text-center thFixed">A</th>
                          <th class="text-center thFixed">C</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET['kelas']) && isset($_GET['lokal']) && isset($_GET['jurusan']) ){
                          $get_kelas = $_GET['kelas'];
                          $get_lokal = $_GET['lokal'];
                          $get_jurusan = $_GET['jurusan'];
                          $tgl_absen =explode("-", $_GET['tgl_absen']);
                          $date_start = strtotime($tgl_absen[0]."-".$tgl_absen[1]."-"."01");
                          $date_end = strtotime('last day of this month', $date_start);
                          $tgl_absensi_mulai = date('Y-m-d',$date_start);
                          $tgl_absensi_berakhir = date('Y-m-d',$date_end);
                          $query = "SELECT * FROM biodata_siswa WHERE kelas_siswa = '$get_kelas' AND lokal_siswa = '$get_lokal' AND jurusan_siswa = '$get_jurusan';";
                          $query_tampilSiswa = mysqli_query($konek, $query);
                          $no = 1;
                          if(mysqli_num_rows($query_tampilSiswa) > 0){
                            foreach($query_tampilSiswa as $items){
                             ?>
                             <tr>
                              <td><?php echo "".$no++; ?> </td>
                              <td><?php echo strtoupper($items['nama_siswa']);?></td>

                              <?php
                              $lop = 10;
                              $hadir=0;
                              $alfa=0;
                              $cabut=0;
                              $izin=0;
                              $sakit=0;
                              $i=1;
                              $begin = new DateTime( $tgl_absensi_mulai );
                              $end = new DateTime( $tgl_absensi_berakhir );
                              $end = $end->modify( '+1 day' ); 

                              $interval = new DateInterval('P1D');
                              $daterange = new DatePeriod($begin, $interval ,$end);
                              foreach($daterange as $date1){
                                $tglDimulai = $date1->format("Y-m-d");

                                $queryDataAbsensi = mysqli_query($konek,"SELECT * FROM absensi_siswa  WHERE id_siswa=".$items['id_siswa']." AND id_wali_kelas=".$get_lokal." AND id_jurusan=".$get_jurusan." AND jam_absensi=".$i." AND tgl_absensi='".$tglDimulai."'");
                                if(mysqli_num_rows($queryDataAbsensi) > 0){
                                  if (date('l',strtotime($tglDimulai)) != 'Sunday') {
                                    // code...
                                      while($dataAbsenSiswa = mysqli_fetch_array($queryDataAbsensi)){
                                      if ($dataAbsenSiswa['absensi']=='H') {
                                              // code...
                                        $hadir++;
                                      }else if ($dataAbsenSiswa['absensi']=='A') {
                                              // code...
                                        $alfa++;
                                      }else if ($dataAbsenSiswa['absensi']=='C') {
                                              // code...
                                        $cabut++;
                                      }else if ($dataAbsenSiswa['absensi']=='I') {
                                              // code...
                                        $izin++;
                                      }else if ($dataAbsenSiswa['absensi']=='S') {
                                              // code...
                                        $sakit++;
                                      }
                                      if ($dataAbsenSiswa['absensi']=="C" || $dataAbsenSiswa['absensi']=="A") {
                                          // code...
                                        echo "<td style='color:red;'>".$dataAbsenSiswa['absensi']."</td>";
                                      }else{
                                        echo "<td>".$dataAbsenSiswa['absensi']."</td>";
                                      }
                                    }
                                  }else{
                                    echo "<td></td>";
                                  }
                                  
                                }else{
                                  echo "<td></td>";
                                }
                                // for ($i=1; $i <= $lop; $i++) {

                                // }
                              }
                              echo "<td>".$hadir."</td>";
                                echo "<td>".$izin."</td>";
                                echo "<td>".$sakit."</td>";
                                echo "<td>".$alfa."</td>";
                                echo "<td>".$cabut."</td>";
                              ?>

                            </tr>
                            <?php 
                          }
                        }



                      } ?>
                            <!-- <tr>
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
                              
                              
                              <td>60</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>Dalam Bulan Ini, Siswa yang bersangkutan ada Kemajuan Untuk Bolos Sekolah</td>
                            </tr> -->

                            
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
