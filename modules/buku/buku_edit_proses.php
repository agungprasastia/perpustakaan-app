<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku      = (int)$_POST['id_buku'];
    $judul        = htmlspecialchars($_POST['judul']);
    $penulis      = htmlspecialchars($_POST['penulis']);
    $penerbit     = htmlspecialchars($_POST['penerbit']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];

    $sql = "UPDATE buku SET 
                judul = '$judul', 
                penulis = '$penulis', 
                penerbit = '$penerbit', 
                tahun_terbit = $tahun_terbit 
            WHERE 
                id_buku = $id_buku";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=sukses_edit");
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