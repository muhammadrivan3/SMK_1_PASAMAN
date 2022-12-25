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
                  <h2 id="xs" ><i class="icon-calendar"></i> GURU </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_jam_mengajar" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div id="myDiv" class="container-fluid">
                <form action="" method="GET">
                  <div class="container">
                   <div class="row row-cols-auto">

                    <!-- <div class="row row-cols-auto">
                      <div class="col-3">Jurusan</div>
                      <div class="col">:</div>
                      <div class="col">
                        <select name="jurusan" class="form-control" id="jurusan">
                          <option value="">Pilih Jurusan</option>
                        </select>
                      </div>                    
                    </div>
                    <br>
                    <div class="col">
                      <button style="padding-top: calc(0.375rem + 1px);
                      padding-bottom: calc(0.375rem + 1px);
                      margin-bottom: 0; width:100%; border-color:white;" type="submit"><i class="icon-search"></i>Cari</button>
                    </div> -->
                  </div>
                </form>
              </div>
              <br>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">No</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Nama/Nip</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Mata Pelajaran</th>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;">Kelas</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Jurusan</th>
                          <th class="text-center" style="background-color: #404040; color:white;">Mulai/Berakhir</th>
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $queryDataJamMengajar = mysqli_query($konek,"SELECT * FROM jam_mengajar JOIN biodata_guru ON jam_mengajar.id_guru = biodata_guru.id_guru JOIN mapel ON jam_mengajar.id_mapel = mapel.id_mapel JOIN jurusan ON jam_mengajar.id_jurusan = jurusan.id_jurusan");
                        $no=1;
                        while($dataJamMengajar = mysqli_fetch_array($queryDataJamMengajar)){
                        
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $no; ?></td>
                          <td class="text-center"><?php echo $dataJamMengajar['nama_guru']; ?> <br> Nip : <?php echo $dataJamMengajar['nip_guru']; ?> </td>
                          <td class="text-center"><?php echo $dataJamMengajar['nama_mapel']; ?></td>
                          <td class="text-center"><?php echo $dataJamMengajar['kelas']; ?></td>
                          <td class="text-center"><?php echo $dataJamMengajar['nama_jurusan']; ?> - <?php echo $dataJamMengajar['kosentrasi_jurusan']; ?></td>
                          <td class="text-center"><?php echo $dataJamMengajar['jam_mulai']; ?> - <?php echo $dataJamMengajar['jam_berakhir']; ?></td>
                          <td></td>
                        </tr>
                        <?php
                        $no++;} ?>
                        
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
<script >

</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
