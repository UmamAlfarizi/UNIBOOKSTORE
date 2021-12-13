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
   <link href="style.css" rel="stylesheet"">

   <!-- Bootsrap Icon -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

   <title>Unibookstore</title>
</head>
<body id="home">

   <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
      <div class="container">
         <a class="navbar-brand" href="#">Selamat Datang, Admin!</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#home">Buku</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#about">Kategori</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#gallery">Penerbit</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- /NAVBAR -->

   <!-- MAIN -->
   <section id="main">
      <div class="container">
         <div class="mb-4">
            <div class="d-flex bd-highlight mb-3">
               <div class="me-auto p-2 bd-highlight">
                  <a href="tambah_buku.php" class="btn btn-sm btn-success">Tambah Data</a>
               </div>
               <div class="p-2 bd-highlight">Cari buku:</div>
               <div class="p-2 bd-highlight">
                  <div class="col-sm-10">
                     <input type="email" class="form-control form-control-sm" id="colFormLabelSm">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <table class="table table-hover table-responsive">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $i = 1;
                        foreach( $result as $buku ) :
                           $id = $buku['id_buku'];
                           $kategori = $buku['nama_kategori'];
                           $nama = $buku['nama_buku'];
                           $harga = $buku['harga_buku'];
                           $stok = $buku['stok_buku'];
                           $penerbit = $buku['nama_penerbit'];
                     ?>
                     <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $kategori; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $harga; ?></td>
                        <td><?= $stok; ?></td>
                        <td><?= $penerbit; ?></td>
                        <td>
                           <a href="edit_buku.php?id=<?= $id; ?>" >Edit</a>
                           <a href="delete_buku.php?id=<?= $id; ?>" onclick=" return confirm_delete()">Hapus</a>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
   <!-- /MAIN -->

   <!-- FOOTER -->
   <!-- <footer class="bg-primary text-center text-white pb-5">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://web.facebook.com/idji.dgretonger/" target="_blank" class="fw-bold text-white">Umam Alfarizi</a></p>
   </footer> -->
   <!-- /FOOTER -->





   <!-- jquery -->
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <!-- Optional JavaScript; choose one of the two! -->


   <script type="text/javascript">
      function confirm_delete(){
         return confirm("Anda yakin ingin menghapus data ini?");
      }
   </script>

   

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
  
</body>
</html>
