<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul        = htmlspecialchars($_POST['judul']);
    $penulis      = htmlspecialchars($_POST['penulis']);
    $penerbit     = htmlspecialchars($_POST['penerbit']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];

    $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit) 
            VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../../index.php?status=sukses_tambah");
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