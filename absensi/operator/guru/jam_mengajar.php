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
                  <h2 id="xs" ><i class="icon-calendar"></i> GURU </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tambah_jam_mengajar" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div id="myDiv" class="container-fluid">
                <form action="" method="GET">
                  <div class="container">
                   <div class="row row-cols-auto">
                   </div>
                 </form>
               </div>
               <br>
               <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title">
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;" rowspan="2">NO</th>
                          <th class="text-center" style="background-color: #404040; color:white;" rowspan="2">NAMA/NIP</th>
                          <th class="text-center" style="background-color: #404040; color:white;" rowspan="2">MATA PELAJARAN</th>
                          <th class="text-center" style="width:5%;background-color: #404040; color:white;" rowspan="2">KELAS</th>
                          <!-- <th class="text-center" style="background-color: #404040; color:white;">JURUSAN</th> -->
                          <th class="text-center" style="background-color: #404040; color:white; width: 10%;" colspan="2" rowspan="1">JUMLAH</th>
                          <th class="text-center" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;" colspan="2" rowspan="2">OPTION</th>
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

                        $queryDataGuru = mysqli_query($konek,"SELECT * FROM biodata_guru limit $posisi,$batas");
                        $no=1;
                        while($dataGuru = mysqli_fetch_array($queryDataGuru)){
                          if($dataGuru['jabatan_guru'] != "admin"){
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
                            <tr>
                              <td class="text-center"><?php echo $no; ?></td>
                              <td class="text-center"><?php echo strtoupper($dataGuru['nama_guru']); ?> <br> NIP : <?php echo $dataGuru['nip_guru']; ?> </td>

                              <td class="text-center">
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
                              </td>
                              <td class="text-center"> 
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
                                echo $total;
                              } ?>
                            </td>
                          </tr>

                          <?php
                          $no++;

                        }} ?> 

                      </tbody>
                    </table>
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
                                echo "<li class='page-item'><a class='page-link' href='jam_mengajar.php?halaman=$i'>$i</a></li>";
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
<script src="../../assets/js/custom/custom.js"></script>
<script >

</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
