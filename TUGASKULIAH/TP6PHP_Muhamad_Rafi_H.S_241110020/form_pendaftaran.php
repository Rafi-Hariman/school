<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulir Pendaftaran Sekolah - TP6 PHP">
    <meta name="author" content="Muhamad Rafi H.S">
    <title>Formulir Pendaftaran Sekolah</title>

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
                    <div class="card shadow-lg form-card">
                        <div class="card-header card-header-custom">
                            <h4 class="mb-0 text-center">
                                <i class="bi bi-file-earmark-text-fill me-2"></i>Formulir Pendaftaran
                            </h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-muted mb-4">Silakan lengkapi data diri Anda untuk mendaftar</p>

                            <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data" id="formPendaftaran">
                                <div class="mb-4">
                                    <label for="nama" class="form-label fw-semibold">
                                        <i class="bi bi-person-fill me-1"></i>Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="nama" name="nama" required
                                        placeholder="Masukkan nama lengkap Anda">
                                </div>

                                <div class="mb-4">
                                    <label for="usia" class="form-label fw-semibold">
                                        <i class="bi bi-calendar-fill me-1"></i>Usia <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="usia" name="usia" required min="6" max="100"
                                        placeholder="Masukkan usia Anda">
                                    <div class="form-text">Usia harus antara 6-100 tahun</div>
                                </div>

                                <div class="mb-4">
                                    <label for="no_hp" class="form-label fw-semibold">
                                        <i class="bi bi-telephone-fill me-1"></i>Nomor HP <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" id="no_hp" name="no_hp" required
                                        placeholder="Contoh: 081234567890">
                                    <div class="form-text">Masukkan nomor HP/WA yang aktif</div>
                                </div>

                                <div class="mb-4">
                                    <label for="kartu_keluarga" class="form-label fw-semibold">
                                        <i class="bi bi-file-earmark-image-fill me-1"></i>Upload Kartu Keluarga <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga" required
                                        accept=".jpg,.jpeg,.png,.pdf">
                                    <div class="form-text">Format: JPG, PNG, atau PDF. Maksimal 2MB</div>
                                </div>

                                <div id="previewContainer" class="mb-4 d-none">
                                    <label class="form-label fw-semibold">Preview:</label>
                                    <div class="preview-box">
                                        <img id="imagePreview" src="" alt="Preview Kartu Keluarga" class="img-fluid rounded">
                                    </div>
                                </div>

                                <div class="d-grid gap-2 mt-5">
                                    <button type="submit" class="btn btn-submit btn-lg">
                                        <i class="bi bi-send-fill me-2"></i>Kirim Pendaftaran
                                    </button>
                                    <button type="reset" class="btn btn-reset">
                                        <i class="bi bi-arrow-counterclockwise me-2"></i>Reset Form
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow mt-4 info-card">
                        <div class="card-body">
                            <h6 class="fw-semibold mb-3"><i class="bi bi-info-circle-fill me-2"></i>Informasi Pendaftaran</h6>
                            <ul class="list-unstyled mb-0 small">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Semua kolom bertanda bintang (*) wajib diisi</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Pastikan data yang diisi sudah benar</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>File kartu keluarga harus jelas dan terbaca</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Untuk informasi lebih lanjut, hubungi admin sekolah</li>
                            </ul>
                        </div>
                    </div>
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

    <script>
        const fileInput = document.getElementById('kartu_keluarga');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const fileType = file.type;
                    if (fileType.startsWith('image/')) {
                        imagePreview.src = e.target.result;
                        previewContainer.classList.remove('d-none');
                    } else {
                        previewContainer.classList.add('d-none');
                    }
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('d-none');
            }
        });

        // Form validation
        document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
            const usia = document.getElementById('usia').value;
            if (usia < 6 || usia > 100) {
                e.preventDefault();
                alert('Usia harus antara 6-100 tahun!');
                return false;
            }
        });
    </script>
</body>

</html>
