<?php

require_once("connection.php");

// Mendapatkan data Id buku
if ( isset($_GET["id"]) ) $id = $_GET["id"];
else {
    echo " Id buku tidak ditemmukan! <a href=admin.php'>Kembali</a>";
    exit();
}

// Query Get Data buku
$query = "DELETE FROM tb_buku WHERE id_buku = '{$id}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

if ( !$result ) {
    echo ("Gagal menghapus data!");
}
else{
   echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href = 'admin.php';
    </script>
    ";
}

?>