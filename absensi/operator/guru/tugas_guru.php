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
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h2 id="xs" ><i class="icon-calendar"></i> Fungsi & Tugas Guru </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_tugas_guru" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                          <th class="text-center" style="background-color: #404040; color:white;">NAMA/NIP</th>
                          <th class="text-center" style="background-color: #404040; color:white;">PENDIDIKAN</th>
                          <th class="text-center" style="background-color: #404040; color:white;">MATA PELAJARAN <br/> TUGAS TAMBAHAN</th>
                          <th class="text-center" style="width: 5%;background-color: #404040; color:white;">KELAS</th>
                          <th class="text-center" style="width: 5%;background-color: #404040; color:white;">JMLH JAM</th>
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;;"colspan="2">OPTION</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $queryGetGuru = mysqli_query($konek,"SELECT * FROM biodata_guru JOIN tugas_tambahan ON biodata_guru.id_guru = tugas_tambahan.id_guru");
                          $no=1;
                          while($dataGuru=mysqli_fetch_array($queryGetGuru)){
                            if ($dataGuru['status_guru']!="admin") {
                              // code...
                            
                            ?>
                        <tr>
                          <td class="text-center"><?php echo $no;?></td>
                          <td class="text-center"><?php echo strtoupper($dataGuru['nama_guru']);?> <br> NIP : <?php echo $dataGuru['nip_guru'];?> </td>
                          <td class="text-center"><?php echo $dataGuru['pendidikan_guru'];?></td>
                          <td class="text-center"><?php echo $dataGuru['nama_tugas_tambahan'];?></td>
                          <td><?php echo $dataGuru['kelas_tugas_tambahan']; ?></td>
                          <td><?php echo $dataGuru['jam_tugas_tambahan']; ?></td>
                        </tr>
                        <?php
                          $no++;}}
                        ?>
                        <!-- <tr>
                          <td class="text-center">2</td>
                          <td class="text-center">EDI SUPARNI,S.Pd.M.Pd.T <br> Nip : 19770705 </td>
                          <td class="text-center">Teknik Informatika</td>
                          <td class="text-center">Kepala Sekolah</td>
                          <td></td>
                          <td>24</td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td class="text-center">EDI SUPARNI,S.Pd.M.Pd.T <br> Nip : 19770705 </td>
                          <td class="text-center">Teknik Informatika</td>
                          <td class="text-center">Kepala Sekolah</td>
                          <td></td>
                          <td>24</td>
                        </tr> -->
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
