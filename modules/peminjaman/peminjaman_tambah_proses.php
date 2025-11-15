<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anggota     = (int)$_POST['id_anggota'];
    $id_buku        = (int)$_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];

    $sql_pinjam = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, status) 
                   VALUES ($id_anggota, $id_buku, '$tanggal_pinjam', 'dipinjam')";
    $hasil_pinjam = mysqli_query($koneksi, $sql_pinjam);

    if ($hasil_pinjam) {
        $sql_update_buku = "UPDATE buku SET status = 'dipinjam' WHERE id_buku = $id_buku";
        $hasil_update = mysqli_query($koneksi, $sql_update_buku);
        
        if ($hasil_update) {
            header("Location: peminjaman_tampil.php?status=sukses_pinjam");
            exit;
        } else {
           
        }
        
    } else {
        
    }
    
} else {
    header("Location: peminjaman_tampil.php");
    exit;
}

mysqli_close($koneksi);
?>