<?php 

// koneksi ke database
require_once('connection.php');

// get data
$id = $_GET['id'];

// mengambil data
$query = "SELECT * FROM tb_penerbit WHERE id_penerbit = '{$id}'";
$result = mysqli_query($mysqli, $query);

foreach( $result as $penerbit ) {
   $nama = $penerbit['nama_penerbit'];
   $alamat = $penerbit['alamat_penerbit'];
   $kota = $penerbit['kota_penerbit'];
   $telepon = $penerbit['telepon'];
}    

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

   <title>Edit Penerbit Buku</title>
</head>
<body style="display: flex; height: 100vh; justify-content: center; align-items:center;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-10 col-lg-8 shadow p-4">
         <h3 class="modal-title text-center mb-4" id="exampleModalLabel">Edit Penerbit Buku</h3>
            <form action="" method="post">
               <div class="row mb-3">
                  <label for="id" class="col-3 text-end fw-bolder">ID Penerbit</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="id" name="id" autocomplete="off" readonly value="<?= $id; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama" class="col-3 text-end fw-bolder">Nama Penerbit</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required value="<?= $nama; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="col-3 text-end fw-bolder">Alamat Penerbit</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required value="<?= $alamat; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="kota" class="col-3 text-end fw-bolder">Kota Penerbit</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="kota" name="kota" autocomplete="off" required value="<?= $kota; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="telepon" class="col-3 text-end fw-bolder">Nomor Telepon</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="telepon" name="telepon" autocomplete="off" required value="<?= $telepon; ?>">
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-3"></div>
                  <div class="col-9">
                     <button type="submit" name="submit" class="btn btn-primary me-2">Simpan</button>
                     <a class="btn border-primary text-primary" href="penerbit.php">Batal</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>


   <?php 

      if( isset($_POST['submit']) ) {
         $nama = $_POST['nama'];
         $alamat = $_POST['alamat'];
         $kota = $_POST['kota'];
         $telepon = $_POST['telepon'];


         $query = "UPDATE tb_penerbit SET nama_penerbit = '{$nama}', alamat_penerbit = '{$alamat}', kota_penerbit = '{$kota}', telepon = '{$telepon}' WHERE id_penerbit = '{$id}'";
         $update = mysqli_query($mysqli, $query);

         if( $update == false ) {
            echo "
            <script>
               alert('Gagal Mengubah Data!');
            </script>
            ";
         }
         else {
            echo "
            <script>
               alert('Berhasil Mengubah Data!');
               window.location.href = 'penerbit.php';
            </script>
            ";
         }
      }      
   ?>


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
