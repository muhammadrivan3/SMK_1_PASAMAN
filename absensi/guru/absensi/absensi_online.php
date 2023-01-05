
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
            <h2 id="xs"><i class="icon-calendar"></i> Absensi Siswa</h2>

            <div id="myDiv" class="container-fluid">
              <hr>
              <form action="" method="GET">
                <div class="container">
                 <div class="row row-cols-auto">
                    <div class="col-1">Kelas</div>
                    <div class="col">:</div>
                    <div class="col">
                      <select name="kelas" class="form-control" id="kelas" style="width:200px;">
                        <option value="">Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                    </div>

                    <div class="col-1">Lokal</div>
                    <div class="col">:</div>
                    <div class="col-2">
                      <select name="lokal" class="form-control" id="lokal" style="width:200px;">
                        <option value="">Lokal</option>
                        <?php 
                        $queryDataRuangan = mysqli_query($konek, "SELECT * FROM wali_kelas ");
                        while($dataRuangan = mysqli_fetch_array($queryDataRuangan)){
                          echo "<option value=".$dataRuangan['id_wali_kelas'].">".$dataRuangan['nama_lokal']."</option>";
                          ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row row-cols-auto">
                    <div class="col-1">Jurusan</div>
                    <div class="col">:</div>
                    <div class="col">
                      <select name="jurusan" class="form-control" id="jurusan" style="width:200px; margin: ;">
                        <option value="">Jurusan</option>
                        <?php 
                        $queryDataJurusan = mysqli_query($konek, "SELECT * FROM jurusan;");
                       
                        while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){
                          if ($dataJurusan['kosentrasi_jurusan'] != null) {
                            // code...
                            echo "<option value=".$dataJurusan['id_jurusan'].">".$dataJurusan['nama_jurusan']."-".$dataJurusan['kosentrasi_jurusan']."</option>";
                          }else{
                            echo "<option value=".$dataJurusan['id_jurusan'].">".$dataJurusan['nama_jurusan']."</option>";
                          }
                          
                          ?>
                         

                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-1">Tanggal</div>
                    <div class="col">:</div>
                    <div class="col"><input type="date" name="tgl_absen" class="form-control" style="width:200px;"></div>
                  </div>

                  <br>
                  <div class="row row-cols-auto">
                    <div class="col-1">Jam Ke- :</div>
                    <div class="col">:</div>
                    <div class="col">
                      <select name="jam" class="form-control" id="jam" style="width:200px;">
                        <option value="">Jam</option>
                        <?php 
                        $jam=1;
                        for($jam=1; $jam<=10;$jam++){
                          echo "<option value=".$jam.">".$jam."</option>";
                          ?>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col">
                        <button style="padding-top: calc(0.375rem + 1px);
                        padding-bottom: calc(0.375rem + 1px);
                        margin-bottom: 0; width:20%; border-color:white; width:100px;" type="submit"><i class="icon-search"></i>Cari</button>
                      </div>
                  </div>
                  
                </div>
              </form>
              <br>
              <form action="../prosses.php?tipe=absensiSiswa" method="post" class="form-container" style="margin:10px" autocomplete="false">
                <div class="row-fluid">
                  <div class="span12">
                    <div class="widget-box">
                      <div class="widget-title"> 
                        <!-- <div class="widget-content nopadding"> -->
                         <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width:5%;">No</th>
                              <th>Nama</th>
                              <th>Absensi</th>
                              <th>Keterangan</th>
                              <th>Option</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            if(isset($_GET['kelas']) && isset($_GET['lokal']) && isset($_GET['jurusan']) ){
                              $get_kelas = $_GET['kelas'];
                              $get_lokal = $_GET['lokal'];
                              $get_jurusan = $_GET['jurusan'];
                              $get_tgl = $_GET['tgl_absen'];
                              $get_jam = $_GET['jam'];
                              $no = 1;
                              $query = "SELECT * FROM biodata_siswa WHERE kelas_siswa = '$get_kelas' AND lokal_siswa = '$get_lokal' AND jurusan_siswa = '$get_jurusan';";
                              $query_tampilSiswa = mysqli_query($konek, $query);
                              if(mysqli_num_rows($query_tampilSiswa) > 0){
                                foreach($query_tampilSiswa as $items){
                                  ?>
                                  <tr>
                                    <input type="hidden" name="id_siswa[]" <?php  echo "value=".$items['id_siswa']; ?>/>
                                    <input type="hidden" name="kelas" value="<?PHP echo $get_kelas; ?>"/>
                                    <input type="hidden" name="lokal" value="<?PHP echo $get_lokal; ?>"/>
                                    <input type="hidden" name="id_jurusan" value="<?PHP echo $get_jurusan ?>"/>
                                    <input type="hidden" name="tgl" value="<?PHP echo $get_tgl ?>"/>
                                    <input type="hidden" name="jam" value="<?PHP echo $get_jam ?>"/>

                                    <td><?php echo "".$no++; ?> </td>
                                    <td><?php echo strtoupper($items['nama_siswa']);?></td>
                                    <td>
                                      <select name="absensi[]" class="form-control" id="absensi">
                                        <option value=" ">PILIH ABSEN</option>
                                        <?php 
                                        $idSiswa = $items['id_siswa'];
                                        $kodeAbsen = array("H", "A", "S","C");
                                        $queryAbsensi = "SELECT * FROM absensi_siswa WHERE id_siswa = '$idSiswa' AND tgl_absensi = '$get_tgl' AND id_guru = '".$_SESSION['id_user']."' AND id_wali_kelas='".$get_lokal."';";

                                        $showAbsensi =mysqli_query($konek,$queryAbsensi);

                                        if (mysqli_num_rows($showAbsensi)>0) { ?>

                                          <?php 
                                          while ($data=mysqli_fetch_array($showAbsensi)) {

                                            ?>

                                            <?php 
                                            foreach($kodeAbsen as $k_a){?>
                                              <option <?php echo "value=".$k_a; ?>
                                              <?php if ($data["absensi"] == $k_a) {
                                                echo "selected";
                                              }; ?>><?php echo $k_a; ?></option>';
                                            <?php }
                                          } ?>

                                        <?php }else{?>
                                          <option value="H">H</option>
                                          <option value="A">A</option>
                                          <option value="S">S</option>
                                          <option value="C">C</option>
                                        <?php }  ?>
                                      </select>
                                    </td>
                                    <td><textarea name="keterangan[]" style="width:100%;"> </textarea></td>
                                  </tr>
                                  <?php 
                                }
                              }}
                              ?>
                            </tbody>
                          </table>
                          <!-- A button to open the popup form -->

                          <!-- <button class="open-button" onclick="openForm()">Tambah Guru</button> -->
                          <!-- </div> -->


                        </div>
                        <div class="widget-content">
                          <div id="placeholder"></div>
                          <p id="choices"></p>
                        </div>
                      </div>
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
