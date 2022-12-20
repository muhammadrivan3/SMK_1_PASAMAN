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
					<a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">Contact</a>
				</li>
				<a class="btn btn-outline-info" style="margin: 5px; color:white; border-color: #0099cc;" href="http://localhost/absensi_siswa/login.php" role="button">MASUK</a>
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