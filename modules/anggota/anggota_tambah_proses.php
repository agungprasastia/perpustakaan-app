<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_anggota = htmlspecialchars($_POST['nama_anggota']);
    $email        = htmlspecialchars($_POST['email']);
    $telepon      = htmlspecialchars($_POST['telepon']);

    $sql = "INSERT INTO anggota (nama_anggota, email, telepon) 
            VALUES ('$nama_anggota', '$email', '$telepon')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: anggota_tampil.php?status=sukses_tambah");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
    
} else {
    header("Location: anggota_tampil.php");
    exit;
}

mysqli_close($koneksi);
?>