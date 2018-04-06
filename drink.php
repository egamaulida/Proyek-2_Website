<!DOCTYPE HTML>
<?php
include "admin/sistem/koneksi.php";

	$query = "SELECT * FROM tb_drink"; // Query untuk menampilkan semua data siswa
	$sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
	$data = mysql_fetch_array($sql);
?>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waroeng steak and shake </title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">     
    <link rel="stylesheet" href="css/template-style.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>      
  </head>
  
  <body class="size-1140">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <nav class="background-transparent background-transparent-hightlight full-width sticky">
        <div class="s-12 l-2">
        </div>
        <div class="top-nav s-12 l-10">
          <p class="nav-text"></p>
          <ul class="right chevron">
            <li><a href="index.php">HOME</a></li>
            <li><a href="profil.php">PROFILE</a></li>
            <li><a>PRODUCT</a>
              <ul>
                <li><a href="food.php">FOOD</a>
                </li>
                <li><a href="drink.php">DRINK</a></li>
              </ul>
            </li>
            <li><a href="diskon.php">DISCOUNT</a></li>
            <li><a href="cabang.php">OUTLET</a></li>
            <li><a href="berita.php">NEWS</a></li>
          </ul>
        </div>
      </nav>
    </header>
    
    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-dark">
          <div class="line">        
            <h3 class="text-white margin-top-bottom-40 text-size-30 text-line-height-1">WAROENG STEAK AND SHAKE</h3>
           </div>  
        </header>
        <div class="section background-white"> 
          <div class="line margin-bottom-60">
            <div class="margin"><br><br>
				<?php
					include "admin/sistem/koneksi.php";
					$query = "SELECT * FROM tb_drink"; // Query untuk menampilkan semua data siswa
					$sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
					while($data = mysql_fetch_array($sql)){
					$isi = $data['isi'];
					$id = $data['id'];
					?>
					
					<div class="s-11 m-5 l-5">
					<h5><center><b><?php echo $data['judul'];?></b></center></h5>	
							<hr>
							<img class="img-responsive img-border" src="<?php echo "admin/images/".$data['gambar'];?>" alt=""/>
							<br>
							<span align=" justify">	<?php  echo $data['isi'];?>  
							</div>
							<?php
							}
							?>

            </div>
          </div>  
        </div> 
      </article>
    </main>
    
    <!-- FOOTER -->
    <footer>
      
      <!-- Main Footer -->
      <section class="background-dark full-width">
        <!-- Map -->
        <div class="s-12 m-12 l-6 margin-m-bottom-2x">

        </div>
         
      </section>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark full-width">
        <div class="s-12 l-6">
          <p class="text-size-12">Copyright 2017, Waroeng steak and shake</p>
        </div>
      </section>
    </footer>
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>
  </body>
</html>