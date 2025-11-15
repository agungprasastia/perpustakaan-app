<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Form Tambah Buku Baru</h2>
        <form action="buku_tambah_proses.php" method="POST">
            
            <div class="form-group">
                <label for="judul">Judul Buku:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
            
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>
            
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="1900" max="2099" step="1">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Buku</button>
            <a href="../../index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>