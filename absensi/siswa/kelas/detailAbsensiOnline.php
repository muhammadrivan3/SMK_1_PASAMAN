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
            <div class="row">
              <div class="col-11">
                <h2 id="xs"><i class="icon-calendar"></i> KELAS ONLINE </h2>
              </div>
              <div class="col">
                <div class="course-fee h-100">
                  <?php 
                  $hari = date('Y-m-d');
                  
                  $queryCheckAbsen = "SELECT * FROM absensi_siswa WHERE id_siswa=".$_SESSION['id_user']." AND tgl_absensi='".$hari."' AND jam_absensi=".$_GET['jamKe'];
                  $showCheck =mysqli_query($konek,$queryCheckAbsen);
                  if(mysqli_num_rows($showCheck)>0){ ?>
                    <a href="#" class="pendding" style="padding: 10px; color:white; margin-top:30px; text-align:center; background-color: #808080;">HADIR</a>
                    <?php }else{ ?>

                      <a href="../prosses.php?tipe=absen_siswa&jamKe=<?php echo $_GET['jamKe']; ?>&guru=<?php echo $_GET['guru']; ?>" class="kuliah blink" style="padding: 10px; color:white; margin-top:30px; text-align:center;">Masuk</a>
                      <!-- <a href="detailAbsensiOnline?tipe=absen_siswa&guru=<?php echo $guruMengajar; ?>&jam=<?php echo $dataAbsensiOnline['jam_mulai']; ?>" class="kuliah blink" style="padding: 10px; color:white; margin-top:30px; text-align:center;">Masuk</a> -->
                      <?php }
                      ?>

                    </div>
                  </div>
                </div>
                <div id="myDiv" class="container-fluid">
                  <hr>
                  <?php
                  $queryDataKelas =mysqli_query($konek, "SELECT * FROM jam_mengajar JOIN mapel ON mapel.id_mapel = jam_mengajar.id_mapel JOIN biodata_guru ON biodata_guru.id_guru = jam_mengajar.id_guru WHERE id_jam_mengajar=".$_GET['id_AbsensiKelas']); 
                  while($dataKelas = mysqli_fetch_array($queryDataKelas)){
                    ?>
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <h3><?php echo strtoupper($dataKelas['nama_mapel']);?></h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <div class="container" style="margin-left:0; padding-left: 0;">
                            <div class="row row-cols-auto">
                              <div class="col-2">
                                <label>KELAS/RUANGAN</label>
                              </div>
                              <div class="col">
                                <label>: 
                                  <?php $queryDataRuangan = mysqli_query($konek,"SELECT * FROM wali_kelas WHERE id_wali_kelas=".$dataKelas['ruangan']);
                                  while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){echo $dataKelas['kelas']."/".$dataRuangan['nama_lokal'];} ?>

                                </label>
                              </div>
                            </div>
                            <div class="row row-cols-auto">
                              <div class="col-2">
                                <label>JURUSAN</label>

                              </div>
                              <div class="col">
                                <label>: <?php $queryDataJurusan = mysqli_query($konek,"SELECT * FROM jurusan WHERE id_jurusan=".$dataKelas['id_jurusan']);
                                while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){echo $dataJurusan['nama_jurusan'];} ?></label>
                              </div>
                            </div>
                            <div class="row row-cols-auto">
                              <div class="col-2">
                                <label>JAM</label>

                              </div>
                              <div class="col">
                                <label>: <?php echo $dataKelas['jam_mulai']."-".$dataKelas['jam_berakhir']; ?> Wib</label>
                              </div>
                            </div>
                            <div class="row row-cols-auto">
                              <div class="col-2">
                                <label>GURU</label>

                              </div>
                              <div class="col">
                                <label>: <?php echo strtoupper($dataKelas['nama_guru']); ?></label>
                              </div>
                            </div>
                            <div class="row row-cols-auto">
                              <div class="col-2">
                                <label>WALI KELAS</label>

                              </div>
                              <div class="col">
                                <label>: <?php $queryDataRuangan = mysqli_query($konek,"SELECT * FROM wali_kelas  JOIN biodata_guru ON wali_kelas.guru = biodata_guru.id_guru WHERE id_wali_kelas=".$dataKelas['ruangan']);
                                while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){echo strtoupper($dataRuangan['nama_guru']);} ?></label>
                              </div>
                            </div>
                          </div>  
                        </div>
                        <div class="col-4">
                          <div class="container" style="margin-left:0; padding-left: 0; width: 100%;">
                            <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/guru/<?php echo $dataKelas['foto_guru']; ?>" style="width: 70%; height:200px; ">
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div>
                      <caption ><span style="opacity: 50%;">Link : Tugas</span></caption>
                      <textarea style="width:100%; height:300px;"></textarea>
                    </div>
                  <?php }?>
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
