<!-- Cara menjalankan
php -S localhost:8000 -->

<?php
    $success = false;
    $errors  = [];
    $data    = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama           = htmlspecialchars(trim($_POST['nama'] ?? ''));
    $nisn           = htmlspecialchars(trim($_POST['nisn'] ?? ''));
    $tempat_lahir   = htmlspecialchars(trim($_POST['tempat_lahir'] ?? ''));
    $tanggal_lahir  = htmlspecialchars(trim($_POST['tanggal_lahir'] ?? ''));
    $jenis_kelamin  = htmlspecialchars(trim($_POST['jenis_kelamin'] ?? ''));
    $agama          = htmlspecialchars(trim($_POST['agama'] ?? ''));
    $alamat         = htmlspecialchars(trim($_POST['alamat'] ?? ''));
    $telepon        = htmlspecialchars(trim($_POST['telepon'] ?? ''));
    $email          = htmlspecialchars(trim($_POST['email'] ?? ''));
    $nama_ortu      = htmlspecialchars(trim($_POST['nama_ortu'] ?? ''));
    $pekerjaan_ortu = htmlspecialchars(trim($_POST['pekerjaan_ortu'] ?? ''));
    $asal_sekolah   = htmlspecialchars(trim($_POST['asal_sekolah'] ?? ''));
    $jurusan        = htmlspecialchars(trim($_POST['jurusan'] ?? ''));
    $mapel          = $_POST['mapel'] ?? [];
    $pernyataan     = isset($_POST['pernyataan']) ? true : false;

    if (empty($nama)) {
        $errors[] = "Nama lengkap wajib diisi.";
    }

    if (empty($nisn)) {
        $errors[] = "NISN wajib diisi.";
    }

    if (empty($tempat_lahir)) {
        $errors[] = "Tempat lahir wajib diisi.";
    }

    if (empty($tanggal_lahir)) {
        $errors[] = "Tanggal lahir wajib diisi.";
    }

    if (empty($jenis_kelamin)) {
        $errors[] = "Jenis kelamin wajib dipilih.";
    }

    if (empty($agama)) {
        $errors[] = "Agama wajib dipilih.";
    }

    if (empty($alamat)) {
        $errors[] = "Alamat wajib diisi.";
    }

    if (empty($telepon)) {
        $errors[] = "Nomor telepon wajib diisi.";
    }

    if (! empty($email) && ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($nama_ortu)) {
        $errors[] = "Nama orang tua wajib diisi.";
    }

    if (empty($asal_sekolah)) {
        $errors[] = "Asal sekolah wajib diisi.";
    }

    if (empty($jurusan)) {
        $errors[] = "Pilihan jurusan wajib dipilih.";
    }

    if (! $pernyataan) {
        $errors[] = "Pernyataan kesanggupan wajib dicentang.";
    }

    if (empty($errors)) {
        $success = true;
        $data    = compact(
            'nama', 'nisn', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
            'agama', 'alamat', 'telepon', 'email', 'nama_ortu', 'pekerjaan_ortu',
            'asal_sekolah', 'jurusan', 'mapel'
        );
    }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Registrasi Siswa Baru</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #e8e8e8; margin: 0; padding: 30px 15px;">

    <div style="max-width: 780px; margin: 0 auto; background-color: #ffffff; border: 2px solid #222; padding: 35px 40px;">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td align="center">
                    <h1 style="font-size: 20px; margin: 0; text-transform: uppercase; letter-spacing: 1px;">Lembar Registrasi Siswa Baru</h1>
                    <h2 style="font-size: 16px; margin: 6px 0 4px 0;">SMA Negeri 1 Hormuz</h2>
                    <p style="margin: 2px 0; font-size: 13px;">Jl. Pendidikan No. 10, Kota Hormuz, Telp. (021) 123-456</p>
                    <p style="margin: 2px 0; font-size: 13px;">Tahun Ajaran 2026 / 2027</p>
                </td>
            </tr>
        </table>

        <hr style="border: 1.5px solid #222; margin: 18px 0;">

        <?php if ($success): ?>
        <div style="background-color: #d4edda; border: 1px solid #28a745; color: #155724; padding: 14px 18px; margin-bottom: 22px; text-align: center; font-size: 14px;">
            <strong>Data registrasi berhasil dikirim.</strong> Silakan tunggu konfirmasi lebih lanjut dari pihak sekolah.
        </div>

        <table width="100%" border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; font-size: 13px; margin-bottom: 25px;">
            <tr style="background-color: #f0f0f0;">
                <td colspan="2" align="center"><strong>Ringkasan Data Pendaftar</strong></td>
            </tr>
            <tr><td width="40%"><strong>Nama Lengkap</strong></td><td><?php echo $data['nama']; ?></td></tr>
            <tr><td><strong>NISN</strong></td><td><?php echo $data['nisn']; ?></td></tr>
            <tr><td><strong>Tempat / Tanggal Lahir</strong></td><td><?php echo $data['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($data['tanggal_lahir'])); ?></td></tr>
            <tr><td><strong>Jenis Kelamin</strong></td><td><?php echo $data['jenis_kelamin']; ?></td></tr>
            <tr><td><strong>Agama</strong></td><td><?php echo $data['agama']; ?></td></tr>
            <tr><td><strong>Alamat</strong></td><td><?php echo nl2br($data['alamat']); ?></td></tr>
            <tr><td><strong>Telepon</strong></td><td><?php echo $data['telepon']; ?></td></tr>
            <tr><td><strong>Email</strong></td><td><?php echo $data['email'] ?: '-'; ?></td></tr>
            <tr><td><strong>Nama Orang Tua</strong></td><td><?php echo $data['nama_ortu']; ?></td></tr>
            <tr><td><strong>Pekerjaan Orang Tua</strong></td><td><?php echo $data['pekerjaan_ortu'] ?: '-'; ?></td></tr>
            <tr><td><strong>Asal Sekolah</strong></td><td><?php echo $data['asal_sekolah']; ?></td></tr>
            <tr><td><strong>Jurusan Dipilih</strong></td><td><?php echo $data['jurusan']; ?></td></tr>
            <tr>
                <td><strong>Mata Pelajaran Favorit</strong></td>
                <td><?php echo ! empty($data['mapel']) ? implode(', ', array_map('htmlspecialchars', $data['mapel'])) : '-'; ?></td>
            </tr>
        </table>
        <?php endif; ?>

        <?php if (! empty($errors)): ?>
        <div style="background-color: #f8d7da; border: 1px solid #dc3545; color: #721c24; padding: 14px 18px; margin-bottom: 22px; font-size: 13px;">
            <strong>Terdapat kesalahan pada pengisian formulir:</strong>
            <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                <?php foreach ($errors as $err): ?>
                    <li><?php echo $err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if (! $success): ?>
        <form method="POST" action="" enctype="multipart/form-data">

            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background-color: #333; color: #fff; padding: 8px 12px; font-size: 14px; font-weight: bold;">
                        A. Data Pribadi Calon Siswa
                    </td>
                </tr>
            </table>
            <br>

            <table width="100%" cellpadding="6" cellspacing="0" style="font-size: 13px;">

                <tr>
                    <td width="35%"><label for="nama">Nama Lengkap <span style="color:red;">*</span></label></td>
                    <td>: <input type="text" id="nama" name="nama" placeholder="Sesuai akta kelahiran"
                            value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label for="nisn">NISN <span style="color:red;">*</span></label></td>
                    <td>: <input type="text" id="nisn" name="nisn" placeholder="10 digit NISN"
                            maxlength="10"
                            value="<?php echo htmlspecialchars($_POST['nisn'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label for="tempat_lahir">Tempat Lahir <span style="color:red;">*</span></label></td>
                    <td>: <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Kota tempat lahir"
                            value="<?php echo htmlspecialchars($_POST['tempat_lahir'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label for="tanggal_lahir">Tanggal Lahir <span style="color:red;">*</span></label></td>
                    <td>: <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="<?php echo htmlspecialchars($_POST['tanggal_lahir'] ?? ''); ?>"
                            style="padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label>Jenis Kelamin <span style="color:red;">*</span></label></td>
                    <td>:
                        &nbsp;
                        <label>
                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                <?php echo(($_POST['jenis_kelamin'] ?? '') === 'Laki-laki') ? 'checked' : ''; ?>>
                            Laki-laki
                        </label>
                        &nbsp;&nbsp;
                        <label>
                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                <?php echo(($_POST['jenis_kelamin'] ?? '') === 'Perempuan') ? 'checked' : ''; ?>>
                            Perempuan
                        </label>
                    </td>
                </tr>

                <tr>
                    <td><label for="agama">Agama <span style="color:red;">*</span></label></td>
                    <td>:
                        <select id="agama" name="agama" style="padding: 6px 8px; border: 1px solid #888; font-size: 13px; min-width: 200px;">
                            <option value="">-- Pilih Agama --</option>
                            <?php
                                $agama_list = ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                                foreach ($agama_list as $a):
                                    $sel = (($_POST['agama'] ?? '') === $a) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $a; ?>" <?php echo $sel; ?>><?php echo $a; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 8px;"><label for="alamat">Alamat Lengkap <span style="color:red;">*</span></label></td>
                    <td>: <textarea id="alamat" name="alamat" rows="3" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px; resize: vertical;"><?php echo htmlspecialchars($_POST['alamat'] ?? ''); ?></textarea></td>
                </tr>

                <tr>
                    <td><label for="telepon">Nomor Telepon / WA <span style="color:red;">*</span></label></td>
                    <td>: <input type="tel" id="telepon" name="telepon" placeholder="08xxxxxxxxxx"
                            value="<?php echo htmlspecialchars($_POST['telepon'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label for="email">Alamat Email</label></td>
                    <td>: <input type="email" id="email" name="email" placeholder="email@contoh.com"
                            value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

            </table>

            <br>

            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background-color: #333; color: #fff; padding: 8px 12px; font-size: 14px; font-weight: bold;">
                        B. Data Orang Tua / Wali
                    </td>
                </tr>
            </table>
            <br>

            <table width="100%" cellpadding="6" cellspacing="0" style="font-size: 13px;">

                <tr>
                    <td width="35%"><label for="nama_ortu">Nama Orang Tua / Wali <span style="color:red;">*</span></label></td>
                    <td>: <input type="text" id="nama_ortu" name="nama_ortu" placeholder="Nama lengkap orang tua / wali"
                            value="<?php echo htmlspecialchars($_POST['nama_ortu'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label for="pekerjaan_ortu">Pekerjaan Orang Tua / Wali</label></td>
                    <td>:
                        <select id="pekerjaan_ortu" name="pekerjaan_ortu" style="padding: 6px 8px; border: 1px solid #888; font-size: 13px; min-width: 220px;">
                            <option value="">-- Pilih Pekerjaan --</option>
                            <?php
                                $pekerjaan_list = ['PNS', 'TNI/POLRI', 'Pegawai Swasta', 'Wiraswasta', 'Petani/Nelayan', 'Buruh', 'Lainnya'];
                                foreach ($pekerjaan_list as $p):
                                    $sel = (($_POST['pekerjaan_ortu'] ?? '') === $p) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $p; ?>" <?php echo $sel; ?>><?php echo $p; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

            </table>

            <br>

            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background-color: #333; color: #fff; padding: 8px 12px; font-size: 14px; font-weight: bold;">
                        C. Data Akademik
                    </td>
                </tr>
            </table>
            <br>

            <table width="100%" cellpadding="6" cellspacing="0" style="font-size: 13px;">

                <tr>
                    <td width="35%"><label for="asal_sekolah">Asal Sekolah (SMP/MTs) <span style="color:red;">*</span></label></td>
                    <td>: <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Nama sekolah asal"
                            value="<?php echo htmlspecialchars($_POST['asal_sekolah'] ?? ''); ?>"
                            style="width: 90%; padding: 6px 8px; border: 1px solid #888; font-size: 13px;"></td>
                </tr>

                <tr>
                    <td><label for="jurusan">Pilihan Jurusan <span style="color:red;">*</span></label></td>
                    <td>:
                        <select id="jurusan" name="jurusan" style="padding: 6px 8px; border: 1px solid #888; font-size: 13px; min-width: 220px;">
                            <option value="">-- Pilih Jurusan --</option>
                            <?php
                                $jurusan_list = ['MIPA (Matematika dan IPA)', 'IPS (Ilmu Pengetahuan Sosial)', 'Bahasa dan Budaya'];
                                foreach ($jurusan_list as $j):
                                    $sel = (($_POST['jurusan'] ?? '') === $j) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $j; ?>" <?php echo $sel; ?>><?php echo $j; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 8px;"><label>Mata Pelajaran Favorit</label></td>
                    <td>:
                        <?php
                            $mapel_list    = ['Matematika', 'Fisika', 'Kimia', 'Biologi', 'Bahasa Indonesia', 'Bahasa Inggris', 'Sejarah', 'Geografi', 'Ekonomi', 'Sosiologi', 'Seni Budaya', 'Penjasorkes'];
                            $checked_mapel = $_POST['mapel'] ?? [];
                            foreach ($mapel_list as $m):
                        ?>
                        &nbsp;<label style="margin-right: 10px;">
                            <input type="checkbox" name="mapel[]" value="<?php echo $m; ?>"
                                <?php echo in_array($m, $checked_mapel) ? 'checked' : ''; ?>>
                            <?php echo $m; ?>
                        </label>
                        <?php endforeach; ?>
                    </td>
                </tr>

                <tr>
                    <td><label for="foto">Foto (3x4, maks. 2 MB)</label></td>
                    <td>: <input type="file" id="foto" name="foto" accept="image/*"
                            style="font-size: 13px;"></td>
                </tr>

            </table>

            <br>

            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background-color: #333; color: #fff; padding: 8px 12px; font-size: 14px; font-weight: bold;">
                        D. Pernyataan Kesanggupan
                    </td>
                </tr>
            </table>
            <br>

            <table width="100%" cellpadding="6" cellspacing="0" style="font-size: 13px;">
                <tr>
                    <td>
                        <label>
                            <input type="checkbox" id="pernyataan" name="pernyataan" value="1"
                                onchange="var btn=document.getElementById('btnKirim'); btn.disabled=!this.checked; btn.style.opacity=this.checked?'1':'0.45'; btn.style.cursor=this.checked?'pointer':'not-allowed';"
                                <?php echo isset($_POST['pernyataan']) ? 'checked' : ''; ?>>
                            Saya menyetujui bahwa data yang saya isi dalam formulir ini adalah benar.
                            <span style="color:red;">*</span>
                        </label>
                    </td>
                </tr>
            </table>

            <br>

            <p style="font-size: 12px; color: #555;"><span style="color:red;">*</span> Kolom wajib diisi</p>

            <hr style="border: 1px solid #ccc; margin: 10px 0 20px 0;">

            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <input type="reset" value="Bersihkan Form"
                            style="padding: 10px 28px; font-size: 14px; background-color: #888; color: #fff; border: none; cursor: pointer; margin-right: 12px;">
                        <input type="submit" id="btnKirim" value="Simpan"
                            <?php echo isset($_POST['pernyataan']) ? '' : 'disabled'; ?>
                            style="padding: 10px 28px; font-size: 14px; background-color: #222; color: #fff; border: none; <?php echo isset($_POST['pernyataan']) ? 'cursor:pointer; opacity:1;' : 'cursor:not-allowed; opacity:0.45;'; ?>">
                    </td>
                </tr>
            </table>

        </form>
        <?php endif; ?>

        <br>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" style="font-size: 11px; color: #777; border-top: 1px solid #ccc; padding-top: 10px;">
                    SMA Negeri 1 Hormuz &nbsp;|&nbsp; Sistem Penerimaan Peserta Didik Baru &nbsp;|&nbsp; Tahun Ajaran 2026/2027
                </td>
            </tr>
        </table>

    </div>

</body>
</html>
