<?php 

usleep(500000);

require_once('connection.php');

$keyword = $_GET['keyword'];

$query = "SELECT * FROM tb_buku JOIN tb_kategori ON tb_buku.id_kategori = tb_kategori.id_kategori JOIN tb_penerbit ON tb_buku.id_penerbit = tb_penerbit.id_penerbit
            WHERE
            nama_buku LIKE '%$keyword%' OR   
            nama_kategori LIKE '%$keyword%' OR   
            nama_penerbit LIKE '%$keyword%' 
         ";
$result = mysqli_query($mysqli, $query);

?>

<?php 
   foreach( $result as $buku ) :
      $kategori = ucwords($buku['nama_kategori']);
      $nama = ucwords($buku['nama_buku']);
      $harga = $buku['harga_buku'];
      $stok = $buku['stok_buku'];
      $penerbit = ucwords($buku['nama_penerbit']);
?>
   <div class="col-md-6 col-lg-4 mb-4">
      <div class="card shadow-sm">
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