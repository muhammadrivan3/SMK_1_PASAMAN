<?php
if(!isset($_SESSION['id_user'])){
//jika belum login jangan lanjut..
header("Location:http://localhost/absensi_siswa/");
}

//cek level user
if($_SESSION['akses']!="operator" ){
	// header("Location:http://localhost/absensi_siswa/404.php");//jika bukan admin jangan lanjut
}else if($_SESSION['akses']!="admin"){
	// header("Location:http://localhost/absensi_siswa/404.php");//jika bukan admin jangan lanjut
}else{
	header("Location:http://localhost/absensi_siswa/404.php");
}
// else if($_SESSION['akses']!="operator"){
// 	header("Location:http://localhost/absensi_siswa/404.php");
// }

?>
