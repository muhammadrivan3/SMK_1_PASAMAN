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
                  <div class="col-1">Minggu</div>
                  <div class="col">:</div>
                  <div class="col">
                    <select name="minggu" class="form-control" id="jam" style="width:200px;">
                      <option value="">Minggu</option>
                      <?php 
                      $jam=5;
                      for($jam=1; $jam<=6;$jam++){
                        echo "<option value=".$jam.">".$jam."</option>";
                        ?>
                      <?php } ?>
                    </select>
                  </div>
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
                  <form action="cetak.php?absensi=Mingguan" method="post" class="form-container" style="margin:10px" autocomplete="false">
                  <div style="overflow-x:auto;">
                    <table class="table table-bordered" style="width:100%;">
                      <caption id="caption">Absensi Mingguan</caption>
                      <thead>
                        <tr>
                          <th class="text-center thFixed"
                          style="width:5%; border-radius: 10px 0 0 0 ;" rowspan="3">NO</th>
                          <th class="text-center thFixed " rowspan="3" style="min-width:300px;" >NAMA/NIS  </th>
                          <th class="text-center thFixed " rowspan="1" colspan="60" >BULAN<br>MINGGU/HARI</th>
                          <th class="text-center thFixed" rowspan="2" colspan="5" >TOTAL</th>
                          <th class="text-center thFixed " rowspan="3" style="min-width:300px;border-radius: 0 10px 0 0;">Keterangan</th>
                        </tr>
                        <tr>
                          <th  colspan="10" class="text-center thFixed">Senin</th>
                          <th  colspan="10" class="text-center thFixed">Selasa</th>
                          <th  colspan="10" class="text-center thFixed">Rabu</th>
                          <th  colspan="10" class="text-center thFixed">Kamis</th>
                          <th  colspan="10" class="text-center thFixed">Jum'at</th>
                          <th  colspan="10" class="text-center thFixed">Sabtu</th>
                          <!-- <th style="width:100%;" class="text-center thFixed">Minggu</th> -->
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
                      <?php 

                      if(isset($_GET['kelas']) && isset($_GET['lokal']) && isset($_GET['jurusan']) ){

                        $get_kelas = $_GET['kelas'];
                        $get_lokal = $_GET['lokal'];
                        $get_jurusan = $_GET['jurusan'];
                        $tgl_absen =explode("-", $_GET['tgl_absen']);
                        $mingguke = $_GET['minggu'];
                        ?>
                        <input type='hidden' name='get_kelas' value="<?php echo $get_kelas; ?>" />
                        <input type='hidden' name='get_lokal' value="<?php echo $get_lokal; ?>" />
                        <input type='hidden' name='get_jurusan' value="<?php echo $get_jurusan; ?>" />
                        <input type='hidden' name='tgl_absen1' value="<?php echo $tgl_absen[0]; ?>" />
                        <input type='hidden' name='tgl_absen2' value="<?php echo $tgl_absen[1]; ?>" />
                        <input type='hidden' name='mingguke' value="<?php echo $mingguke; ?>" />
                        <?php
                        $date_start = strtotime($tgl_absen[0]."-".$tgl_absen[1]."-"."01");
                        $month_start = date('l',strtotime($tgl_absen[0]."-".$tgl_absen[1]."-"."01"));
                        if ($month_start == 'Sunday') {
                            // code...
                          $day_start = strtotime("-6 day", $date_start);
                        }else if($month_start == 'Saturday'){
                          $day_start = strtotime("-5 day", $date_start);
                        }else if($month_start == 'Friday'){
                          $day_start = strtotime("-4 day", $date_start);
                        }else if($month_start == 'Thursday'){
                          $day_start = strtotime("-3 day", $date_start);
                        }else if($month_start == 'Wednesday'){
                          $day_start = strtotime("-2 day", $date_start);
                        }else if($month_start == 'Tuesday'){
                          $day_start = strtotime("-2 day", $date_start);
                        }else{
                          $day_start = $date_start;
                        }


                        $date_end = strtotime($tgl_absen[0]."-".$tgl_absen[1]."-".date('t',strtotime( $tgl_absen[0]."-".$tgl_absen[1]."-"."01")));
                        $month_end = date('l',$date_end);

                        if ($month_end == 'Sunday') {
                            // code...
                          $day_end = strtotime("+1 day", $date_end);
                        }else if($month_end == 'Saturday'){
                          $day_end = strtotime("+2 day", $date_end);
                        }else if($month_end == 'Friday'){
                          $day_end = strtotime("+3 day", $date_end);
                        }else if($month_end == 'Thursday'){
                          $day_end = strtotime("+4 day", $date_end);
                        }else if($month_end == 'Wednesday'){
                          $day_end = strtotime("+5 day", $date_end);
                        }else if($month_end == 'Tuesday'){
                          $day_end = strtotime("+6 day", $date_end);
                        }else{
                          $day_end = $date_end;
                        }

                        $tgl_mulai = date('l',strtotime(date('Y-m-d', $day_start)))." ".date('Y-m-d', $day_start);
                        $tgl_berakhir = date('l',strtotime(date('Y-m-d', $day_end)))." ".date('Y-m-d', $day_end);



                        if ($mingguke == 1) {

                            // code...
                          
                          $tgl_absensi_mulai = date('Y-m-d', $day_start);
                          $tgl_absensi_berakhir = date('Y-m-d',strtotime("+5 day", $day_start));
                        }else if ($mingguke == 2) {

                            // code...
                         
                          $tgl_absensi_mulai = date('Y-m-d', strtotime("+7 day", $day_start));
                          $tgl_absensi_berakhir = date('Y-m-d',strtotime("+12 day", $day_start));
                        }
                        else if ($mingguke == 3) {

                            // code...
                          
                          $tgl_absensi_mulai = date('Y-m-d', strtotime("+14 day", $day_start));
                          $tgl_absensi_berakhir = date('Y-m-d',strtotime("+19 day", $day_start));
                        }
                        else if ($mingguke == 4) {

                            // code...
                         
                          $tgl_absensi_mulai = date('Y-m-d', strtotime("+21 day", $day_start));
                          $tgl_absensi_berakhir = date('Y-m-d',strtotime("+26 day", $day_start));
                        }
                        else if ($mingguke == 5) {
                            // code...
                         
                          $tgl_absensi_mulai = date('Y-m-d', strtotime("+28 day", $day_start));
                          $tgl_absensi_berakhir = date('Y-m-d',strtotime("+33 day", $day_start));
                        }else if ($mingguke == 6) {
                            // code...
                         
                          $tgl_absensi_mulai = date('Y-m-d', strtotime("+35 day", $day_start));
                          $tgl_absensi_berakhir = date('Y-m-d',strtotime("+40 day", $day_start));
                        }
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
                              $test=6;
                              // $i=1;
                              $begin = new DateTime( $tgl_absensi_mulai );
                              $end = new DateTime( $tgl_absensi_berakhir );
                              $end = $end->modify( '+1 day' ); 

                              $interval = new DateInterval('P1D');
                              $daterange = new DatePeriod($begin, $interval ,$end);
                              foreach($daterange as $date1){
                                $tglDimulai = $date1->format("Y-m-d");
                                for ($i=1; $i <= $lop; $i++) {
                                  // echo "<td>".$tglDimulai."</td>";
                                 $queryDataAbsensi = mysqli_query($konek,"SELECT * FROM absensi_siswa  WHERE id_siswa=".$items['id_siswa']." AND id_wali_kelas=".$get_lokal." AND id_jurusan=".$get_jurusan." AND jam_absensi=".$i." AND tgl_absensi='".$tglDimulai."'");
                                 if(mysqli_num_rows($queryDataAbsensi) > 0){
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


                              }
                            }
                            echo "<td>".$hadir."</td>";
                                echo "<td>".$izin."</td>";
                                echo "<td>".$sakit."</td>";
                                echo "<td>".$alfa."</td>";
                                echo "<td>".$cabut."</td>";

                            ?>


                          </tr>
                          <?php 
                          $no++;}
                        }
                      }
                      ?>
                      </tbody>
                    </table>
                    
                  </div>
                  <div align="right">
                        <input type="submit" value="Print" name="simpan" style="width:10%;">
                      </div>
                </div>
              </form>
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
