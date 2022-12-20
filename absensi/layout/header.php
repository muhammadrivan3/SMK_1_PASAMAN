<?php 

$query=mysqli_query($konek,"SELECT * FROM biodata_sekolah");
$data=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo strtoupper($data['nama_sekolah']); ?></title><meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Custom CSS -->
  


  <link rel="stylesheet" href="http://localhost/SMK_1_PASAMAN/absensi/assets/css/bootstrap.min.css" /> 
  <link rel="stylesheet" href="http://localhost/SMK_1_PASAMAN/absensi/assets/css/bootstrap-responsive.min.css" /> 
  <link href="http://localhost/SMK_1_PASAMAN/absensi/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="shortcut icon" href="http://localhost/SMK_1_PASAMAN/absensi/assets/image/<?PHP echo $data['photo_sekolah']; ?>" />
  <link rel="stylesheet" href="http://localhost/SMK_1_PASAMAN/absensi/assets/css/custom/style.css">

</head>
<body>
  <nav id="nav" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/<?PHP echo $data['photo_sekolah'] ?>" alt="" width="30" height="30" class="d-inline-block align-text-top"> SMK N 1 PASAMAN BARAT</a>
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
          <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="/SMK_1_PASAMAN/absensi/operator/">Home</a>
        </li>
        <!-- operator -->
        <?php if($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'operator') {?>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"style="color: white; font-weight: 600; font-size: 1.2em;"><span class="text">Guru</span></a>
            <div class="dropdown-menu">
              <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/daftar_guru" class="dropdown-item">Identitas Guru</a>
              <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/tugas_guru" class="dropdown-item">Fungsi & tugas Guru</a>
              <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/guru/jam_mengajar" class="dropdown-item">Jam Mengajar Guru</a>
                  <!-- <a href="http://localhost/SMK_1_PASAMAN/absensi/guru/tambahGuru.php" class="dropdown-item">Tambah Guru</a>
                  <a href="http://localhost/absensi_siswa/admin/guru/fungsiGuru.php" class="dropdown-item">Tambah Fungsi & Tugas Guru</a>
                  <a href="http://localhost/absensi_siswa/admin/pelajaran/tambah_jamMengajar.php" class="dropdown-item">Tambah Jam Mengajar</a> -->
                </div>
              </li>
              <li class="nav-item dropdown" >
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"style="color: white; font-weight: 600; font-size: 1.2em;"><span class="text">Siswa</span></a>
                <div class="dropdown-menu">
                  <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/siswa/daftar_siswa" class="dropdown-item">Identitas Siswa</a>
                  <!-- <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/siswa/tambahSiswa.php" class="dropdown-item">Tambah Siswa</a> -->
                </div>  

              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"style="color: white; font-weight: 600; font-size: 1.2em;"><span class="text">Pelajaran</span></a>
                <div class="dropdown-menu">
                  <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/pelajaran/mapel" class="dropdown-item">Mapel</a>
                  <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/pelajaran/jurusan" class="dropdown-item">Jurusan</a>
                  <a href="http://localhost/SMK_1_PASAMAN/absensi/operator/pelajaran/lokal" class="dropdown-item">Lokal</a>
                </div>  

              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: white; font-weight: 600; font-size: 1.2em;"><span class="text">Laporan</span></a>
                <ul class="dropdown-menu multi-level" style="margin-left: 10;">
                  <li class="nav-item dropdown-submenu" style="width: 80%;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #212529; font-weight: 400; font-size: 1em; margin: 10px; text-decoration: none">Absensi</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="http://localhost/SMK_1_PASAMAN/absensi/operator/laporan/absensi_harian">Harian</a></li>
                      <li><a class="dropdown-item" href="http://localhost/SMK_1_PASAMAN/absensi/operator/laporan/absensi_mingguan">Mingguan</a></li>
                      <li><a class="dropdown-item" href="http://localhost/SMK_1_PASAMAN/absensi/operator/laporan/absensi_bulanan">Bulanan</a></li>

                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">Pustaka</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">Informasi</a>
              </li>
              <li class="nav-item">
              <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="http://localhost/SMK_1_PASAMAN/absensi/logout.php?id=<?PHP echo $_SESSION['id_user']; ?>">Logout</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <script src="http://localhost/SMK_1_PASAMAN/absensi/assets/js/bootstrap.bundle.min.js"></script>

  </body>


  </html>