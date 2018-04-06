<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$judul = $_POST['judul'];
$isi = $_POST['isi'];
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_gambar'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $gambar = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $gambarbaru = date('dmYHis').$gambar;
  
  // Set path folder tempat menyimpan fotonya
  $path = "../images/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM beranda WHERE id='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../images/".$data['gambar'])) // Jika foto ada
      unlink("../images/".$data['gambar']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE beranda SET judul='".$judul."', isi='".$isi."', ".$gambarbaru."' WHERE id='".$id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ../index.php"); // Redirect ke halaman profil.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='ubah_index.php'>Kembali Ke Form ubah</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='ubah_index.php'>Kembali Ke Form ubah</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE beranda SET judul='".$judul."', isi='".$isi."' WHERE id='".$id."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../index.php?status=ubah_succes"); // Redirect ke halaman profil.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='ubah_index.php'>Kembali Ke Form</a>";
  }
}
?>