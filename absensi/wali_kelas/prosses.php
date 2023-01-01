<?php 
include "../db/koneksi.php";


if (isset($_GET['tipe'])) {
		// code...
	if ($_GET['tipe'] == "absensiSiswa") {
			// code...
			// $queryInputAbsen=mysqli_query($konek,"INSERT INTO absensi_siswa (id_siswa,id_wali_kelas,id_guru,id_jurusan,tgl_absensi,jam_absensi,absensi,keterangan)
			// 	VALUES('$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]','$_POST[]')")
		$queryCheckJam = "SELECT * FROM jam_mengajar WHERE id_guru='$_SESSION[id_user] 'AND kelas='$_POST[kelas]' AND ruangan='$_POST[lokal]' AND id_jurusan='$_POST[id_jurusan]'";
		$showCheck =mysqli_query($konek,$queryCheckJam);
		if(mysqli_num_rows($showCheck)>0){
			while ($data=mysqli_fetch_array($showCheck)) {
				$queryCheckAbsen = "SELECT * FROM absensi_siswa WHERE id_guru='$_SESSION[id_user]'AND id_wali_kelas='$_POST[lokal]' AND id_jurusan='$_POST[id_jurusan]' AND tgl_absensi='$_POST[tgl]' AND jam_absensi='$_POST[jam]'";
				$showCheckAbsen = mysqli_query($konek, $queryCheckAbsen);
				if(mysqli_num_rows($showCheckAbsen)>0){
					// foreach (array_combine($_POST['id_siswa'], $_POST['absensi']) as $id_siswa => $kodeAbsen) {
					// 	$queryInput = mysqli_query($konek,"UPDATE absensi_siswa SET absensi='$kodeAbsen' WHERE id_siswa='$id_siswa' AND tgl_absensi='$_POST[tgl]';");
					// }
					foreach ($_POST['id_siswa'] as $x => $value) {
						$queryInput = mysqli_query($konek,"UPDATE absensi_siswa SET absensi='".$_POST['absensi'][$x]."' , keterangan='".$_POST['keterangan'][$x]."' WHERE id_siswa='".$_POST['id_siswa'][$x]."' AND tgl_absensi='$_POST[tgl]' AND jam_absensi='$_POST[jam]';");
					}
					Header("Location:absensi/absensi_online");
				}else{
					// $setArray = array_merge($_POST['id_siswa'],$_POST['absensi'],$_POST['keterangan']);
					// $jamBelajar =$data['jam_mulai'];
					// foreach (array_merge($_POST['id_siswa'], ($_POST['absensi'] => $_POST['keterangan'])) 
					// 	as $id_siswa => ($kodeAbsen, $keterangan])) {
					// $x=0;
					foreach($_POST['id_siswa'] as $x => $value){
					// foreach (array_combine($_POST['id_siswa'], $_POST['absensi']) as $id_siswa => $kodeAbsen) {
						$queryInput = mysqli_query($konek,"INSERT INTO absensi_siswa(id_siswa,id_wali_kelas,id_guru,id_jurusan,tgl_absensi,jam_absensi, absensi,keterangan)
							values('".$_POST['id_siswa'][$x]."','$_POST[lokal]','$_SESSION[id_user]','$_POST[id_jurusan]','$_POST[tgl]','$_POST[jam],','".$_POST['absensi'][$x]."','".$_POST['keterangan'][$x]."');");
						// echo "-".$id_siswa."-".$kodeAbsen."<br>";					
					}
					Header("Location:absensi/absensi_online");

				}

			}
		}
	}
}
?>