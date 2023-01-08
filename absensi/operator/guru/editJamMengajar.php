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
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h2 id="xs" ><i class="icon-calendar"></i> Jam Mengajar </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_guru" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="m-4">
                <?php 
                $queryDataJamMengajar = mysqli_query($konek, "SELECT * FROM jam_mengajar WHERE id_jam_mengajar=".$_GET['jam_mengajar']);
                while($dataJamMengajar = mysqli_fetch_array($queryDataJamMengajar)){
                  echo "string";
                  }
                 ?>
                
                <form action="../prosses.php?edit=jamMengajar" method="post" class="form-container" style="margin:10px" autocomplete="false">
                  <h1>Tambahkan Jam Mengajar</h1>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    :
                    <div class="col-sm-8">
                      <select name="kelas" class="form-control" id="kelas">
                        <option value="">Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Ruangan</label>
                    :
                    <div class="col-sm-8">
                      <select name="lokal" class="form-control" id="kelas">
                        <option value="">Ruangan</option>
                        <?php 
                        $queryDataRuangan = mysqli_query($konek, "SELECT * FROM wali_kelas");
                        while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){
                          ?>
                          <option value="<?php echo $dataRuangan['id_wali_kelas']; ?>"> <?php echo $dataRuangan['nama_lokal']; ?></option>
                        <?php
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jurusan</label>
                    :
                    <div class="col-sm-8">
                      <select name="jurusan" class="form-control" id="jurusan">
                        <option value="">Jurusan</option>
                        <?php 
                       $queryDataJurusan = mysqli_query($konek,"SELECT * FROM jurusan");
                       
                       while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){
                       

                        ?>
                        <option value="<?php echo $dataJurusan['id_jurusan']; ?>"><?php echo $dataJurusan['nama_jurusan']; ?> - <?php echo $dataJurusan['kosentrasi_jurusan']; ?></option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    :
                    <div class="col-sm-8">
                      <select name="guru" class="form-control" id="guru">
                        <option value="">Guru</option>
                         <?php 
                       $queryDataGuru = mysqli_query($konek,"SELECT * FROM biodata_guru");
                       
                       while($dataGuru = mysqli_fetch_array($queryDataGuru)){
                        if($dataGuru['status_guru']!= "admin"){

                        ?>
                        <option value="<?php echo $dataGuru['id_guru']; ?>"><?php echo $dataGuru['nama_guru']; ?></option>
                        <?php }} ?>

                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    :
                    <div class="col-sm-8">
                      <select name="mapel" class="form-control" id="pilih_mpl">
                        <option value="">Mata Pelajaran</option>
                        <?php 
                       $queryDataMapel = mysqli_query($konek,"SELECT * FROM mapel");
                       
                       while($dataMapel = mysqli_fetch_array($queryDataMapel)){
                        ?>
                        <option value="<?php echo $dataMapel['id_mapel']; ?>"><?php echo $dataMapel['nama_mapel']; ?></option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hari</label>
                    :
                    <div class="col-sm-8">
                      <select name="hari" class="form-control" id="pilih_kelas">
                        <option value="">Hari</option>
                        <option value="SENIN">Senin</option>
                        <option value="SELASA">Selasa</option>
                        <option value="RABU">Rabu</option>
                        <option value="KAMIS">Kamis</option>
                        <option value="JUMAT">Jumat</option>
                        <option value="SABTU">Sabtu</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jam Mulai  </label>
                    :
                    <div class="col-sm-8">
                      <input type="time" name="jamMulai" class="without_ampm">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jam Berakhir  </label>
                    :
                    <div class="col-sm-8">
                      <input type="time" name="jamBerakhir" class="without_ampm">
                    </div>
                  </div>
                  <div class="row mb-3">

                    <div class="col-sm-10 offset-sm-2">
                      <input type="batal" value="Batal" name="batal" onclick="closeForm('jam_mengajar')" style="width:25%; background: #ff3333;" />
                      <input type="submit" value="Simpan" name="simpan"style="width:25%;" />
                    </div>
                  </div>
                </form>
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

</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
