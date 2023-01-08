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
 function MessagePopUp($message,$RedirectTo) {
//     echo "<div id='dialog' title='Basic dialog'>
//   <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the &apos;x&apos; icon.</p>
// </div>";
      echo "<script>window.location.href='".$RedirectTo."';alert('".$message."');</script>";
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
            MessagePopUp("Data Guru Tersimpan","guru/tambah_guru");
 			// Header("Location:guru/tambah_guru");
 		}else{
 			Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
 		}
 	}else if($_GET['tipe'] == "tugasTambahan"){
        $queryInputTugas = mysqli_query($konek, "INSERT INTO tugas_tambahan(id_guru,nama_tugas_tambahan,kelas_tugas_tambahan,jam_tugas_tambahan)VALUES('$_POST[guru]', '$_POST[tugasTambahan]', '$_POST[kelas]', '$_POST[jamtugasTambahan]')");
        if($queryInputTugas){
            MessagePopUp("Data Tugas Guru Tersimpan","guru/tambah_tugas_guru");
            // Header("Location:guru/tambah_tugas_guru");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "jamMengajar") {
        // code...
        $queryInputJam = mysqli_query($konek,"INSERT INTO jam_mengajar (id_guru,id_mapel,kelas,ruangan,id_jurusan,hari,jam_mulai,jam_berakhir)VALUES('$_POST[guru]','$_POST[mapel]','$_POST[kelas]','$_POST[lokal]','$_POST[jurusan]','$_POST[hari]','$_POST[jamMulai]','$_POST[jamBerakhir]' )");

        if ($queryInputJam) {
            // code...
            MessagePopUp("Data Jam Mengajar Tersimpan","guru/tambah_jam_mengajar");
            // Header("Location:guru/tambah_jam_mengajar");
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
            MessagePopUp("Data Siswa Tersimpan","siswa/tambah_siswa");
            // Header("Location:siswa/tambah_siswa");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "jurusan") {
        // code...
        $queryInputJurusan = mysqli_query($konek,"INSERT INTO jurusan (nama_jurusan,kosentrasi_jurusan,kaproka_jurusan)VALUES('$_POST[jurusan]','$_POST[kosentrasi]','$_POST[guru]' )");

        if ($queryInputJurusan) {
            // code...
            MessagePopUp("Data Jurusan Tersimpan","pelajaran/tambah_jurusan");
            
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "lokal") {
        // code...
        $queryInputJurusan = mysqli_query($konek,"INSERT INTO wali_kelas (guru,kelas,nama_lokal)VALUES('$_POST[guru]','$_POST[kelas]','$_POST[lokal]')");

        if ($queryInputJurusan) {
            // code...
            // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
            // Header("Location:pelajaran/tambah_lokal");
            MessagePopUp("Data Ruangan Tersimpan","pelajaran/tambah_lokal");
            
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['tipe'] == "mapel") {
        // code...
        $queryInputJurusan = mysqli_query($konek,"INSERT INTO mapel (nama_mapel,kosentrasi)VALUES('$_POST[mapel]','$_POST[jurusan]')");

        if ($queryInputJurusan) {
            // code...
            MessagePopUp("Data Mapel Tersimpan","pelajaran/tambah_mapel");
            // Header("Location:pelajaran/tambah_mapel");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }
}else if (isset($_GET['edit'])) {
    if ($_GET['edit'] == "guru") {
        // code...
        $namaFile = $_FILES['foto']['name'];
        $namaSementara = $_FILES['foto']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = "../assets/image/guru/";

        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        $query_daftar=mysqli_query($konek,"UPDATE biodata_guru SET foto_guru='".$namaFile."', nip_guru='$_POST[nip]', nama_guru='$_POST[nama]', jenis_kelamin_guru='$_POST[jenis_kelamin]', tgl_lahir_guru='$_POST[tgl_lahir]', alamat_guru='$_POST[alamat]', pendidikan_guru='$_POST[pendidikan]', status_guru='$_POST[status]', jabatan_guru='$_POST[jabatan]', telepon_guru='$_POST[telepon]' WHERE
            id_guru='$_POST[id_guru]'");
        if($query_daftar){
        MessagePopUp("Data Guru Sudah Dirubah","guru/daftar_guru");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['edit'] == 'siswa'){
        $namaFile = $_FILES['foto']['name'];
        $namaSementara = $_FILES['foto']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = "../assets/image/guru/";

        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        $query_daftar=mysqli_query($konek,"UPDATE biodata_siswa SET foto_siswa='".$namaFile."', nis_siswa='$_POST[nis]', nama_siswa='$_POST[nama]', tgl_lahir_siswa='$_POST[tgl_lahir]', jenis_kelamin_siswa='$_POST[jenis_kelamin]', alamat_siswa='$_POST[alamat]', telepon_siswa='$_POST[telepon]', kelas_siswa='$_POST[kelas]', jurusan_siswa='$_POST[jurusan]', lokal_siswa='$_POST[lokal]' WHERE id_siswa='$_POST[id_siswa]' ");
        if($query_daftar){
          MessagePopUp("Data Guru Sudah Dirubah","siswa/daftar_siswa");
        }else{
          Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
        
    }else if ($_GET['edit'] == "jam_mengajar") {
        // code...
        $query_daftar=mysqli_query($konek,"UPDATE jam_mengajar SET id_guru = '$_POST[guru]', id_mapel = '$_POST[mapel]', kelas = '$_POST[kelas]', ruangan = '$_POST[ruangan]', id_jurusan = '$_POST[jurusan]', hari = '$_POST[hari]', jam_mulai = '$_POST[jam_mulai]', jam_berakhir = '$_POST[jam_berakhir]'");
        if($query_daftar){
        MessagePopUp("Data Jam Mengajar Sudah Dirubah","guru/jam_mengajar");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['edit'] == "tugas_guru") {
        // code...
        $query_daftar=mysqli_query($konek,"UPDATE jam_mengajar SET id_guru = '$_POST[guru]', id_mapel = '$_POST[mapel]', kelas = '$_POST[kelas]', ruangan = '$_POST[ruangan]', id_jurusan = '$_POST[jurusan]', hari = '$_POST[hari]', jam_mulai = '$_POST[jam_mulai]', jam_berakhir = '$_POST[jam_berakhir]'");
        if($query_daftar){
        MessagePopUp("Data Jam Mengajar Sudah Dirubah","guru/jam_mengajar");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['edit'] == "jurusan") {
        // code...
       $query_daftar=mysqli_query($konek,"UPDATE jurusan SET nama_jurusan='$_POST[jurusan]', kosentrasi_jurusan='$_POST[kosentrasi]', kaproka_jurusan='$_POST[guru]' WHERE
      id_jurusan='$_POST[id_jurusan]' ");
        if($query_daftar){
        MessagePopUp("Data Jam Mengajar Sudah Dirubah","pelajaran/jurusan");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['edit'] == "lokal") {
        // code...
       $query_daftar=mysqli_query($konek,"UPDATE wali_kelas SET guru='$_POST[guru]', kelas='$_POST[kelas]', nama_lokal='$_POST[lokal]' WHERE
      id_wali_kelas='$_POST[id_ruangan]' ");
        if($query_daftar){
        MessagePopUp("Data Jam Mengajar Sudah Dirubah","pelajaran/lokal");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if ($_GET['edit'] == "mapel") {
        // code...
       $query_daftar=mysqli_query($konek,"UPDATE mapel SET nama_mapel='$_POST[mapel]', kosentrasi='$_POST[jurusan]' WHERE
      id_mapel='$_POST[id_mapel]' ");
        if($query_daftar){
        MessagePopUp("Data Jam Mengajar Sudah Dirubah","pelajaran/mapel");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }
    // code...
}else if(isset($_GET['hapus'])){
    if($_GET['hapus']=="guru"){
        $queryHapusGuru = mysqli_query($konek,"DELETE FROM biodata_guru WHERE id_guru='$_POST[id_guru]'");
        $queryHapusJamGuru = mysqli_query($konek,"DELETE FROM biodata_guru WHERE id_guru='$_POST[id_guru]'");
    if($queryHapusGuru){

      MessagePopUp("Data Guru Sudah Terhapus","guru/daftar_guru");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if($_GET['hapus']=="siswa"){
        $queryHapusSiswa = mysqli_query($konek,"DELETE FROM biodata_siswa WHERE id_siswa='$_POST[id_siswa]'");
    if($queryHapusSiswa){

       MessagePopUp("Data Siswa Sudah Terhapus","siswa/daftar_siswa");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }else if($_GET['hapus']=="tugas_guru"){
        $queryHapustugas_guru = mysqli_query($konek,"DELETE FROM tugas_tambahan WHERE id_guru='$_POST[id_guru]'");
    if($queryHapustugas_guru){

      MessagePopUp("Data Tugas Guru Sudah Terhapus","guru/tugas_guru");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
        
    }else if($_GET['hapus']=="jam_mengajar"){
        $queryHapusJam_mengajar = mysqli_query($konek,"DELETE FROM jam_mengajar WHERE id_guru='$_POST[id_guru]'");
    if($queryHapusJam_mengajar){

      MessagePopUp("Data Jam Mengajar Sudah Terhapus","guru/jam_mengajar");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
        
    }else if($_GET['hapus']=="mapel"){
        $queryHapusMpl = mysqli_query($konek,"DELETE FROM mapel WHERE id_mapel='$_POST[id_mapel]'");
    if($queryHapusMpl){

      MessagePopUp("Data Mapel Sudah Terhapus","pelajaran/mapel");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
        
    }else if($_GET['hapus']=="jurusan"){
        $queryHapusJurusan = mysqli_query($konek,"DELETE FROM jurusan WHERE id_jurusan='$_POST[id_jurusan]'");
    if($queryHapusJurusan){

      MessagePopUp("Data Jurusan Sudah Terhapus","pelajaran/jurusan");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
        
    }else if($_GET['hapus']=="ruangan"){
        $queryHapusLokal = mysqli_query($konek,"DELETE FROM wali_kelas WHERE id_wali_kelas='$_POST[id_ruangan]'");
    if($queryHapusLokal){

      MessagePopUp("Data Ruangan Sudah Terhapus","pelajaran/lokal");
        }else{
            Header("Location:http://localhost/SMK_1_PASAMAN/absensi/404.php");
        }
    }
}

?>