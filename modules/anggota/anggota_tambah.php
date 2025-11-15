<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota Baru</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <div class="container">
        <h2>Form Tambah Anggota Baru</h2>
        
        <form action="anggota_tambah_proses.php" method="POST">
            
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota:</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            
            <div class="form-group">
                <label for="telepon">Nomor Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Anggota</button>
            <a href="anggota_tampil.php" class="btn btn-secondary">Batal</a>
            
        </form>
    </div>

</body>
</html>