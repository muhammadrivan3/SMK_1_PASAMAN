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
                  <h2 id="xs" ><i class="icon-calendar"></i> JURUSAN </h2>
                </div>
                <div class="col-sm" style="text-align: right;margin-right: 5%;">
                  <a class="col-sm" href="http://localhost/SMK_1_PASAMAN/absensi/operator/pelajaran/tambah_jurusan" style=""><h1 id="xs" ><i class="icon-plus-sign" style="color:mediumseagreen;"></i> </h1></a>
                </div>
              </div>
            </div>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row-fluid">
                <div class="span12">
                  <div class="widget-box">
                    <div class="widget-title"> 
                      <!-- <div class="widget-content nopadding"> -->
                       <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center" style="width:5%;background-color: #404040; color:white;border-radius: 10px 0 0 0 ;">NO</th>
                            
                            <th class="text-center" style="background-color: #404040; color:white;" >NAMA JURUSAN</th>
                            <th class="text-center" style="background-color: #404040; color:white;" >KOSENTRASI</th>
                            <th class="text-center" style="background-color: #404040; color:white;" >KAPROKA</th>
                            <th class="text-center" colspan="2" style="width: 10%;background-color: #404040; color:white;border-radius: 0 10px 0 0 ;">OPTION</th>

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
                          $queryDataJurusan = mysqli_query($konek,"SELECT * FROM jurusan JOIN biodata_guru ON jurusan.kaproka_jurusan = biodata_guru.id_guru limit $posisi,$batas");
                          if ($posisi !=0) {
                          // code...

                        $no = $posisi;
                        }else{
                          $no=1;
                        }
                          while($dataJurusan = mysqli_fetch_array($queryDataJurusan)){
                            ?>
                          <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td class="text-center" ><?php echo $dataJurusan['nama_jurusan']; ?></td>
                            <td class="text-center" ><?php echo $dataJurusan['kosentrasi_jurusan']; ?></td>
                            <td class="text-center" ><?php echo strtoupper($dataJurusan['nama_guru']); ?></td>
                            <td class="text-center" style="width:5%;"><form action="" class="form-container" style="margin:10px" autocomplete="false">


                               <a href="editJurusan?id_jurusan=<?PHP echo $dataJurusan['id_jurusan']?>" class="btn" style=" border-color: white;border-radius: 5px; background-color: #999999;"><i class="icon-edit" style="color:white;"></i></a>
                             </form>
                           </td>
                           <td class="text-center" style="width:5%;"><form action="../prosses.php?hapus=jurusan" method="post" class="form-container" style="margin:10px" autocomplete="false">
                            <input type="hidden" name="id_jurusan" value=<?php echo $dataJurusan['id_jurusan']; ?>>
                            <button class="btn" type="submit" style=" border-color: white;border-radius: 5px; background-color: #ff3333;"><i class="icon-trash" style="color:white;"></i> </button>
                          </form></td>  
                          </tr>
                          <?php 
                          $no++;
                          } ?>
                          

                        </tbody>
                      </table>
                      <!-- A button to open the popup form -->
                      
                      <!--awal menentukan banyaknya halaman pagination-->
                        <?php
                        $query2 = mysqli_query($konek, "SELECT * FROM jurusan");
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
                                echo "<li class='page-item'><a class='page-link' href='jurusan.php?halaman=$i'>$i</a></li>";
                              } 
                              else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                              }
                            }
                            ?>
                          </ul>
                        </nav>
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
</div>
<script src="../../assets/js/custom/custom.js"></script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
