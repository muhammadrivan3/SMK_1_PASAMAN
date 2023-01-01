 <?php 
 include '../db/koneksi.php';

 function generatePassword($fullName)
 {
 	$removedMultispace = preg_replace('/\s+/', ' ', $fullName);

 	$sanitized = preg_replace('/[^A-Za-z0-9\ ]/', '', $removedMultispace);

 	$lowercased = strtolower($sanitized);

 	$splitted = explode(" ", $lowercased);

 	if (count($splitted) == 1) {
 		$Pasw = substr($splitted[0], 0, rand(2, 5)) . rand(111111, 999999);
 	} else {
 		$Pasw = $splitted[0] . substr($splitted[1], 0, rand(0, 3)) . rand(11111, 99999);
 	}
 	return $Pasw;
 }

 if(isset($_GET['tipe'])){
 	if ($_GET['tipe'] == "guru") {
 		// code...
 		$getName =  preg_replace('/\s+/', ' ', $_POST['nama']);
 		$name = strtolower($getName);
 		$getPassword = generatePassword($getName);

 		// ambil data file
 		$namaFile = $_FILES['foto']['name'];
 		$namaSementara = $_FILES['foto']['tmp_name'];

		// tentukan lokasi file akan dipindahkan
 		$dirUpload = "../assets/image/guru/";

		// pindahkan file
 		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

 		$queryInputGuru = mysqli_query($konek,"INSERT INTO biodata_guru(nip_guru, nama_guru, jenis_kelamin_guru, tgl_lahir_guru, alamat_guru, pendidikan_guru, status_guru, jabatan_guru, telepon_guru, foto_guru, username, password) VALUES ('$_POST[nip]', '".strtolower($_POST['nama'])."', '$_POST[jenis_kelamin]', '$_POST[tgl_lahir]', '$_POST[alamat]', '$_POST[pendidikan]', '$_POST[status]', '$_POST[jabatan]', '$_POST[telepon]', '$namaFile', '$name','$getPassword')");
 		if($queryInputGuru){
 			Header("Location:guru/tambah_guru");
 		}else{
 			Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
 		}
 	}else if($_GET['tipe'] == "tugasTambahan"){
        $queryInputTugas = mysqli_query($konek, "INSERT INTO tugas_tambahan(id_guru,nama_tugas_tambahan,kelas_tugas_tambahan,jam_tugas_tambahan)VALUES('$_POST[guru]', '$_POST[tugasTambahan]', '$_POST[kelas]', '$_POST[jamtugasTambahan]')");
        if($queryInputTugas){
            Header("Location:guru/tambah_tugas_guru");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "jamMengajar") {
        // code...
        $queryInputJam = mysqli_query($konek,"INSERT INTO jam_mengajar (id_guru,id_mapel,kelas,ruangan,id_jurusan,hari,jam_mulai,jam_berakhir)VALUES('$_POST[guru]','$_POST[mapel]','$_POST[kelas]','$_POST[lokal]','$_POST[jurusan]','$_POST[hari]','$_POST[jamMulai]','$_POST[jamBerakhir]' )");

        if ($queryInputJam) {
            // code...
            Header("Location:guru/tambah_jam_mengajar");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "siswa") {
        // code...
        // code...
        $getName =  preg_replace('/\s+/', ' ', $_POST['nama']);
        $name = strtolower($getName);
        $getPassword = generatePassword($getName);

        // ambil data file
        $namaFile = $_FILES['foto']['name'];
        $namaSementara = $_FILES['foto']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = "../assets/image/siswa/";

        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        $queryInputSiswa = mysqli_query($konek,"INSERT INTO biodata_siswa (nis_siswa,nama_siswa,jenis_kelamin_siswa,tgl_lahir_siswa,alamat_siswa,kelas_siswa,lokal_siswa,jurusan_siswa,telepon_siswa,foto_siswa,username,password)VALUES('$_POST[nis]','".strtolower($_POST['nama'])."','$_POST[jenis_kelamin]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[kelas]','$_POST[lokal]','$_POST[jurusan]','$_POST[telepon]', '$namaFile', '$name','$getPassword' )");

        if ($queryInputSiswa) {
            // code...
            Header("Location:siswa/tambah_siswa");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "jurusan") {
        // code...
        $queryInputJurusan = mysqli_query($konek,"INSERT INTO jurusan (nama_jurusan,kosentrasi_jurusan,kaproka_jurusan)VALUES('$_POST[jurusan]','$_POST[kosentrasi]','$_POST[guru]' )");

        if ($queryInputJurusan) {
            // code...
            Header("Location:pelajaran/tambah_jurusan");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "lokal") {
        // code...
        $queryInputJurusan = mysqli_query($konek,"INSERT INTO wali_kelas (id_guru,kelas,nama_lokal)VALUES('$_POST[guru]','$_POST[kelas]','$_POST[lokal]' )");

        if ($queryInputJurusan) {
            // code...
            Header("Location:pelajaran/tambah_lokal");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "mapel") {
        // code...
        $queryInputJurusan = mysqli_query($konek,"INSERT INTO mapel (nama_mapel,kosentrasi)VALUES('$_POST[mapel]','$_POST[jurusan]')");

        if ($queryInputJurusan) {
            // code...
            Header("Location:pelajaran/tambah_mapel");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }
 }

?>