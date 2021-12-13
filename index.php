<?php 

// koneksi ke database
require_once('connection.php');

// mengambil data
$query = "SELECT * FROM tb_buku JOIN tb_kategori ON tb_buku.id_kategori = tb_kategori.id_kategori JOIN tb_penerbit ON tb_buku.id_penerbit = tb_penerbit.id_penerbit";
$result = mysqli_query($mysqli, $query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- Bootsrap Icon -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

   <title>UNIBOOKSTORE</title>
</head>
<body>

   <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
      <div class="container">
         <a class="navbar-brand" href="index.php">UNIBOOKSTORE</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="admin.php">Admin</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="pengadaan.php">Pengadaan</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- /NAVBAR -->

   <!-- MAIN -->
   <section id="main" style="margin: 7rem 0 5rem;">
      <div class="container">
         <div class="row justify-content-end mb-5">
            <div class="col-6 col-lg-9 text-end">
               Cari Buku :
            </div>
            <div class="col-6 col-lg-3">
               <form>
                  <input class="form-control" type="search" aria-label="Search">
               </form>
            </div>
         </div>
         <div class="row">
            <?php 
               foreach( $result as $buku ) :
                  $kategori = ucwords($buku['nama_kategori']);
                  $nama = ucwords($buku['nama_buku']);
                  $harga = $buku['harga_buku'];
                  $stok = $buku['stok_buku'];
                  $penerbit = ucwords($buku['nama_penerbit']);
            ?>
               <div class="col-md-6 col-lg-4 mb-4">
                  <div class="card shadow">
                     <div class="card-body">
                        <h5 class="card-title"><?= $nama; ?></h5>
                        <h6 class="card-subtitle mt-1 mb-4">Rp <?= number_format($harga); ?></h6> 
                        <div class="card-subtitle mb-2">Kategori: <?= $kategori; ?></div> 
                        <div class="card-subtitle mb-2">Penerbit: <?= $penerbit; ?></div> 
                        <div class="card-subtitle mb-4">Stok: <?= $stok; ?></div> 
                        <a href="#" class="btn btn-primary">Beli Buku</a>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>
   <!-- /MAIN -->




   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   -->
</body>
</html>
