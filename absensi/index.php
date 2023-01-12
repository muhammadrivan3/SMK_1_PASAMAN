<?php 
include "db/koneksi.php";
$query=mysqli_query($konek,"SELECT * FROM biodata_sekolah");
$data=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo strtoupper($data['nama_sekolah']); ?></title><meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/custom/style.css">


	<link rel="stylesheet" href="assets/css/bootstrap.min.css" /> 
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="shortcut icon" href="assets/image/<?PHP echo $data['photo_sekolah']; ?>" />
</head>
<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-2"  id="nav">
		<div class="container-fluid" >
			<a class="navbar-brand" href="#"><img src="assets/image/<?PHP echo $data['photo_sekolah'] ?>" alt="" width="30" height="30" class="d-inline-block align-text-top"> SMK N 1 PASAMAN BARAT</a>
			<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNav"
			aria-controls="navbarNav"
			aria-expanded="false"
			aria-label="Toggle navigation"
			>
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNav">
			<div class="mx-auto"></div>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="http://localhost/SMK_1_PASAMAN/absensi/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="https://online.fliphtml5.com/rwfvd/jxvh/" target="_blank">About</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">Contact</a>
				</li> -->
				<a class="btn btn-outline-info" style="margin: 5px; color:white; border-color: #0099cc;" href="http://localhost/SMK_1_PASAMAN/absensi/login" role="button">MASUK</a>
			</ul>
		</div>
	</div>
</nav>
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
	<div class="content text-center">
		<h1 class="text-white">SELAMAT DATANG DI</h1>
		<h1 class="text-white">SMK N 1 PASAMAN BARAT</h1>
		<a class="btn btn-outline-info active" style="margin: 5px; color:white; border-color: #0099cc; background: #0099cc: ;" href="http://localhost/SMK_1_PASAMAN/absensi/login" role="button">MASUK</a>
	</div>
</div>
<br>
<section id="services">
	<div class="container">
	</div>
</section>
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
<section id="contact" class="contact">
      <div class="container">

      <div class="section-title">
          <h2>Contact</h2>
        </div>
        <div class="card shadow">
                  </div>
      </div>

      

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Jalan Pertanian KM 2 Kecamatan Pasaman Kabupaten.Pasaman Barat Provinsi Sumatera Barat</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>pasamansmknegeri@yahoo.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+62 823-8458-7101</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" class="form-control" id="comment_author" name="comment_author" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" fdprocessedid="i9s55n">
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" id="comment_email" name="comment_email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" fdprocessedid="k7xo4r">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="comment_url" name="comment_url" placeholder="Url" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" fdprocessedid="v9v2itk">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" id="comment_content" name="comment_content" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
                            <div class="text-center"><button type="submit" onclick="send_message(); return false;" fdprocessedid="fw2obj">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
<!-- FOOTER -->
<footer class="bg-dark text-center text-white">
	<!-- Grid container -->

	<!-- Copyright -->
	<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		© 2022 Copyright:
		<a class="text-white" href="#">SMK N 1 PASAMAN BARAT</a>
	</div>
</footer>
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
<script src="http://localhost/SMK_1_PASAMAN/absensi/assets/js/custom/custom.js"></script> 
</body>
</html>