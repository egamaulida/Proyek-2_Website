<?php
include "koneksi.php";

$nama_cabang = $_POST['nama_cabang'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$waktu_buka = $_POST['waktu_buka'];
$waktu_tutup = $_POST['waktu_tutup'];
$keterangan = $_POST['keterangan'];

  // Proses simpan ke Database
  $query = "INSERT INTO tb_cabang VALUES('', '".$nama_cabang."', '".$alamat."', '".$telp."', '".$waktu_buka."', '".$waktu_tutup."', '".$keterangan."' )";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../cabang.php?status=succes"); // Redirect ke halaman cabang.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='../cabang.php'>Kembali Ke input cabang</a>";
  }
  
?>