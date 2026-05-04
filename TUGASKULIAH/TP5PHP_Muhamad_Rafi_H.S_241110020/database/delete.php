<?php

include 'koneksi.php';

$query_delete = "DELETE FROM siswa WHERE id_siswa=26";

$success = mysqli_query($koneksi, $query_delete);
$affected_rows = mysqli_affected_rows($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Siswa - BAB 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --navy: #2F2FE4;
        }
        body { background-color: #ffffff; }
        .navbar-custom { background-color: var(--navy); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="koneksi.php">
                <i class="bi bi-database-fill me-2"></i>BAB 5 - PHP Database
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="select.php">Data Siswa</a>
                <a class="nav-link" href="select_akademik.php">Data Akademik</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h4 class="mb-3"><i class="bi bi-trash me-2"></i>Delete Data Siswa</h4>

        <?php if ($success && $affected_rows > 0): ?>
            <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Data berhasil dihapus! (<?php echo $affected_rows; ?> baris)</div>
        <?php elseif ($success && $affected_rows == 0): ?>
            <div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>Tidak ada data yang dihapus (ID 26 tidak ditemukan)</div>
        <?php else: ?>
            <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>Error: <?php echo mysqli_error($koneksi); ?></div>
        <?php endif; ?>

        <h5 class="mt-4">Data Setelah Delete:</h5>
        <?php
        $query_select = "SELECT * FROM siswa";
        $result_select = mysqli_query($koneksi, $query_select);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-danger">
                    <tr>
                        <th>ID Siswa</th>
                        <th>Nama Siswa</th>
                        <th>No. HP</th>
                        <th>Riwayat Pendidikan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_select)): ?>
                    <tr>
                        <td><?php echo $row["id_siswa"]; ?></td>
                        <td><?php echo $row["nama_siswa"]; ?></td>
                        <td><?php echo $row["no_hp"]; ?></td>
                        <td><?php echo $row["riwayat_pendidikan"]; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a href="select.php" class="btn btn-primary mt-3"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($koneksi); ?>
