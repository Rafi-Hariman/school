<?php

include 'koneksi.php';

$query_select = "SELECT * FROM akademik";
$result_select = mysqli_query($koneksi, $query_select);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Akademik - Tugas 5.4</title>
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
                <a class="nav-link active" href="select_akademik.php">Data Akademik</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h4 class="mb-3"><i class="bi bi-book me-2"></i>Data Mata Pelajaran <small class="text-muted">(Tugas 5.4)</small> <span class="badge bg-primary"><?php echo mysqli_num_rows($result_select); ?></span></h4>

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
                    <?php if (mysqli_num_rows($result_select) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr>
                            <td><?php echo $row["id_mapel"]; ?></td>
                            <td><?php echo $row["nama_mapel"]; ?></td>
                            <td><?php echo $row["pengajar"]; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <a href="insert_akademik.php" class="btn btn-success me-2"><i class="bi bi-plus-circle me-1"></i>Insert</a>
            <a href="update_akademik.php" class="btn btn-warning me-2"><i class="bi bi-pencil me-1"></i>Update</a>
            <a href="delete_akademik.php" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($koneksi); ?>
