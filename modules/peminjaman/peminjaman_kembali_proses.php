<?php
include '../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id_peminjaman = (int)$_GET['id'];
    $tanggal_kembali = date('Y-m-d');

    $sql_get_buku = "SELECT id_buku FROM peminjaman WHERE id_peminjaman = $id_peminjaman";
    $hasil_get_buku = mysqli_query($koneksi, $sql_get_buku);
    
    if (mysqli_num_rows($hasil_get_buku) > 0) {
        $data_pinjam = mysqli_fetch_assoc($hasil_get_buku);
        $id_buku = $data_pinjam['id_buku'];
        $sql_update_pinjam = "UPDATE peminjaman SET 
                                status = 'selesai', 
                                tanggal_kembali = '$tanggal_kembali' 
                              WHERE 
                                id_peminjaman = $id_peminjaman";
        $hasil_update_pinjam = mysqli_query($koneksi, $sql_update_pinjam);

        if ($hasil_update_pinjam) {
            $sql_update_buku = "UPDATE buku SET status = 'tersedia' WHERE id_buku = $id_buku";
            $hasil_update_buku = mysqli_query($koneksi, $sql_update_buku);

            if ($hasil_update_buku) {
                header("Location: peminjaman_tampil.php?status=sukses_kembali");
                exit;
            } else {

            }
        } else {
            
        }

    } else {
        
    }
    
} else {
    header("Location: peminjaman_tampil.php");
    exit;
}

// Tutup koneksi
mysqli_close($koneksi);
?>