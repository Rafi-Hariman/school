<?php

// Konfigurasi koneksi database
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "bimbel";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAB 5 - PHP Database</title>
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
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="mb-4">Pilih Operasi Database</h5>

                        <!-- Status koneksi kecil -->
                        <?php
                        if (!$koneksi) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Koneksi gagal</div>';
                        } else {
                            echo '<div class="alert alert-success alert-dismissible fade show py-2" role="alert"><small><i class="bi bi-check-circle me-1"></i>Connected: bimbel</small></div>';
                        }
                        ?>

                        <div class="mt-4">
                            <label class="form-label">Pilih Tabel:</label>
                            <select class="form-select form-select-lg mb-3" onchange="if(this.value) window.location.href=this.value">
                                <option value="">-- Pilih --</option>
                                <option value="select.php">Data Siswa</option>
                                <option value="select_akademik.php">Data Akademik (Tugas 5.4)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
