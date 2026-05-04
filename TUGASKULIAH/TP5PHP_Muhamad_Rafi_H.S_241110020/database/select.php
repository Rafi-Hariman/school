<?php

include 'koneksi.php';

$query_select = "SELECT * FROM siswa";
$result_select = mysqli_query($koneksi, $query_select);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - BAB 5</title>
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
                <a class="nav-link active" href="select.php">Data Siswa</a>
                <a class="nav-link" href="select_akademik.php">Data Akademik</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h4 class="mb-3"><i class="bi bi-people me-2"></i>Data Siswa <span class="badge bg-primary"><?php echo mysqli_num_rows($result_select); ?></span></h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID Siswa</th>
                        <th>Nama Siswa</th>
                        <th>No. HP</th>
                        <th>Riwayat Pendidikan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result_select) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr>
                            <td><?php echo $row["id_siswa"]; ?></td>
                            <td><?php echo $row["nama_siswa"]; ?></td>
                            <td><?php echo $row["no_hp"]; ?></td>
                            <td><?php echo $row["riwayat_pendidikan"]; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <a href="insert.php" class="btn btn-success me-2"><i class="bi bi-plus-circle me-1"></i>Insert</a>
            <a href="update.php" class="btn btn-warning me-2"><i class="bi bi-pencil me-1"></i>Update</a>
            <a href="delete.php" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($koneksi); ?>
