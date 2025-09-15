<?php
// index.php — Halaman utama
$page = $_GET['page'] ?? '';
if ($page === 'home') {
    header('Location: /home.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Index PHP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{
        font-family:system-ui,Segoe UI,Arial,sans-serif;
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 16px;
        background-image: url("sky-414199_1280.jpg");
    }
    .form-container {
      /* Memberi efek "glassmorphism" (seperti kaca buram) */
      background: rgba(255, 255, 255, 0.9); /* Latar belakang putih semi-transparan */
      backdrop-filter: blur(10px); /* Memberi efek blur pada area di belakang elemen ini */
      -webkit-backdrop-filter: blur(10px); /* Dukungan untuk browser Safari */
      border: 1px solid rgba(255, 255, 255, 0.3); /* Garis tepi tipis dan transparan */
      padding: 30px 40px; /* Jarak antara konten dan tepi kontainer */
      border-radius: 16px; /* Membuat sudut kontainer lebih tumpul/melengkung */
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); /* Memberi bayangan agar terlihat melayang */
      width: 100%; /* Lebar kontainer akan responsif */
      max-width: 550px; /* Lebar maksimum kontainer adalah 400px */
      box-sizing: border-box; /* Memastikan padding tidak menambah lebar total elemen */
    
    }
    a{text-decoration:none
    }
    
    .keterangan{
        text-align: center;
    }
    .button-link {
      display:block;
      width: 100%;
      padding: 12px;
      text-align: center;
      background: #007bff; /* Warna latar tombol */
      border: none; /* Menghilangkan garis tepi */
      border-radius: 8px;
      color: white; /* Warna teks tombol */
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease; /* Efek transisi warna saat kursor di atasnya */
    
    }
    .button-link:hover {
      background: #0056b3; /* Menggelapkan warna latar tombol */
    }
    .button-link + .button-link {
        margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="form-container">
  <h1 class="keterangan">Halo, Ini adalah Tugas PBO! 👋</h1>
  <div class="card">
    <p class="keterangan">Berikut Daftar Tugasnya:</p>
    <a href="/home.php" class="button-link">Home</a>
    <a href="/Latihan1.php" class="button-link">Latihan 1</a>
    <a href="/Latian2.php" class="button-link">Latihan 2</a>
    <a href="/Latian3.php" class="button-link">Latihan 3</a>
    <a href="/tgsmandiri.php" class="button-link">Tugas Mandiri</a>
    <a href="/objeksegitiga.php" class="button-link">Menghitung Segitiga</a>
  </div>
</div>
</body>
</html>
