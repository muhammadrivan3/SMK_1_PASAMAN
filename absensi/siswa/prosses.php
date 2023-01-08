<?php 
include "../db/koneksi.php";
function MessagePopUp($message,$RedirectTo) {
//     echo "<div id='dialog' title='Basic dialog'>
//   <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the &apos;x&apos; icon.</p>
// </div>";
      echo "<script>window.location.href='".$RedirectTo."';alert('".$message."');</script>";
}
if (isset($_GET['tipe'])) {
	// code...
	if ($_GET['tipe'] == "absen_siswa") {
		// code...
		date_default_timezone_set('Asia/Jakarta');
		$tglSekarang = date("Y-m-d");
		$waktuSekarang = date('H:i:s');
		$hari = date('l');
		if ($hari == "Monday") {
                  // code...
			$hari = "SENIN";
		}else if ($hari == "Tuesday") {
                  // code...
			$hari = "SELASA";
		}else if ($hari == "Wednesday") {
                  // code...
			$hari = "RABU";
		}else if ($hari == "Thursday") {
                  // code...
			$hari = "KAMIS";
		}else if ($hari == "Friday") {
                  // code...
			$hari = "JUMAT";
		}else if ($hari == "Saturday") {
                  // code...
			$hari = "SABTU";
		}else if ($hari == "Sunday") {
                  // code...
			$hari = "Minggu";
		}
		$queryInputAbsen = mysqli_query($konek,"INSERT INTO absensi_siswa(id_siswa,id_wali_kelas,id_guru,id_jurusan,tgl_absensi,jam_absensi, absensi,keterangan)
			values('".$_SESSION['id_user']."','".$_SESSION['ruangan']."','".$_GET['guru']."','".$_SESSION['jurusan']."','".$tglSekarang."','".$_GET['jamKe']."','H','');");
		if ($queryInputAbsen) {
					// code...
			MessagePopUp("TERIMA KASIH!!! <br> ANDA SUDAH HADIR DI PERTEMUAN INI","kelas/absensiOnline");
			// Header("Location:kelas/absensiOnline");
		}else{
			Header("Location:404.php");
		}
		// $queryDataJamKe = mysqli_query($konek,"SELECT * FROM jam_mengajar WHERE hari='".$hari."' AND kelas='".$_SESSION['kelas']."' AND ruangan=".$_SESSION['ruangan']." AND id_jurusan=".$_SESSION['jurusan']." ");
		// $jamKe=1;
		// while($dataJamKe = mysqli_fetch_array($queryDataJamKe)){
		// 	if ($_GET['jam'] == $dataJamKe['jam_mulai']) {
		// 		// code...
		// 		// echo $jamKe;
		// 		$queryInputAbsen = mysqli_query($konek,"INSERT INTO absensi_siswa(id_siswa,id_wali_kelas,id_guru,id_jurusan,tgl_absensi,jam_absensi, absensi,keterangan)
		// 		values('".$_SESSION['id_user']."','".$_SESSION['ruangan']."','".$_GET['guru']."','".$_SESSION['jurusan']."','".$tglSekarang."','".$jamKe."','H','');");
		// 		if ($queryInputAbsen) {
		// 			// code...
		// 			Header("Location:kelas/absensiOnline");
		// 		}else{
		// 			Header("Location:404.php");
		// 		}
		// 	}
		// }

		
	}
}

?>