<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];


// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan : 
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "../images/".$fotobaru;
  
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM tb_profil WHERE id='".$id."'";
    $sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysql_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	
		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("../images/".$data['foto'])) // Jika foto ada
		unlink("../images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    
		// Proses ubah data ke Database
		$query = "UPDATE tb_profil SET judul='".$judul."', isi='".$isi."', alamat='".$alamat."', no_telp='".$no_telp."', foto='".$fotobaru."' WHERE id='".$id."'";
		$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
		
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			  // Jika Sukses, Lakukan :
			  header("location: ../profil.php"); // Redirect ke halaman profil.php
		}else{
			  // Jika Gagal, Lakukan :
			  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  echo "<br><a href='ubah_profil.php'>Kembali Ke Form ubah</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='ubah_profil.php'>Kembali Ke Form ubah</a>";
	  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	  // Proses ubah data ke Database
	  $query = "UPDATE tb_profil SET judul='".$judul."', isi='".$isi."', alamat='".$alamat."', no_telp='".$no_telp."' WHERE id='".$id."'";
	  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
	  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: ../profil.php?status=ubah_succes"); // Redirect ke halaman profil.php
	  }else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='ubah_profil.php'>Kembali Ke Form</a>";
	  }
}
?>