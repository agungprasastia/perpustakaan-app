<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anggota   = (int)$_POST['id_anggota'];
    $nama_anggota = htmlspecialchars($_POST['nama_anggota']);
    $email        = htmlspecialchars($_POST['email']);
    $telepon      = htmlspecialchars($_POST['telepon']);

    $sql = "UPDATE anggota SET 
                nama_anggota = '$nama_anggota', 
                email = '$email', 
                telepon = '$telepon' 
            WHERE 
                id_anggota = $id_anggota";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: anggota_tampil.php?status=sukses_edit");
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