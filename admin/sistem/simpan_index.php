<?php
include "koneksi.php";
$judul = $_POST['judul'];
$isi = $_POST['isi'];


  // Proses simpan ke Database
  $query = "INSERT INTO tb_home VALUES('', '".$judul."', '".$isi."')";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../index.php?status=succes"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='../index.php'>Kembali Ke input home</a>";
  }
?>