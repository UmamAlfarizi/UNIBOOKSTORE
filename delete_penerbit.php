<?php

require_once("connection.php");

// Mendapatkan data Id penerbit
if ( isset($_GET["id"]) ) $id = $_GET["id"];
else {
    echo " Id penerbit tidak ditemmukan! <a href=penerbit.php'>Kembali</a>";
    exit();
}

// Query Get Data penerbit
$query = "DELETE FROM tb_penerbit WHERE id_penerbit = '{$id}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

if ( !$result ) {
    echo ("Gagal menghapus data!");
}
else{
   echo "
    <script>
        window.location.href = 'penerbit.php';
    </script>
    ";
}

?>