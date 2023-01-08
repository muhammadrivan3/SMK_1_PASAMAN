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

            <h2><i class="icon-calendar"></i> JURUSAN </h2>
            <hr>
            <div>
              <div id="myDiv" class="container-fluid">
                <form action="../prosses.php?tipe=jurusan" method="post" class="form-container" style="margin:10px" autocomplete="false">
                  <h1>Tambahkan Jurusan</h1>
                  
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Kaproka</label>
                    :
                    <div class="col-sm-8">
                      <select name="guru" class="form-control" id="select_box">
                        <option value="">Pilih Guru</option>
                        <?php 
                        $queryDataGuru = mysqli_query($konek,"SELECT * from biodata_guru WHERE jabatan_guru='kaproka'");
                        while($dataGuru = mysqli_fetch_array($queryDataGuru)){?>
                          <option value="<?php echo $dataGuru['id_guru']; ?>"> <?php echo $dataGuru['nama_guru']; ?></option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Jurusan</label>
                    :
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="Nama Jurusan" name="jurusan">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Kosentrasi</label>
                    :
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="Kosentrasi" name="kosentrasi" 
                      >
                    </div>
                  </div>
                  <div class="row mb-3">

                    <div class="col-sm-10 offset-sm-2">
                      <input type="batal" value="Kembali" name="batal" onclick="closeForm('jurusan')" style="width:25%; background: #ff3333;" />
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
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
