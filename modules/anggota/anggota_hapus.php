<?php
include '../../config/koneksi.php'; 

if (isset($_GET['id'])) {
    
    $id_anggota = (int)$_GET['id'];
    
    $sql_del_peminjaman = "DELETE FROM peminjaman WHERE id_anggota = $id_anggota";
    $hasil_peminjaman = mysqli_query($koneksi, $sql_del_peminjaman);

    if ($hasil_peminjaman) {
        
        $sql_del_anggota = "DELETE FROM anggota WHERE id_anggota = $id_anggota";
        $hasil_anggota = mysqli_query($koneksi, $sql_del_anggota);
        
        if ($hasil_anggota) {
            header("Location: anggota_tampil.php?status=sukses_hapus_cascade");
            exit;
        } else {
            echo "Error: Gagal menghapus anggota. " . mysqli_error($koneksi);
        }
        
    } else {
        echo "Error: Gagal menghapus riwayat peminjaman terkait. " . mysqli_error($koneksi);
    }
    
} else {
    header("Location: anggota_tampil.php");
    exit;
}

mysqli_close($koneksi);
?>