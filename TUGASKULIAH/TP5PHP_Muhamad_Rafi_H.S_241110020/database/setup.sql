DROP DATABASE IF EXISTS bimbel;

CREATE DATABASE bimbel CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_unicode_ci;

USE bimbel;

CREATE TABLE
    siswa (
        id_siswa INT PRIMARY KEY,
        nama_siswa VARCHAR(100),
        no_hp VARCHAR(15),
        riwayat_pendidikan VARCHAR(100)
    );

CREATE TABLE
    akademik (
        id_mapel INT PRIMARY KEY,
        nama_mapel VARCHAR(50),
        pengajar VARCHAR(100)
    );

CREATE TABLE
    program_bimbel (
        id_program INT PRIMARY KEY,
        nama_program VARCHAR(50),
        jenis_program VARCHAR(50),
        lama_program VARCHAR(20)
    );

CREATE TABLE
    detail_bimbel (
        id_siswa INT,
        id_mapel INT,
        id_program INT,
        perkembangan_belajar VARCHAR(50),
        catatan_hasil VARCHAR(255),
        PRIMARY KEY (id_siswa, id_mapel, id_program),
        FOREIGN KEY (id_siswa) REFERENCES siswa (id_siswa),
        FOREIGN KEY (id_mapel) REFERENCES akademik (id_mapel),
        FOREIGN KEY (id_program) REFERENCES program_bimbel (id_program)
    );

INSERT INTO
    siswa
VALUES
    (
        1,
        'Ahmad Rizky',
        '081234567890',
        'SMAN 1 Jakarta'
    ),
    (
        2,
        'Siti Aminah',
        '081234567891',
        'SMAN 2 Bandung'
    ),
    (
        3,
        'Budi Santoso',
        '081234567892',
        'SMA Negeri 3 Surabaya'
    ),
    (
        4,
        'Dewi Lestari',
        '081234567893',
        'SMAN 1 Yogyakarta'
    ),
    (
        5,
        'Eko Prasetyo',
        '081234567894',
        'SMA Taruna Nala'
    );

INSERT INTO
    akademik
VALUES
    (1, 'Matematika', 'Citra Lestari, S.Pd'),
    (2, 'Bahasa Indonesia', 'Agus Setiawan, M.Pd'),
    (3, 'Bahasa Inggris', 'Sarah Wijaya, S.Pd'),
    (4, 'Fisika', 'Dr. Hendra Gunawan'),
    (5, 'Kimia', 'Rina Melati, M.Si'),
    (6, 'Biologi', 'Prof. Bambang Suryadi, M.Si'),
    (7, 'Sejarah', 'Drs. Ahmad Subekti'),
    (8, 'Geografi', 'Ir. Siti Rahayu, M.Pd');

INSERT INTO
    program_bimbel
VALUES
    (1, 'IPA-1', 'Kelas IPA', '1 tahun'),
    (2, 'IPS-1', 'Kelas IPS', '1 tahun'),
    (3, 'Bahasa-1', 'Kelas Bahasa', '1 tahun'),
    (4, 'Paket SMP', 'SMP-1', '6 bulan'),
    (5, 'Paket SD', 'SD-6', '3 bulan'),
    (6, 'Intensif UTBK', 'Persiapan SNBT', '3 bulan'),
    (7, 'Privat', 'One-on-One', '1 bulan');

INSERT INTO
    detail_bimbel
VALUES
    (
        1,
        1,
        1,
        'Sangat Baik',
        'Pertahankan dan tingkatkan pencapaianmu!'
    ),
    (
        1,
        2,
        1,
        'Baik',
        'Perlu lebih banyak latihan soal'
    ),
    (
        2,
        3,
        2,
        'Cukup Baik',
        'Fokus pada grammar dan vocabulary'
    ),
    (3, 4, 1, 'Baik', 'Paham konsep dasar dengan baik'),
    (
        3,
        5,
        1,
        'Sangat Baik',
        'Excellent dalam praktikum'
    ),
    (4, 6, 3, 'Baik', 'Aktif dalam diskusi'),
    (
        5,
        7,
        2,
        'Cukup Baik',
        'Perlu meningkatkan hafalan'
    );