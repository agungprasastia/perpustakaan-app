<?php
include '../../config/koneksi.php';

$sql_anggota = "SELECT * FROM anggota ORDER BY nama_anggota ASC";
$hasil_anggota = mysqli_query($koneksi, $sql_anggota);

$sql_buku = "SELECT * FROM buku WHERE status = 'tersedia' ORDER BY judul ASC";
$hasil_buku = mysqli_query($koneksi, $sql_buku);

$tanggal_pinjam = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Peminjaman</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Form Peminjaman Buku</h2>
        <form action="peminjaman_tambah_proses.php" method="POST"> 
            <div class="form-group">
                <label for="id_anggota">Pilih Anggota:</label>
                <select name="id_anggota" id="id_anggota" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    <?php
                    while ($anggota = mysqli_fetch_assoc($hasil_anggota)) {
                        echo "<option value='" . $anggota['id_anggota'] . "'>" . htmlspecialchars($anggota['nama_anggota']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_buku">Pilih Buku (Hanya yang tersedia):</label>
                <select name="id_buku" id="id_buku" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php
                    while ($buku = mysqli_fetch_assoc($hasil_buku)) {
                        echo "<option value='" . $buku['id_buku'] . "'>" . htmlspecialchars($buku['judul']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo $tanggal_pinjam; ?>" readonly>
                <small>Tanggal di-set otomatis hari ini.</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="peminjaman_tampil.php" class="btn btn-secondary">Batal</a>
            
        </form>
    </div>

</body>
</html>