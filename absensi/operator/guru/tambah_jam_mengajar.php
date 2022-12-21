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
                <form action="../proses.php?kategori=jamMengajar" method="post" class="form-container" style="margin:10px" autocomplete="false">
                  <h1>Tambahkan Jam Mengajar</h1>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    :
                    <div class="col-sm-8">
                      <select name="kelas" class="form-control" id="pilih_kelas">
                        <option value="">Pilih Kelas</option>
                        

                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Lokal</label>
                    :
                    <div class="col-sm-8">
                      <select name="lokal" class="form-control" id="pilih_lokal">
                        <option value="">Pilih Lokal</option>


                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jurusan</label>
                    :
                    <div class="col-sm-8">
                      <select name="jurusan" class="form-control" id="pilih_jurusan">
                        <option value="">Pilih Jurusan</option>


                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    :
                    <div class="col-sm-8">
                      <select name="guru" class="form-control" id="pilih_guru">
                        <option value="">Pilih Guru</option>


                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    :
                    <div class="col-sm-8">
                      <select name="mapel" class="form-control" id="pilih_mpl">
                        <option value="">Pilih Mata Pelajaran</option>


                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Hari</label>
                    :
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="Hari" name="hari">
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
<script >

</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
