<?php 
    include "db/koneksi.php";
    $query=mysqli_query($konek,"SELECT * FROM biodata_sekolah");
    $data=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title><?php echo strtoupper($data['nama_sekolah']); ?></title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/custom/style.css">


		<link rel="stylesheet" href="assets/css/bootstrap.min.css" /> 
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" /> 
    <link rel="stylesheet" href="assets/css/custom/login_style.css" />
        <!-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
		<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> -->
    <link rel="shortcut icon" href="assets/image/<?PHP echo $data['photo_sekolah']; ?>" />
</head>
    <body>
        <!-- Navbar  -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark p-md-3">
          <div class="container-fluid">
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
                  <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="http://localhost/absensi_siswa">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" style="font-weight: 600; font-size: 1.2em;" href="#">Contact</a>
                </li>
               
              </ul>
            </div>
          </div>
        </nav>
         
    <div class="box">
        <div class="form"> 

            <h3>MASUK</h3>
            <form id="loginform" method="post" action="prosses.php?tipe=login">
            <div class="inputBox">
                <input type="text" name="username" required="required"/>
                <span>Username</span>
                 <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required"/>
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <label style="color:#4d4d4d;">
                    <input type="radio" name="jenis_login"value="siswa" />
                    Siswa
                </label>
                <label style="color:#4d4d4d;">
                    <input type="radio" name="jenis_login"value="guru" />
                    Guru
                </label>
            </div>
            <input type="submit" value="login" name="login" />
            </form>
            
        </div>
    </div>

    <br>

    <!-- FOOTER -->
    <footer class="bg-dark text-center text-white" style="position: absolute; bottom: 0; width: 100%;">
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
        if (window.pageYOffset > -1) {
          nav.classList.add('bg-dark', 'shadow');
        } else {
          nav.classList.remove('bg-dark', 'shadow');
        }
      });
    </script>
    </body>

</html>