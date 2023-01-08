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
                  <h2 id="xs" ><i class="icon-calendar"></i> SISWA </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/siswa/tambah_siswa" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
              <div id="myDiv" class="container-fluid">
                <hr>
                <div class="row-fluid">
                  <div class="span12">
                    <div class="widget-box">
                      <div class="widget-title">
                       <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center " style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                            <th class="text-center" style="background-color: #404040; color:white;">NAMA/NIS</th>
                            <th class="text-center" style="width:5%;background-color: #404040; color:white;" >L/P</th>
                            <th class="text-center" style="background-color: #404040; color:white;">TGL LAHIR</th>

                            <th class="text-center" style="background-color: #404040; color:white;">ALAMAT</th>

                            <th class="text-center" style="width:5%;background-color: #404040; color:white;">KELAS/ROMBEL</th>
                            <th class="text-center" style="background-color: #404040; color:white;">JURUSAN</th>
                            <th class="text-center" style="background-color: #404040; color:white;">TELEPON</th>
                            <!-- <th>Wali Kelas</th> -->
                            <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">OPTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $batas = 10;
                        $halaman = @$_GET['halaman'];
                        if(empty($halaman)){
                          $posisi     = 0;
                          $halaman    = 1;
                        }
                        else{
                          $posisi = ($halaman-1) * $batas;
                        }
                          $queryDataSiswa = mysqli_query($konek, "SELECT * FROM biodata_siswa JOIN wali_kelas ON biodata_siswa.lokal_siswa = wali_kelas.id_wali_kelas JOIN jurusan ON biodata_siswa.jurusan_siswa = jurusan.id_jurusan limit $posisi,$batas");
                          $no=1;
                          while ($dataSiswa = mysqli_fetch_array($queryDataSiswa)) {
                           ?>
                           <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td class="text-center"><?php echo strtoupper($dataSiswa['nama_siswa']); ?> <br> NIS : <?php echo $dataSiswa['nis_siswa']; ?> </td>
                            <td class="text-center" style="widtd:5%;"><?php echo $dataSiswa['jenis_kelamin_siswa']; ?></td>
                            <td class="text-center"><?php echo $dataSiswa['tgl_lahir_siswa']; ?></td>
                            <td class="text-center"><?php echo $dataSiswa['alamat_siswa']; ?></td>
                            <td class="text-center"><?php echo $dataSiswa['kelas_siswa']; ?> - <?php echo $dataSiswa['nama_lokal']; ?></td>
                            <td class="text-center"><?php echo $dataSiswa['nama_jurusan']; ?>-<?php echo $dataSiswa['kosentrasi_jurusan']; ?></td>
                            <td class="text-center"><?php echo $dataSiswa['telepon_siswa']; ?></td>
                            <td class="text-center" style="width:5%;"><form action="" class="form-container" style="margin:10px" autocomplete="false">


                               <a href="editSiswa?id_siswa=<?PHP echo $dataSiswa['id_siswa']?>" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="icon-edit" style="color:white;"></i></a>
                             </form>
                           </td>
                           <td class="text-center" style="width:5%;"><form action="../prosses.php?hapus=siswa" method="post" class="form-container" style="margin:10px" autocomplete="false">


                            <input type="hidden" name="id_siswa" value=<?php echo $dataSiswa['id_siswa']; ?>>
                            <button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #ff3333;"><i class="icon-trash" style="color:white;"></i> </button>
                          </form></td>
                          </tr>
                          <?php
                        $no++;} ?>
                      </tbody>
                    </table>
                    <!--awal menentukan banyaknya halaman pagination-->
                        <?php
                        $query2 = mysqli_query($konek, "SELECT * FROM biodata_siswa");
                        $jumlahdata = mysqli_num_rows($query2);
                        $jumlahhalaman = ceil($jumlahdata/$batas);
                        ?>
                        <!--akhir menentukan banyaknya halaman pagination-->

                        <!--awal navigasi pagination-->
                        <nav>
                          <ul class="pagination justify-content-center">
                            <?php
                            for($i=1;$i<=$jumlahhalaman;$i++) {
                              if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' href='daftar_siswa.php?halaman=$i'>$i</a></li>";
                              } 
                              else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                              }
                            }
                            ?>
                          </ul>
                        </nav>
                        <!--akhir navigasi pagination-->
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
</div>
<script src="../../assets/js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
