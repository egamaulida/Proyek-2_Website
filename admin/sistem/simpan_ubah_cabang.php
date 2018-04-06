<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$id= $_POST['id'];
$nama_cabang = $_POST['nama_cabang'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$waktu_buka = $_POST['waktu_buka'];
$waktu_tutup= $_POST['waktu_tutup'];
$keterangan = $_POST['keterangan'];

   
  // Proses ubah data ke Database
   $query = "UPDATE tb_cabang SET nama_cabang='".$nama_cabang."', alamat='".$alamat."', telp='".$telp."', waktu_buka='".$waktu_buka."', waktu_tutup='".$waktu_tutup."', keterangan='".$keterangan."' WHERE id='".$id."'";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../cabang.php?status=ubah_succes"); // Redirect ke halaman profil.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='ubah_cabang.php'>Kembali Ke Form cabang</a>";
  }
?>