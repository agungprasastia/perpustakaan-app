<?php
include '../../config/koneksi.php'; 

if (isset($_GET['id'])) {
    
    $id_buku = (int)$_GET['id'];
    
    $sql_del_peminjaman = "DELETE FROM peminjaman WHERE id_buku = $id_buku";
    $hasil_peminjaman = mysqli_query($koneksi, $sql_del_peminjaman);

    if ($hasil_peminjaman) {
        
        $sql_del_buku = "DELETE FROM buku WHERE id_buku = $id_buku";
        $hasil_buku = mysqli_query($koneksi, $sql_del_buku);
        
        if ($hasil_buku) {
            header("Location: ../../index.php?status=sukses_hapus_buku");
            exit;
        } else {
            echo "Error: Gagal menghapus buku. " . mysqli_error($koneksi);
        }
        
    } else {
        echo "Error: Gagal menghapus riwayat peminjaman terkait. " . mysqli_error($koneksi);
    }
    
} else {
    header("Location: ../../index.php");
    exit;
}

mysqli_close($koneksi);
?>