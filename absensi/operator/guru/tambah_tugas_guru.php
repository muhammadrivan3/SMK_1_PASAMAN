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
            <h2 id="xs"><i class="icon-calendar"></i>Fungsi GURU </h2>
            <hr>
            <div id="myDiv" class="container-fluid">
              <form action="../proses.php?kategori=fungsiGuru" method="post" class="form-container" style="margin:10px" autocomplete="false">
                <h1>Tambahkan Fungsi Guru</h1>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                  :
                  <div class="col-sm-8">
                    <select name="guru" class="form-control">
                      <option>Pilih Guru</option>
                      <?php 
                      $query_dataGuru = mysqli_query($konek,"SELECT * FROM biodata_guru");
                      while($dataGuru = mysqli_fetch_array($query_dataGuru)){?>
                        <option value="<?php echo $dataGuru['id_guru']; ?>"> <?php echo $dataGuru['nama']; ?></option>

                      <?php }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Tugas Tambahan</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Tugas Tambahan" name="tugasTambahan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Jam Tugas Tambahan</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Jam Tugas Tambahan" name="jamtugasTambahan">
                  </div>
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
    <!-- form for add -->
    <div class="form-popup" id="myForm">
      <div class="m-4">

      </div>

    </div>
  </div>
</div>

<script src="../../js/custom/custom.js"></script>
<script >

</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
