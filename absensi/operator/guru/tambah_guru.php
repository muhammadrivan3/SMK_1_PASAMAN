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
            <h2 id="xs"><i class="icon-calendar"></i> GURU </h2>
            <hr>
            <div id="myDiv" class="container-fluid">
              <form action="../prosses.php?tipe=guru" method="post" class="form-container" enctype="multipart/form-data" style="margin:10px" autocomplete="false">
                <h1>Tambahkan guru</h1>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Foto</label>
                  :
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nip</label>
                  :
                  <div class="col-sm-8">
                    <input type="number" class="form-control"  placeholder="Nip" name="nip">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Nama" name="nama">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  :
                  <div class="col-sm-8" style="margin-left:30px;">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-check form-check-inline" sty>
                          <input type="radio" class="form-check-input" name="jenis_kelamin" id="radioLaki" value="L" checked>
                          <label class="form-check-label" for="radioMale">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                          <input type="radio" class="form-check-input" value="P" name="jenis_kelamin" id="radioPerempuan">
                          <label class="form-check-label" for="radioFemale">Perempuan</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Tgl Lahir</label>
                  :
                  <div class="col-sm-8">
                    <input type="date" id="birthday" name="tgl_lahir" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Pendidikan</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Pendidikan" name="pendidikan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Status" name="status">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
                  :
                  <div class="col-sm-8">
                    <select name="jabatan" class="form-control" id="jabatan">
                      <option value="">Pilih Jabatan</option>
                      <?php
                      $arrJabatan = array('kepala sekolah'=>'Kepala Sekolah','wakil kepala sekolah'=>'Wakil Kepala Sekolah',
                        'bendahara/kepala yayasan'=>'Bendahara/Kepala Yayasan','kaproka'=>'Kaproka', 'wali kelas'=>'Wali Kelas', 'guru'=>'Guru',);
                      foreach ($arrJabatan as $key => $value) {
                        // code...
                        echo "<option value=".$key.">".$value."</option>";
                      }
                       ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Telepon</label>
                  :
                  <div class="col-sm-8">
                    <input type="number" class="form-control"  placeholder="Telepon" name="telepon">
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                  :
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Username" name="get_username">
                  </div>
                </div> -->
              </div>
              <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                  <input type="batal" value="Kembali" name="batal" onclick="closeForm('daftar_guru')" style="width:25%; background: #ff3333;" />
                  <input type="submit" value="Simpan" name="simpan" style="width:25%;" />
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
<script src="../../assets/js/custom/custom.js"></script>
<script >

</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
