<?php
include 'config/koneksi.php';
$sql = "SELECT * FROM buku ORDER BY judul ASC";
$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan - Daftar Buku</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>📚 Daftar Buku Perpustakaan</h2>
        <a href="modules/buku/buku_tambah.php" class="btn btn-primary">Tambah Buku Baru</a>
        <a href="modules/anggota/anggota_tampil.php" class="btn btn-secondary">Lihat Daftar Anggota</a>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($hasil) > 0) {
                    while ($data = mysqli_fetch_assoc($hasil)) {
                ?>
                        <tr>
                            <td><?php echo $data['id_buku']; ?></td>
                            <td><?php echo htmlspecialchars($data['judul']); ?></td>
                            <td><?php echo htmlspecialchars($data['penulis']); ?></td>
                            <td><?php echo htmlspecialchars($data['penerbit']); ?></td>
                            <td><?php echo $data['tahun_terbit']; ?></td>
                            <td>
                                <?php if ($data['status'] == 'tersedia'): ?>
                                    <span class="status status-tersedia">Tersedia</span>
                                <?php else: ?>
                                    <span class="status status-dipinjam">Dipinjam</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="modules/buku/buku_edit.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-warning">Edit</a>
                                <a href="modules/buku/buku_hapus.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Data buku masih kosong.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>