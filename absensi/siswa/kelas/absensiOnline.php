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
            <h2 id="xs"><i class="icon-calendar"></i> KELAS ONLINE </h2>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row">
                <?php 
                $hari = date('l');
                if ($hari == "Monday") {
                  // code...
                  $hari = "SENIN";
                }else if ($hari == "Tuesday") {
                  // code...
                  $hari = "SELASA";
                }else if ($hari == "Wednesday") {
                  // code...
                  $hari = "RABU";
                }else if ($hari == "Thursday") {
                  // code...
                  $hari = "KAMIS";
                }else if ($hari == "Friday") {
                  // code...
                  $hari = "JUMAT";
                }else if ($hari == "Saturday") {
                  // code...
                  $hari = "SABTU";
                }else if ($hari == "Sunday") {
                  // code...
                  $hari = "Minggu";
                }
                $queryAbsensiOnline = mysqli_query($konek, "SELECT * FROM jam_mengajar JOIN mapel ON mapel.id_mapel = jam_mengajar.id_mapel JOIN biodata_guru ON biodata_guru.id_guru = jam_mengajar.id_guru WHERE hari='".$hari."' AND kelas='".$_SESSION['kelas']."' AND ruangan=".$_SESSION['ruangan']." AND id_jurusan=".$_SESSION['jurusan']." ORDER BY jam_mulai");
                // echo date('l');
                $jamKe = 1;
                while ($dataAbsensiOnline = mysqli_fetch_array($queryAbsensiOnline)) {?>

                  <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms" style="visibility: visible; animation-delay: 250ms; animation-name: fadeInUp;">
                  <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/p6.jpg" alt="">
                  <!-- Kuliah Content -->
                  <div class="course-content">
                    <h4><?php echo strtoupper($dataAbsensiOnline['nama_mapel']); ?></h4>
                    <div class="meta  align-items-center">
                      <h6><?php $guruMengajar = $dataAbsensiOnline['id_guru'];echo strtoupper($dataAbsensiOnline['nama_guru']); ?></h6>
                    </div>           
                    <table border="0" width="100%">
                     <tbody><tr><td width="100"><i class="fa fa-calendar"></i> Hari </td><td>: <?php echo $dataAbsensiOnline['hari']; ?></td></tr><tr>
                     </tr><tr><td><i class="fa fa-clock-o"></i> Waktu </td><td>: <?php echo $dataAbsensiOnline['jam_mulai']."-".$dataAbsensiOnline['jam_berakhir']; ?> Wib</td></tr><tr>
                     </tr><tr><td><i class="fa fa-building-o"></i> Ruang </td><td>: <?php $queryDataRuangan = mysqli_query($konek,"SELECT * FROM wali_kelas WHERE id_wali_kelas=".$dataAbsensiOnline['ruangan']);
                     while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){echo $dataAbsensiOnline['kelas']."/".$dataRuangan['nama_lokal'];} ?></td></tr><tr>
                     </tr><tr><td><i class="fa fa-gift"></i> Jurusan </td><td>: <?php $queryDataJurusan = mysqli_query($konek,"SELECT * FROM jurusan WHERE id_jurusan=".$dataAbsensiOnline['id_jurusan']);
                     while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){echo $dataJurusan['nama_jurusan'];} ?></td></tr><tr>
                     <!-- </tr><tr><td><i class="fa fa-calendar-check-o"></i> Pertemuan Ke </td><td>: 15</td></tr><tr> -->
                     </tr></tbody></table>
                     <div class="img-pengampu">
                      <img class="foto-profil-card" src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/guru/<?php echo $dataAbsensiOnline['foto_guru']; ?>">
                    </div>
                  </div>
                  <!-- Seat Rating Fee -->
                  <div class="seat-rating-fee d-flex justify-content-between">
                    <div class="seat-rating h-100 d-flex ">
                      <div class="seat">
                        <!-- <i class="fa fa-user" aria-hidden="true"></i> 10 -->
                      </div>
                      <div class="rating">
                        <!-- <i class="fa fa-star" aria-hidden="true"></i> 4.5 -->
                      </div>
                    </div>
                    <div class="course-fee h-100">
                     <!--  <a href="detailAbsensiOnline?id_AbsensiKelas=<?php echo $dataAbsensiOnline['id_jam_mengajar']; ?>&jamKe=<?php echo $jamKe; ?> &hari=<?php echo $hari; ?>" class="kuliah blink">Masuk</a> -->
                      <?php date_default_timezone_set('Asia/Jakarta'); ?>
                      <?php $waktuSekarang = date('H:i:s A'); ?>
                      <?php if ($dataAbsensiOnline['jam_mulai'] <= $waktuSekarang && $dataAbsensiOnline['jam_berakhir']>= $waktuSekarang) {?>
                        <a href="detailAbsensiOnline?id_AbsensiKelas=<?php echo $dataAbsensiOnline['id_jam_mengajar']; ?>&jamKe=<?php echo $jamKe; ?> &hari=<?php echo $hari; ?>" class="kuliah blink">Masuk</a>
                      <!-- <a href="../prosses.php?tipe=absen_siswa&guru=<?php echo $guruMengajar; ?>&jam=<?php echo $dataAbsensiOnline['jam_mulai']; ?>" class="kuliah blink">Masuk</a>  -->
                      <?php  
                      }else{ ?>
                        <a href="" class="pendding" style="background-color: #808080;">Pending</a>
                      <?php } ?>                           
                    </div>
                  </div>
                </div>

                <?php
                $jamKe++;
                }
                 ?>
                
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
