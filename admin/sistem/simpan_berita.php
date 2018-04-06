<?php
include "koneksi.php";
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$gambarbaru = date('dmYHis').$gambar;
// Set path folder tempat menyimpan fotonya
$path = "../images/".$gambarbaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO tb_new VALUES('', '".$judul."', '".$isi."', '".$gambarbaru."')";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../berita.php?status=succes"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='../berita.php'>Kembali Ke input berita</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='../berita.php'>Kembali Ke input berita</a>";
}
?>