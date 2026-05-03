% Audio Signal Analysis - ROI Comparison
% Based on slide example, adapted for sound.mp3
% Name: Muhamad Rafi H.S
% NIM: 241110020

clear all; % Mengosongkan memory
clc;      % Membersihkan layar

% Membaca file audio (MATLAB mendukung mp3 dengan audioread)
y = audioread('sound.mp3');

% Memeriksa apakah stereo atau mono
[rows, cols] = size(y);
fprintf('Dimensi audio: %d sampel, %d kanal\n', rows, cols);
fprintf('Durasi audio: %.2f detik\n', rows/44100);

% Membuat array kosong H untuk menyimpan hasil
H = [];

% Mengambil kanal audio (jika stereo, ambil kanal kanan seperti contoh)
if cols > 1
    y1 = y(:,2);  % Mengambil kanal kedua (kanan)
    fprintf('Audio stereo - menggunakan kanal kanan\n');
else
    y1 = y;       % Audio mono
    fprintf('Audio mono\n');
end

% KONDISI 1: ROI dari bagian awal audio
y2_cond1 = y1(1000:30000);  % Rentang data grafik
y3_cond1 = y2_cond1(5001:5100);  % ROI 100 sampel

% KONDISI 2: ROI dari bagian tengah audio
y2_cond2 = y1(50000:80000);
y3_cond2 = y2_cond2(5001:5100);

% KONDISI 3: ROI dari bagian akhir audio
y2_cond3 = y1(100000:130000);
y3_cond3 = y2_cond3(5001:5100);

% Membuat indeks array
i = 1:100;
i1 = i';  % Transpose indeks i

% Memasukkan indeks i dan y3 ke dalam array H
H = [i1 y3_cond1 y3_cond2 y3_cond3];

% Menampilkan array output di command window
disp('Array H (Indeks | Kondisi 1 | Kondisi 2 | Kondisi 3):');
disp(H(1:10,:));  % Tampilkan 10 baris pertama
fprintf('...\n');
disp(H(91:100,:));  % Tampilkan 10 baris terakhir

% Statistik untuk setiap kondisi
fprintf('\n=== STATISTIK ===\n');
fprintf('Kondisi 1 - Amplitudo max: %.6f, min: %.6f, mean: %.6f\n', max(y3_cond1), min(y3_cond1), mean(y3_cond1));
fprintf('Kondisi 2 - Amplitudo max: %.6f, min: %.6f, mean: %.6f\n', max(y3_cond2), min(y3_cond2), mean(y3_cond2));
fprintf('Kondisi 3 - Amplitudo max: %.6f, min: %.6f, mean: %.6f\n', max(y3_cond3), min(y3_cond3), mean(y3_cond3));

% Membuat figure dengan subplot untuk perbandingan
figure('Name', 'Analisis ROI Audio', 'Color', 'white', 'Position', [100, 100, 800, 600]);

% Subplot 1: Kondisi 1
subplot(3,1,1);
plot(y3_cond1, 'b-', 'LineWidth', 1);
title('Kondisi 1: ROI Bagian Awal (sampel 5001-5100)', 'FontSize', 12);
ylabel('Amplitudo');
grid on;
axis tight;

% Subplot 2: Kondisi 2
subplot(3,1,2);
plot(y3_cond2, 'r-', 'LineWidth', 1);
title('Kondisi 2: ROI Bagian Tengah (sampel 5001-5100)', 'FontSize', 12);
ylabel('Amplitudo');
grid on;
axis tight;

% Subplot 3: Kondisi 3
subplot(3,1,3);
plot(y3_cond3, 'g-', 'LineWidth', 1);
title('Kondisi 3: ROI Bagian Akhir (sampel 5001-5100)', 'FontSize', 12);
ylabel('Amplitudo');
xlabel('Sampel');
grid on;
axis tight;

% Membuat figure perbandingan
figure('Name', 'Perbandingan ROI', 'Color', 'white', 'Position', [150, 150, 900, 500]);
hold on;
plot(y3_cond1, 'b-', 'LineWidth', 1.5, 'DisplayName', 'Kondisi 1 (Awal)');
plot(y3_cond2, 'r-', 'LineWidth', 1.5, 'DisplayName', 'Kondisi 2 (Tengah)');
plot(y3_cond3, 'g-', 'LineWidth', 1.5, 'DisplayName', 'Kondisi 3 (Akhir)');
title('Perbandingan ROI - Tiga Kondisi Berbeda', 'FontSize', 14);
legend('Kondisi 1 (Awal)', 'Kondisi 2 (Tengah)', 'Kondisi 3 (Akhir)', 'Location', 'best');
ylabel('Amplitudo');
xlabel('Sampel');
grid on;
hold off;

fprintf('\nAnalisis selesai. Periksa window Figure untuk grafik.\n');
fprintf('Screenshot grafik untuk dimasukkan ke lembar jawaban PDF.\n');
