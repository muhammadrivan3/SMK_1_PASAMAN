<?php
include "../../db/koneksi.php";
include "../akses.php";
include "../../layout/header.php"
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
                  <h2 id="xs" ><i class="icon-calendar"></i> GURU </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_guru" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                     <table class="table table-bordered" >
                      <thead>
                        <tr>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                          <th class="text-center" style="background-color: #404040; color:white;">NAMA/NIP</th>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;">L/P</th>
                          <th class="text-center" style="background-color: #404040; color:white;">TGL LAHIR</th>
                          <th class="text-center"style="background-color: #404040; color:white;">ALAMAT</th>
                          <th class="text-center"style="background-color: #404040; color:white;">STATUS</th>
                          <th class="text-center"style="background-color: #404040; color:white;">JABATAN</th>
                          <th class="text-center"style="background-color: #404040; color:white;">TELEPON</th>
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2">OPTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        //menentukan banyak nya data yang akan ditampilkan dalam 1 halaman
                        $batas = 10;
                        $halaman = @$_GET['halaman'];
                        if(empty($halaman)){
                          $posisi     = 0;
                          $halaman    = 1;
                        }
                        else{
                          $posisi = ($halaman-1) * $batas;
                        }
                        // $no = $posisi+1;
                        $queryDataGuru = mysqli_query($konek,"SELECT * FROM biodata_guru limit $posisi,$batas");
                        $no = 1;
                        while($dataGuru = mysqli_fetch_array($queryDataGuru)){
                          if($dataGuru['status_guru']!= "admin"){


                            ?>

                            <tr>
                              <td class="text-center"><?php echo $no; ?></td>
                              <td class="text-center"><?php echo strtoupper($dataGuru['nama_guru']); ?><br> NIP : <?php echo $dataGuru['nip_guru']; ?> </td>
                              <td class="text-center" style="widtd:5%;"><?php echo $dataGuru['jenis_kelamin_guru']; ?></td>
                              <td class="text-center"><?php echo $dataGuru['tgl_lahir_guru']; ?></td>
                              <td class="text-center"><?php echo $dataGuru['alamat_guru']; ?></td>
                              <td class="text-center"><?php echo $dataGuru['status_guru']; ?></td>
                              <td class="text-center"><?php echo $dataGuru['jabatan_guru']; ?></td>
                              <td class="text-center"><?php echo $dataGuru['telepon_guru']; ?></td>
                              <td class="text-center" style="width:5%;"><form action="" class="form-container" style="margin:10px" autocomplete="false">


                               <a href="editGuru?id_guru=<?PHP echo $dataGuru['id_guru']?>" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="icon-edit" style="color:white;"></i></a>
                             </form>
                           </td>
                           <td class="text-center" style="width:5%;"><form action="../prosses.php?hapus=guru" method="post" class="form-container" style="margin:10px" autocomplete="false">


                            <input type="hidden" name="id_guru" value=<?php echo $dataGuru['id_guru']; ?>>
                            <button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #ff3333;"><i class="icon-trash" style="color:white;"></i> </button>
                          </form></td>
                        </tr>
                        <?php $no++;}} 
                        ?>
                      </tbody>
                    </table>
                    <!--awal menentukan banyaknya halaman pagination-->
                    <?php
                    $query2 = mysqli_query($konek, "SELECT * FROM biodata_guru");
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
                            echo "<li class='page-item'><a class='page-link' href='daftar_guru.php?halaman=$i'>$i</a></li>";
                          } 
                          else {
                            echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                          }
                        }
                        ?>
                      </ul>
                    </nav>
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
</div>
<script src="../../assets/js/custom/custom.js"></script>
      <!-- <script src="../../assets/tables/js/jquery-3.6.3.js"></script>
      <script src="../../assets/tables/js/dataTables.bootstrap.js"></script>
      <script src="../../assets/tables/js/dataTables.bootstrap5.js"></script>
      <script src="../../assets/tables/js/jquery.dataTables.js"></script> -->
<!-- <script type="text/javascript">
  var nav = document.querySelector('nav');

  window.addEventListener('scroll', function () {
    if (window.pageYOffset > 50) {
      nav.classList.add('bg-dark', 'shadow');
    } else {
      nav.classList.remove('bg-dark', 'shadow');
    }
  });
</script>
-->
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>