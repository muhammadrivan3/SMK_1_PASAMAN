<?php
if(!isset($_SESSION['id_user'])){
//jika belum login jangan lanjut..
header("Location:http://localhost/absensi_siswa/");
}

//cek level user
if($_SESSION['akses']!="guru" ){
	header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
}

?>
