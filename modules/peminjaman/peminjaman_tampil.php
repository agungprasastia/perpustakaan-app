<?php
include '../../config/koneksi.php';

$sql = "SELECT 
            peminjaman.id_peminjaman,
            anggota.nama_anggota,
            buku.judul,
            peminjaman.tanggal_pinjam,
            peminjaman.status
        FROM 
            peminjaman
        JOIN 
            anggota ON peminjaman.id_anggota = anggota.id_anggota
        JOIN 
            buku ON peminjaman.id_buku = buku.id_buku
        WHERE 
            peminjaman.status = 'dipinjam'
        ORDER BY 
            peminjaman.tanggal_pinjam ASC";

$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan - Daftar Peminjaman</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>🧾 Daftar Buku yang Sedang Dipinjam</h2>
        <a href="../../index.php" class="btn btn-secondary">Kembali ke Daftar Buku</a>
        <a href="peminjaman_tambah.php" class="btn btn-primary">Buat Transaksi Peminjaman Baru</a>
        <a href="peminjaman_history.php" class="btn btn-info">Lihat Riwayat Peminjaman</a>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID Pinjam</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Aksi</th>
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
                                <a href="peminjaman_kembali_proses.php?id=<?php echo $data['id_peminjaman']; ?>"
                                    class="btn btn-success"
                                    onclick="return confirm('Konfirmasi pengembalian buku ini?');">
                                    ✔ Kembalikan
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada buku yang sedang dipinjam.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>