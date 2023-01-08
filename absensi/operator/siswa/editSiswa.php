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

            <h2><i class="icon-calendar"></i> SISWA </h2>

            <div id="myDiv" class="container-fluid">
              <hr>
              <?php 
              $queryGetData = mysqli_query($konek,"SELECT * FROM biodata_siswa WHERE id_siswa=".$_GET['id_siswa']);
                while($dataSiswa = mysqli_fetch_array($queryGetData)){ 
                  ?>
              <form action="../prosses.php?edit=siswa" method="post" enctype="multipart/form-data" class="form-container" style="margin:10px" autocomplete="false">
                <h1>Tambahkan Siswa</h1>
                <input  type="hidden" name="id_siswa" value=<?php echo $dataSiswa['id_siswa']; ?> >
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Foto</label>
                  :
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto" value="<?php echo $dataSiswa['foto_siswa']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nis</label>
                  :
                  <div class="col-sm-8">
                    <input type="number" class="form-control"  placeholder="Nis" name="nis" value="<?php echo $dataSiswa['nis_siswa']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nama</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Nama" name="nama" value='<?php echo $dataSiswa['nama_siswa']; ?>'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Tgl Lahir</label>
                  :
                  <div class="col-sm-8">
                    <input type="date" id="birthday" name="tgl_lahir" class="form-control" value="<?php echo $dataSiswa['tgl_lahir_siswa']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  :
                  <div class="col-sm-8" style="margin-left:30px;">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-check form-check-inline" sty>
                          <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" id="radioLaki" <?php if($dataSiswa['jenis_kelamin_siswa']=="L"){
                                echo "checked";
                              } ?> >
                          <label class="form-check-label" for="radioMale">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                          <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" id="radioPerempuan" <?php if($dataSiswa['jenis_kelamin_siswa']=="P"){
                                echo "checked";
                              } ?>>
                          <label class="form-check-label" for="radioFemale">Perempuan</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Alamat" name="alamat" value="<?php echo $dataSiswa['alamat_siswa']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Telepon</label>
                  :
                  <div class="col-sm-8">
                    <input type="number" class="form-control"  placeholder="Telepon" name="telepon" value="<?php echo $dataSiswa['telepon_siswa']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    :
                    <div class="col-sm-8">
                      <select name="kelas" class="form-control" id="kelas">
                        <option value="">Kelas</option>
                        <?php 
                        $arrKelas = array('X'=>'X', 'XI'=>'XI', 'XII'=>'XII');
                        foreach ($arrKelas as $key => $value) {?>
                          <option value="X" <?php if ($key == $dataSiswa['kelas_siswa']) {
                            // code...
                            echo "selected";
                          } ?>>X</option>

                        <?php
                        }?>
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
                        <option value="<?php echo $dataJurusan['id_jurusan']; ?>" <?php if ($dataJurusan['id_jurusan']==$dataSiswa['jurusan_siswa']) {
                          // code...
                          echo "selected";
                        } ?>><?php echo $dataJurusan['nama_jurusan']; ?> - <?php echo $dataJurusan['kosentrasi_jurusan']; ?></option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Ruangan</label>
                      :
                      <div class="col-sm-8">
                        <select name="lokal" class="form-control" id="pilih_lokal">
                          <option value="">Ruangan</option>
                          <?php 
                       $queryDataLokal = mysqli_query($konek,"SELECT * FROM wali_kelas");
                       
                       while($dataLokal = mysqli_fetch_array($queryDataLokal)){
                       

                        ?>
                        <option value="<?php echo $dataLokal['id_wali_kelas']; ?>" <?php if ($dataLokal['id_wali_kelas'] == $dataSiswa['lokal_siswa']) {
                          // code...
                          echo "selected";
                        } ?>><?php echo $dataLokal['kelas']; ?> - <?php echo $dataLokal['nama_lokal']; ?></option>
                        <?php } ?>

                          </select>
                        </div>
                      </div>


                      <div class="row mb-3">

                        <div class="col-sm-10 offset-sm-2">
                          <input type="batal" value="Batal" name="batal" onclick="closeForm('daftar_siswa')" style="width:25%; background: #ff3333;" />
                          <input type="submit" value="Simpan" name="simpan"style="width:25%;" />
                        </div>
                      </div>
                    </form>
                  <?php } ?>
                  </div>
                </div>
              </div>
              <div class="form-popup" id="myForm">
                <div class="m-4">

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
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
