<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh index.php melalui URL
$id = $_GET['id'];
// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM tb_cabang WHERE id='".$id."'";
$sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
$data = mysql_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$query2 = "DELETE FROM tb_cabang WHERE id='".$id."'";
$sql2 = mysql_query($query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ../cabang.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='../cabang.php'>Kembali</a>";
}
?>