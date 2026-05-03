============================================================
PETUNJUK PENGERJAAN TUGAS ANALISIS AUDIO
============================================================

NAMA: Muhamad Rafi H.S
NIM: 241110020
MATA KULIAH: [Nama Mata Kuliah]

============================================================
LANGKAH-LANGKAH PENGERJAAN:
============================================================

1. BUKA MATLAB
   - Launch aplikasi MATLAB di komputer Anda

2. NAVIGASI KE FOLDER TUGAS
   - Di MATLAB Command Window, ketik:
     cd '/Users/bsi-2-2200019/TUGASKULIAH/AudioAnalysis_Muhamad_Rafi_H.S_241110020'
   - Atau gunakan menu Current Folder di MATLAB

3. JALANKAN SCRIPT ANALISIS
   - Di Command Window, ketik:
     audio_analysis
   - Tekan Enter

4. OUTPUT YANG DIHASILKAN
   Script akan menghasilkan:

   a) Command Window Output:
      - Dimensi audio (jumlah sampel dan kanal)
      - Durasi audio
      - Array H (10 baris pertama dan terakhir)
      - Statistik (max, min, mean) untuk setiap kondisi

   b) Figure 1 - "Analisis ROI Audio":
      - 3 subplot menampilkan grafik masing-masing kondisi
      - Subplot 1: Kondisi 1 (Awal)
      - Subplot 2: Kondisi 2 (Tengah)
      - Subplot 3: Kondisi 3 (Akhir)

   c) Figure 2 - "Perbandingan ROI":
      - Grafik perbandingan ketiga kondisi dalam satu plot
      - Warna berbeda untuk setiap kondisi
      - Legend untuk identifikasi

5. SCREENSHOT YANG DIBUTUHKAN
   Ambil screenshot dari:

   a) Command Window - Array H dan Statistik
      - Pilih output yang relevan
      - Screenshot menggunakan PrintScreen atau snipping tool

   b) Figure 1 - Tiga Subplot
      - Klik pada Figure 1 untuk memastikan aktif
      - Screenshot seluruh figure

   c) Figure 2 - Grafik Perbandingan
      - Klik pada Figure 2
      - Screenshot seluruh figure

6. MASUKKAN KE LEMBAR JAWABAN PDF
   - Paste screenshot ke template PDF jawaban
   - Tambahkan keterangan jika diperlukan
   - Isi bagian kesimpulan berdasarkan observasi

7. ISI LAPORAN
   - Buka file laporan_analisis_audio.m di MATLAB editor
   - Isi bagian OBSERVASI dan KESIMPULAN
   - Gunakan data statistik dan observasi visual dari grafik

============================================================
TIPS:
============================================================

- Untuk menyimpan figure sebagai file image:
  * File > Export Setup > Export (pilih format PNG atau JPG)

- Untuk menampilkan array H lengkap:
  * Ketik: disp(H) di command window

- Jika error terkait file tidak ditemukan:
  * Pastikan sound.mp3 ada di folder yang sama
  * Gunakan perintah: ls untuk mengecek file

- Untuk analisis lebih lanjut, modifikasi ROI range:
  * Ubah angka pada baris y2_cond1, y2_cond2, y2_cond3

============================================================
STRUKTUR FILE:
============================================================

Folder: AudioAnalysis_Muhamad_Rafi_H.S_241110020/
│
├── audio_analysis.m          <- Script utama (jalankan ini)
├── laporan_analisis_audio.m  <- Template laporan
├── README.txt                <- File ini (petunjuk)
└── sound.mp3                 <- File audio yang dianalisis

============================================================
KONTAK:
============================================================

Jika ada masalah atau pertanyaan, hubungi dosen pengampu.

Selamat mengerjakan!
============================================================
