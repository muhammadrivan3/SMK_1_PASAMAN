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
            <h2 id="xs"><i class="icon-calendar"></i> KELAS ONLINE </h2>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="row">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms" style="visibility: visible; animation-delay: 250ms; animation-name: fadeInUp;">
                  <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/p6.jpg" alt="">
                  <!-- Kuliah Content -->
                  <div class="course-content">
                    <h4>Supply Chain Management</h4>
                    <div class="meta  align-items-center">
                      <h6>Mutiana Pratiwi,S.Kom, M.Kom</h6>
                    </div>           
                    <table border="0" width="100%">
                     <tbody><tr><td width="120"><i class="fa fa-calendar"></i> Kuliah Online </td><td>: Rabu / 04-01-2023</td></tr><tr>
                     </tr><tr><td><i class="fa fa-clock-o"></i> Waktu </td><td>: 09:20 - 10:55 Wib</td></tr><tr>
                     </tr><tr><td><i class="fa fa-building-o"></i> Ruang </td><td>: E-Learning</td></tr><tr>
                     </tr><tr><td><i class="fa fa-gift"></i> Kelas </td><td>: SI-4</td></tr><tr>
                     </tr><tr><td><i class="fa fa-calendar-check-o"></i> Pertemuan Ke </td><td>: 15</td></tr><tr>
                     </tr></tbody></table>
                    <div class="img-pengampu">
                      <img class="foto-profil-card" src="https://estudy-filkom.upiyptk.ac.id//upistudy/imagesdsn/770">
                    </div>
                  </div>
                  <!-- Seat Rating Fee -->
                  <div class="seat-rating-fee d-flex justify-content-between">
                    <div class="seat-rating h-100 d-flex ">
                      <div class="seat">
                        <i class="fa fa-user" aria-hidden="true"></i> 10
                      </div>
                      <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i> 4.5
                      </div>
                    </div>
                    <div class="course-fee h-100">
                      <a href="#" class="kuliah blink">MASUK</a>                            
                    </div>
                  </div>
                </div>
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms" style="visibility: visible; animation-delay: 250ms; animation-name: fadeInUp;">
                  <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/p6.jpg" alt="">
                  <!-- Kuliah Content -->
                  <div class="course-content">
                    <h4>Supply Chain Management</h4>
                    <div class="meta  align-items-center">
                      <h6>Mutiana Pratiwi,S.Kom, M.Kom</h6>
                    </div>           
                    <table border="0" width="100%">
                     <tbody><tr><td width="120"><i class="fa fa-calendar"></i> Kuliah Online </td><td>: Rabu / 04-01-2023</td></tr><tr>
                     </tr><tr><td><i class="fa fa-clock-o"></i> Waktu </td><td>: 09:20 - 10:55 Wib</td></tr><tr>
                     </tr><tr><td><i class="fa fa-building-o"></i> Ruang </td><td>: E-Learning</td></tr><tr>
                     </tr><tr><td><i class="fa fa-gift"></i> Kelas </td><td>: SI-4</td></tr><tr>
                     </tr><tr><td><i class="fa fa-calendar-check-o"></i> Pertemuan Ke </td><td>: 15</td></tr><tr>
                     </tr></tbody></table>
                    <div class="img-pengampu">
                      <img class="foto-profil-card" src="https://estudy-filkom.upiyptk.ac.id//upistudy/imagesdsn/770">
                    </div>
                  </div>
                  <!-- Seat Rating Fee -->
                  <div class="seat-rating-fee d-flex justify-content-between">
                    <div class="seat-rating h-100 d-flex ">
                      <div class="seat">
                        <i class="fa fa-user" aria-hidden="true"></i> 10
                      </div>
                      <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i> 4.5
                      </div>
                    </div>
                    <div class="course-fee h-100">
                      <a href="#" class="kuliah blink">MASUK</a>                            
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
<script src="../../js/custom/custom.js"></script>
<script >
  $('.pane-hScroll').scroll(function() {
    $('.pane-vScroll').width($('.pane-hScroll').width() + $('.pane-hScroll').scrollLeft());
  });
</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
