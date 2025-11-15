<?php
include '../../config/koneksi.php';

$sql = "SELECT * FROM anggota ORDER BY nama_anggota ASC";
$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan - Daftar Anggota</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    
</head>
<body>
    
    <div class="container">
        <h2>🧑‍🤝‍🧑 Daftar Anggota Perpustakaan</h2>
        
        <a href="../../index.php" class="btn btn-secondary mb-3">Kembali ke Daftar Buku</a>
        
        <a href="anggota_tambah.php" class="btn btn-primary mb-3">Tambah Anggota Baru</a>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($hasil) > 0) {
                    while ($data = mysqli_fetch_assoc($hasil)) {
                ?>
                        <tr>
                            <td><?php echo $data['id_anggota']; ?></td>
                            <td><?php echo htmlspecialchars($data['nama_anggota']); ?></td>
                            <td><?php echo htmlspecialchars($data['email']); ?></td>
                            <td><?php echo htmlspecialchars($data['telepon']); ?></td>
                            <td>
                                <a href="anggota_edit.php?id=<?php echo $data['id_anggota']; ?>" class="btn btn-warning">Edit</a>
                                <a href="anggota_hapus.php?id=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data anggota ini?');">Hapus</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {

                ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Data anggota masih kosong.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>