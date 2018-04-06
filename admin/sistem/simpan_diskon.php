<?php
include "koneksi.php";
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "../images/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO tb_diskon VALUES('', '".$judul."', '".$isi."',  '".$alamat."', '".$no_telp."', '".$fotobaru."')";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../diskon.php?status=succes"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='..diskon.php'>Kembali Ke input profil</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='../diskon.php'>Kembali Ke input profil</a>";
}
?>