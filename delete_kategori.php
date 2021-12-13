<?php

require_once("connection.php");

// Mendapatkan data Id kategori
if ( isset($_GET["id"]) ) $id = $_GET["id"];
else {
    echo " Id kategori tidak ditemmukan! <a href=kategori.php'>Kembali</a>";
    exit();
}

// Query Get Data kategori
$query = "DELETE FROM tb_kategori WHERE id_kategori = '{$id}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

if ( !$result ) {
    echo ("Gagal menghapus data!");
}
else{
   echo "
    <script>
        window.location.href = 'kategori.php';
    </script>
    ";
}

?>