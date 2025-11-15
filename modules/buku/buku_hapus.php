<?php
include '../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id_buku = (int)$_GET['id'];
    $sql = "DELETE FROM buku WHERE id_buku = $id_buku";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=sukses_hapus");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
    
} else {
    header("Location: ../../index.php");
    exit;
}

mysqli_close($koneksi);
?>