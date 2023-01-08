<?php 
	
	include "../db/koneksi.php";
  include "akses.php";
  include '../layout/header.php';

 ?>
<!--main-container-part-->
<div id="content" >
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
      <div class="content text-center">
        <h1 class="text-white">SELAMAT DATANG DI</h1>
        <h1 class="text-white">SMK N 1 PASAMAN BARAT</h1>
      </div>
  </div>
    <br>
    <section id="services">
              <div class="container">
                  <h1 class="text-center"></h1>
                  <div class="row justify-content-center" style="align-content: center;">
                      <div class="col-lg-3 " style="width:50%;">
                        <div class="container-card-info">
                          <div class="box-card-info">
                          <span></span>
                          <div class="content-card-info">
                            <h2>Kelas</h2>
                            <h4 class="num" data-val="340">3000</h4>
                          </div>
                        </div>
                      </div>
                      </div>
                      
                    <div class="col-lg-3 " style="width:50%;">
                        <div class="container-card-info">
                          <div class="box-card-info">
                          <span></span>
                          <div class="content-card-info">
                            <h2>Siswa</h2>
                            <h4 class="num" data-val="100">3000</h4>
                          </div>
                        </div>
                      </div>
                      </div>
                    <div class="col-lg-3" style="width:50%;">
                      <div class="container-card-info">
                          <div class="box-card-info">
                          <span></span>
                          <div class="content-card-info">
                            <h2>Jurusan</h2>
                            <h5>* MANAJEMENT PERKANTORAN DAN LAYANAN BISNIS</h5>
                            <h5>* AKUNTANSI DAN KEUANGAN LEMBAGA</h5>
                            <h5>* PERHOTELAN </h5>
                            <h5>* KULINER</h5>
                            <h5>* DESIGN KOMUNIKASI VISUAL</h5>
                            <h5>* BUSANA</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                      
                  </div>
              </div>
      </section>
      <br>
      
</div>
<script type="text/javascript">
	var nav = document.querySelector('nav');

	window.addEventListener('scroll', function () {
		if (window.pageYOffset > 50) {
			nav.classList.add('bg-dark', 'shadow');
		} else {
			nav.classList.remove('bg-dark', 'shadow');
		}
	});
</script>
<!-- <script src="http://localhost/SMK_1_PASAMAN/absensi/assets/js/custom/custom.js"></script>  -->
<!--end-main-container-part-->
<?php include '../layout/footer.php'; ?>