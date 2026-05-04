<?php

include 'koneksi.php';

$query_insert = "INSERT INTO akademik (id_mapel, nama_mapel, pengajar)
                 VALUES (9, 'Seni Budaya', 'Drs. Made Artini, M.Pd')";

$success = mysqli_query($koneksi, $query_insert);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Akademik - Tugas 5.4</title>
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
        <h4 class="mb-3"><i class="bi bi-plus-circle me-2"></i>Insert Mata Pelajaran <small class="text-muted">(Tugas 5.4)</small></h4>

        <?php if ($success): ?>
            <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Data berhasil ditambahkan!</div>
        <?php else: ?>
            <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>Error: <?php echo mysqli_error($koneksi); ?></div>
        <?php endif; ?>

        <h5 class="mt-4">Data Setelah Insert:</h5>
        <?php
        $query_select = "SELECT * FROM akademik";
        $result_select = mysqli_query($koneksi, $query_select);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID Mapel</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Pengajar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_select)): ?>
                    <tr>
                        <td><?php echo $row["id_mapel"]; ?></td>
                        <td><?php echo $row["nama_mapel"]; ?></td>
                        <td><?php echo $row["pengajar"]; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a href="select_akademik.php" class="btn btn-primary mt-3"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($koneksi); ?>
