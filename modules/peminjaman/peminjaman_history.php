<?php
include '../../config/koneksi.php';

$sql = "SELECT 
            peminjaman.id_peminjaman,
            anggota.nama_anggota,
            buku.judul,
            peminjaman.tanggal_pinjam,
            peminjaman.tanggal_kembali,
            peminjaman.status
        FROM 
            peminjaman
        JOIN 
            anggota ON peminjaman.id_anggota = anggota.id_anggota
        JOIN 
            buku ON peminjaman.id_buku = buku.id_buku
        ORDER BY 
            peminjaman.id_peminjaman DESC";

$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan - Riwayat Peminjaman</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>  
    <div class="container">
        <h2>📚 Riwayat Semua Peminjaman</h2>    
        <a href="../../index.php" class="btn btn-secondary">Kembali ke Daftar Buku</a>     
        <a href="peminjaman_tampil.php" class="btn btn-primary">Lihat Pinjaman Aktif</a>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID Pinjam</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th> 
                    <th>Status</th>    
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($hasil) > 0) {
                    while ($data = mysqli_fetch_assoc($hasil)) {
                ?>
                        <tr>
                            <td><?php echo $data['id_peminjaman']; ?></td>
                            <td><?php echo htmlspecialchars($data['nama_anggota']); ?></td>
                            <td><?php echo htmlspecialchars($data['judul']); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($data['tanggal_pinjam'])); ?></td>
                            <td>
                                <?php
                                if ($data['tanggal_kembali']) {
                                    echo date('d-m-Y', strtotime($data['tanggal_kembali']));
                                } else {
                                    echo '-'; 
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($data['status'] == 'selesai'): ?>
                                    <span class="status status-tersedia">Selesai</span>
                                <?php else: ?>
                                    <span class="status status-dipinjam">Dipinjam</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Belum ada riwayat peminjaman.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>