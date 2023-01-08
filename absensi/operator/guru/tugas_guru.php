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
                  <h2 id="xs" ><i class="icon-calendar"></i> FUNGSI & TUGAS GURU </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_tugas_guru" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
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
                          <th rowspan="2" class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                          <th rowspan="2" class="text-center" style="background-color: #404040; color:white;">NAMA/NIP</th>
                          <th rowspan="2" class="text-center" style="background-color: #404040; color:white;">PENDIDIKAN</th>
                          <th rowspan="2"class="text-center" style="background-color: #404040; color:white;">MATA PELAJARAN <br/> TUGAS TAMBAHAN</th>
                          <th rowspan="2" class="text-center" style="width: 5%;background-color: #404040; color:white;">KELAS</th>
                          <th rowspan="1" colspan="2" class="text-center" style="width: 5%;background-color: #404040; color:white;" >JUMLAH</th>
                          <th rowspan="2" class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;"colspan="2">OPTION</th>
                        </tr>
                        <tr>
                          <th>JAM</th>
                          <th>TOTAL</th>
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
                        $queryGetGuru = mysqli_query($konek,"SELECT * FROM biodata_guru limit $posisi,$batas");
                        if ($posisi !=0) {
                          // code...

                        $no = $posisi;
                        }else{
                          $no=1;
                        }
                        while($dataGuru=mysqli_fetch_array($queryGetGuru)){
                          if ($dataGuru['status_guru']!="admin") {
                              // code...
                            ?>
                            <?php
                            $queryDataJamMengajar = mysqli_query($konek,"SELECT * FROM jam_mengajar WHERE id_guru=".$dataGuru['id_guru']);
                            $arrayMapel = array();
                            $arrayjumlahJam = array();
                            $arrayKelas = array();
                            $arrayRuangan = array();
                            while($dataJamMengajar = mysqli_fetch_array($queryDataJamMengajar)){

                              $arrayMapel[$dataJamMengajar['id_mapel']."-".$dataJamMengajar['kelas']]= $dataJamMengajar['id_mapel'];
                              $arrayKelas[$dataJamMengajar['id_mapel']."-".$dataJamMengajar['kelas']]= $dataJamMengajar['kelas'];
                            }
                            ?>
                            <?php
                            $queryTugasTambahan = mysqli_query($konek,"SELECT * FROM tugas_tambahan WHERE id_guru=".$dataGuru['id_guru']);
                            $arrayTugasTambahan = array();
                            $arrayKelasTugasTambahan = array();
                            $arrayJamTugasTambahan = array();
                            while($dataTugasTambahan = mysqli_fetch_array($queryTugasTambahan)){

                              $arrayTugasTambahan[]= $dataTugasTambahan['nama_tugas_tambahan'];
                              $arrayKelasTugasTambahan[]= $dataTugasTambahan['kelas_tugas_tambahan'];
                              $arrayJamTugasTambahan[]= $dataTugasTambahan['jam_tugas_tambahan'];
                            }
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $no;?></td>
                              <td class="text-center"><?php echo strtoupper($dataGuru['nama_guru']);?> <br> NIP : <?php echo $dataGuru['nip_guru'];?> </td>
                              <td class="text-center"><?php echo $dataGuru['pendidikan_guru'];?></td>
                              <td class="text-center">
                                <?php

                                foreach($arrayTugasTambahan as $key=>$value)
                                {
                                  echo $value."<br>";
                                }
                                ?>
                                <?php
                                $arrm = array();
                                foreach($arrayMapel as $key=>$value)
                                {
                                  $queryDataMapel = mysqli_query($konek,"SELECT * FROM mapel WHERE id_mapel=".$value);
                                  while ($dataMapel = mysqli_fetch_array($queryDataMapel)) {
                                  // code...
                                    echo $dataMapel['nama_mapel']."<br>";
                                  }
                                  $arrm[] = $value;
                                }
                                ?>
                                <td class="text-center"> 
                                  <?php

                                foreach($arrayKelasTugasTambahan as $key=>$value)
                                {
                                  echo $value."<br>";
                                }
                                ?>
                                  <?php

                                  $arrk = array(); 
                                  foreach($arrayKelas as $key=>$value)
                                  {
                                    echo $value."<br>";
                                    $arrk[] = $value;
                                  }
                                ?></td>
                                <td class="text-center">
                                  <?php 
                                  $total = 0;
                                  foreach($arrayJamTugasTambahan as $key=>$value)
                                {
                                  echo $value."<br>";
                                  $total +=$value;
                                }
                                  for ($i=0; $i < sizeof($arrm); $i++) {
                                    $queryJumlahJamMengajar = mysqli_query($konek,"SELECT COUNT(*) AS JumlahJam FROM jam_mengajar WHERE id_guru=".$dataGuru['id_guru']." AND kelas='".$arrk[$i]."'"." AND id_mapel=".$arrm[$i]);
                                    if($queryJumlahJamMengajar != null){
                                      while($dataJumlahJam = mysqli_fetch_array($queryJumlahJamMengajar)){
                                        echo $dataJumlahJam['JumlahJam']."<br>";
                                        $total+=$dataJumlahJam['JumlahJam'];
                                      }
                                    }
                                  }
                                  ?>
                                </td>

                                <td  style="text-align: center;
                                vertical-align: middle;;">
                                <?php if ($total != 0) {
                                // code...
                                  echo $total;
                                } ?>
                              </td>
                              <!-- <td class="text-center" style="width:5%;"><form action="" class="form-container" style="margin:10px" autocomplete="false">


                               <a href="editJamMengajar?jam_mengajar=<?PHP echo $dataJamMengajar['id_jam_mengajar']?>" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="icon-edit" style="color:white;"></i></a>
                             </form>
                           </td> -->
                           <td class="text-center" style="width:5%;"><form action="../proses.php?hapus=guru" method="post" class="form-container" style="margin:10px" autocomplete="false">


                            <input type="hidden" name="id_guru" value=<?php echo $dataGuru['id_guru']; ?>>
                            <button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #ff3333;"><i class="icon-trash" style="color:white;"></i> </button>
                          </form></td>
                            </tr>
                            <?php
                            $no++;}}
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
                                echo "<li class='page-item'><a class='page-link' href='tugas_guru.php?halaman=$i'>$i</a></li>";
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
<script src="../../assets/js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
