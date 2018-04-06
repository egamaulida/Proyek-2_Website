<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$judul = $_POST['judul'];
$isi = $_POST['isi'];

  // Proses upload
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM tb_home WHERE id='".$id."'";
    $sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysql_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    
    // Proses ubah data ke Database
    $query = "UPDATE tb_home SET judul='".$judul."', isi='".$isi."' WHERE id='".$id."'";
    $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ../index.php"); // Redirect ke halaman home.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='ubah_index.php'>Kembali Ke Form ubah</a>";
    }

  // Proses ubah data ke Database
  $query = "UPDATE tb_home SET judul='".$judul."', isi='".$isi."' WHERE id='".$id."'";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../index.php?status=ubah_succes"); // Redirect ke halaman home.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='ubah_index.php'>Kembali Ke Form</a>";
  }
?>