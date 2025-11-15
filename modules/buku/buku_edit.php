<?php
include '../../config/koneksi.php';

if (!isset($_GET['id'])) {
    header('Location: ../../index.php');
    exit;
}

$id_buku = (int)$_GET['id'];
$sql = "SELECT * FROM buku WHERE id_buku = $id_buku";
$hasil = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_assoc($hasil);
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <div class="container">
        <h2>Form Edit Buku</h2>
        
        <form action="buku_edit_proses.php" method="POST">
            
            <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
            
            <div class="form-group">
                <label for="judul">Judul Buku:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo htmlspecialchars($data['penulis']); ?>">
            </div>
            
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo htmlspecialchars($data['penerbit']); ?>">
            </div>
            
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" min="1900" max="2099" step="1">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="../../index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>