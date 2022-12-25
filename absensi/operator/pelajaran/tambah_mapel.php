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
                <form action="../prosses.php?tipe=mapel" method="post" class="form-container" style="margin:10px" autocomplete="false">
                  <h1>Tambahkan Mata Pelajaran</h1>
                  <!-- <div class="row mb-3">
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
                  </div> -->
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
                          <option value="<?php echo $dataJurusan['id_jurusan']; ?>"><?php echo $dataJurusan["nama_jurusan"]."-".$dataJurusan["kosentrasi_jurusan"]; ?></option>
                        <?php 
                        } ?>

                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                    :
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="Mata Pelajaran" name="mapel">
                    </div>
                  </div>

                  <div class="row mb-3">

                    <div class="col-sm-10 offset-sm-2">
                      <input type="batal" value="Batal" name="batal" onclick="closeForm()" style="width:25%; background: #ff3333;" />
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

<script src="../../js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
