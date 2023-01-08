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

            <h2><i class="icon-calendar"></i> RUANGAN </h2>
            <hr>
            <div>
              <div id="myDiv" class="container-fluid">
                <?php 
              $queryGetData = mysqli_query($konek,"SELECT * FROM wali_kelas WHERE id_wali_kelas=".$_GET['id_ruangan']);
                while($dataRuangan = mysqli_fetch_array($queryGetData)){ 
                  ?>
                <form action="../prosses.php?tipe=lokal" method="post" class="form-container" style="margin:10px" autocomplete="false">
                  <h1>Tambahkan RUANGAN</h1>
                  <input  type="hidden" name="id_ruangan" value=<?php echo $dataRuangan['id_wali_kelas']; ?> >
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    :
                    <div class="col-sm-8">
                      <select name="kelas" class="form-control" id="kelas">
                        <option value="">Kelas</option>
                        <?php 
                        $arrKelas = array('X'=>'X', 'XI'=>'XI', 'XII'=>'XII');
                        foreach ($arrKelas as $key => $value) {?>
                          <option value="X" <?php if ($key == $dataRuangan['kelas']) {
                            // code...
                            echo "selected";
                          } ?>>X</option>

                        <?php
                        }?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Wali Kelas</label>
                    :
                    <div class="col-sm-8">
                      <select name="guru" class="form-control" id="select_box">
                        <option value="">Pilih Wali Kelas</option>
                        <?php 
                        $queryDataGuru = mysqli_query($konek,"SELECT * from biodata_guru WHERE jabatan_guru='wali kelas'");
                        while($dataGuru = mysqli_fetch_array($queryDataGuru)){?>
                          <option value="<?php echo $dataGuru['id_guru']; ?>" <?php if($dataGuru['id_guru']== $dataRuangan['guru']){
                            echo "selected";
                          } ?>> <?php echo $dataGuru['nama_guru']; ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Lokal</label>
                    :
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="Nama Lokal" name="lokal" value="<?php echo $dataRuangan['nama_lokal']; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                      <input type="batal" value="Batal" name="batal" onclick="closeForm('lokal')" style="width:25%; background: #ff3333;" />
                      <input type="submit" value="Simpan" name="simpan"style="width:25%;" />
                    </div>
                  </div>
                </form>
              <?php } ?>
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
