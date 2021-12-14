<?php 

// koneksi ke database
require_once('connection.php');

// get data
$id = $_GET['id'];

// mengambil data
$query = "SELECT * FROM tb_buku JOIN tb_kategori ON tb_buku.id_kategori = tb_kategori.id_kategori JOIN tb_penerbit ON tb_buku.id_penerbit = tb_penerbit.id_penerbit WHERE id_buku = '{$id}'";
$result = mysqli_query($mysqli, $query);

foreach( $result as $buku ) {
   $ktg = $buku['nama_kategori'];
   $nama = $buku['nama_buku'];
   $harga = $buku['harga_buku'];
   $stok = $buku['stok_buku'];
   $pnrbt = $buku['nama_penerbit'];
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

   <title>Edit Buku</title>
</head>
<body style="display: flex; height: 100vh; justify-content: center; align-items:center;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-10 col-lg-8 shadow p-4">
         <h3 class="modal-title text-center mb-4" id="exampleModalLabel">Edit Buku</h3>
            <form action="" method="post">
               <div class="row mb-3">
                  <label for="id" class="col-3 text-end fw-bolder">ID Buku</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="id" name="id" autocomplete="off" readonly value="<?= $id; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="nama" class="col-3 text-end fw-bolder">Nama Buku</label>
                  <div class="col-9">
                     <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required value="<?= $nama; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="kategori" class="col-3 text-end fw-bolder">Kategori Buku</label>
                  <div class="col-9">
                     <?php $query = "SELECT * FROM tb_kategori"; $result = mysqli_query($mysqli, $query); ?>
                     <select name="kategori" id="kategori" class="form-control" required>
                        <option>-Pilih Kategori-</option>
                        <?php foreach( $result as $kategori ) : ?>
                        <option <?= ($ktg == $kategori['nama_kategori'])? "selected" : "" ?> value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="harga" class="col-3 text-end fw-bolder">Harga Buku</label>
                  <div class="col-9">
                     <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" required value="<?= $harga; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="stok" class="col-3 text-end fw-bolder">Stok Buku</label>
                  <div class="col-9">
                     <input type="number" class="form-control" id="stok" name="stok" autocomplete="off" required value="<?= $stok; ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="penerbit" class="col-3 text-end fw-bolder">Penerbit Buku</label>
                  <div class="col-9">
                     <?php $query = "SELECT * FROM tb_penerbit"; $result = mysqli_query($mysqli, $query); ?>
                     <select name="penerbit" id="penerbit" class="form-control" required>
                        <option>-Pilih Penerbit-</option>
                        <?php foreach( $result as $penerbit ) : ?>
                        <option <?= ($pnrbt == $penerbit['nama_penerbit'])? "selected" : "" ?> value="<?= $penerbit['id_penerbit']; ?>"><?= $penerbit['nama_penerbit']; ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-3"></div>
                  <div class="col-9">
                     <button type="submit" name="submit" class="btn btn-primary me-2">Simpan</button>
                     <a class="btn border-primary text-primary" href="admin.php">Batal</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>


   <?php 

      if( isset($_POST['submit']) ) {
         $nama = $_POST['nama'];
         $kategori = $_POST['kategori'];
         $harga = $_POST['harga'];
         $stok = $_POST['stok'];
         $penerbit = $_POST['penerbit'];


         $query = "UPDATE tb_buku SET id_kategori = {$kategori}, nama_buku = '{$nama}', harga_buku = {$harga}, stok_buku = {$stok}, id_penerbit = '{$penerbit}' WHERE id_buku = '{$id}'";
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
               window.location.href = 'admin.php';
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
