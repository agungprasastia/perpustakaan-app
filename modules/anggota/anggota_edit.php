<?php
include '../../config/koneksi.php';

if (!isset($_GET['id'])) {
    header('Location: anggota_tampil.php');
    exit;
}

$id_anggota = (int)$_GET['id'];

$sql = "SELECT * FROM anggota WHERE id_anggota = $id_anggota";
$hasil = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($hasil);

if (!$data) {
    echo "Data anggota tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <div class="container">
        <h2>Form Edit Anggota</h2>
        
        <form action="anggota_edit_proses.php" method="POST">
            
            <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">
            
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota:</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?php echo htmlspecialchars($data['nama_anggota']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>">
            </div>
            
            <div class="form-group">
                <label for="telepon">Nomor Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="anggota_tampil.php" class="btn btn-secondary">Batal</a>
            
        </form>
    </div>

</body>
</html>