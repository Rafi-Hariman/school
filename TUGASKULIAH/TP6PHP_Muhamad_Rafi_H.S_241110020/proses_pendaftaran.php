<?php
    $success = false;
    $errors  = [];
    $data    = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $nama  = htmlspecialchars(trim($_POST['nama'] ?? ''));
    $usia  = htmlspecialchars(trim($_POST['usia'] ?? ''));
    $no_hp = htmlspecialchars(trim($_POST['no_hp'] ?? ''));

    // Validate required fields
    if (empty($nama)) {
        $errors[] = "Nama lengkap wajib diisi.";
    } elseif (strlen($nama) < 3) {
        $errors[] = "Nama lengkap minimal 3 karakter.";
    }

    if (empty($usia)) {
        $errors[] = "Usia wajib diisi.";
    } elseif (! is_numeric($usia)) {
        $errors[] = "Usia harus berupa angka.";
    } elseif ($usia < 6 || $usia > 100) {
        $errors[] = "Usia harus antara 6-100 tahun.";
    }

    if (empty($no_hp)) {
        $errors[] = "Nomor HP wajib diisi.";
    } elseif (! preg_match('/^[0-9]{10,15}$/', $no_hp)) {
        $errors[] = "Nomor HP tidak valid. Gunakan 10-15 digit angka.";
    }

    // File upload validation
    $file_uploaded = false;
    $file_name     = '';
    $file_path     = '';

    if (isset($_FILES['kartu_keluarga']) && $_FILES['kartu_keluarga']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['kartu_keluarga'];

        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Terjadi kesalahan saat mengupload file. Error code: " . $file['error'];
        } else {
                                         // Validate file size (max 2MB)
            $max_size = 2 * 1024 * 1024; // 2MB in bytes
            if ($file['size'] > $max_size) {
                $errors[] = "Ukuran file terlalu besar. Maksimal 2MB.";
            }

            // Validate file type
            $allowed_types      = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf'];
            $file_extension     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (! in_array($file['type'], $allowed_types) || ! in_array($file_extension, $allowed_extensions)) {
                $errors[] = "Format file tidak valid. Hanya JPG, PNG, atau PDF yang diperbolehkan.";
            }

            // If no errors, proceed with upload
            if (empty($errors)) {
                // Create uploads directory if it doesn't exist
                $upload_dir = __DIR__ . '/uploads/';
                if (! is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                // Generate unique filename
                $file_name = 'kk_' . time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $nama) . '.' . $file_extension;
                $file_path = $upload_dir . $file_name;

                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $file_path)) {
                    $file_uploaded = true;
                } else {
                    $errors[] = "Gagal menyimpan file. Silakan coba lagi.";
                }
            }
        }
    } else {
        $errors[] = "Kartu Keluarga wajib diupload.";
    }

    // If no errors, success!
    if (empty($errors)) {
        $success = true;
        $data    = [
            'nama'      => $nama,
            'usia'      => $usia,
            'no_hp'     => $no_hp,
            'file_name' => $file_name,
        ];
    }
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hasil Pendaftaran Sekolah - TP6 PHP">
    <meta name="author" content="Muhamad Rafi H.S">
    <title>Hasil Pendaftaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="form_pendaftaran.php">
                <i class="bi bi-mortarboard-fill me-2"></i>Pendaftaran Sekolah
            </a>
        </div>
    </nav>

    <section class="form-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <?php if ($success): ?>
                    <div class="card shadow-lg form-card">
                        <div class="card-header card-header-custom">
                            <h4 class="mb-0 text-center">
                                <i class="bi bi-check-circle-fill me-2"></i>Pendaftaran Berhasil!
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <strong>Selamat!</strong> Data pendaftaran Anda telah berhasil dikirim.
                            </div>

                            <h5 class="fw-semibold mb-3">Ringkasan Data Pendaftar:</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="40%"><i class="bi bi-person-fill me-2"></i>Nama Lengkap</th>
                                            <td><?php echo $data['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="bi bi-calendar-fill me-2"></i>Usia</th>
                                            <td><?php echo $data['usia']; ?> tahun</td>
                                        </tr>
                                        <tr>
                                            <th><i class="bi bi-telephone-fill me-2"></i>Nomor HP</th>
                                            <td><?php echo $data['no_hp']; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="bi bi-file-earmark-image-fill me-2"></i>Kartu Keluarga</th>
                                            <td>
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle-fill me-1"></i>Terupload
                                                </span>
                                                <br>
                                                <small class="text-muted"><?php echo htmlspecialchars($data['file_name']); ?></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="alert alert-info mt-4" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                <strong>Informasi:</strong> Simpan bukti pendaftaran ini. Admin kami akan menghubungi Anda melalui nomor HP yang terdaftar.
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <a href="form_pendaftaran.php" class="btn btn-submit btn-lg">
                                    <i class="bi bi-plus-circle-fill me-2"></i>Daftar Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="card shadow-lg form-card">
                        <div class="card-header bg-danger text-white">
                            <h4 class="mb-0 text-center">
                                <i class="bi bi-x-circle-fill me-2"></i>Pendaftaran Gagal
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <strong>Terjadi Kesalahan:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <a href="javascript:history.back()" class="btn btn-reset btn-lg">
                                    <i class="bi bi-arrow-left-circle-fill me-2"></i>Kembali ke Form
                                </a>
                                <a href="form_pendaftaran.php" class="btn btn-outline-secondary">
                                    <i class="bi bi-house-fill me-2"></i>Ke Halaman Utama
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-custom py-4 mt-auto">
        <div class="container">
            <hr class="footer-hr">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0 small"><strong>Muhamad Rafi H.S</strong> | NIM: 241110020</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 small">TP6 PHP - BAB 4 Pemrograman Web</p>
                </div>
            </div>
            <div class="text-center mt-3">
                <p class="mb-0 small text-muted">2026 Formulir Pendaftaran Sekolah</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
