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

   <title>Admin</title>
</head>
<body>

   <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg navbar-light  bg-white shadow-sm fixed-top">
      <div class="container">
         <a class="navbar-brand" href="index.php">UNIBOOKSTORE</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="admin.php">Admin</a>
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
   <section id="main" style="margin-top: 6rem;">
      <div class="container">
         <div class="row mb-4">
            <h2 class="text-center">Data Buku</h2>
         </div>
         <div class="row mb-4">
            <div class="col p-0">
               <a href="tambah_buku.php" class="btn btn-success"><i class="bi bi-file-plus"></i> Tambah Data</a>
            </div>
         </div>
         <div class="row">
            <div class="col-12 shadow-sm">
               <table class="table table-hover table-responsive">
                  <thead>
                     <tr>
                        <th scope="col">ID Buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Harga (Rp)</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        foreach( $result as $buku ) :
                           $id = $buku['id_buku'];
                           $kategori = $buku['nama_kategori'];
                           $nama = $buku['nama_buku'];
                           $harga = $buku['harga_buku'];
                           $stok = $buku['stok_buku'];
                           $penerbit = $buku['nama_penerbit'];
                     ?>
                     <tr>
                        <td scope="row"><?= $id; ?></td>
                        <td><?= ucwords($kategori); ?></td>
                        <td><?= ucwords($nama); ?></td>
                        <td><?= number_format($harga); ?></td>
                        <td><?= $stok; ?></td>
                        <td><?= ucwords($penerbit); ?></td>
                        <td>
                           <a href="edit_buku.php?id=<?= $id; ?>" class="btn btn-sm btn-warning my-1"><i class="bi bi-pencil-square"></i></a>
                           <a href="delete_buku.php?id=<?= $id; ?>" class="btn btn-sm btn-danger my-1" onclick=" return confirm_delete()"><i class="bi bi-trash"></i></a>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row mt-5 text-end">
            <div class="col-12 p-0">
               <a href="kategori.php" class="btn btn-sm btn-outline-secondary">Data Kategori</a>
               <a href="penerbit.php" class="btn btn-sm btn-outline-secondary ms-2">Data Penerbit</a>
            </div>
         </div>
      </div>
   </section>
   <!-- /MAIN -->




   
   <script type="text/javascript">
      function confirm_delete(){
         return confirm("Anda yakin ingin menghapus data ini?");
      }
   </script>


   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
  
</body>
</html>
