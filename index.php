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
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
  <h1 class="keterangan">Halo, Ini adalah Tugas PBO! 👋</h1>
  <div class="card">
    <p class="keterangan">Berikut Daftar Tugasnya:</p>
    <a href="/home.php" class="button-link">Home</a>
    <a href="/Latihan1.php" class="button-link">Latihan 1</a>
    <a href="/Latihan2.php" class="button-link">Latihan 2</a>
    <a href="/Latihan3.php" class="button-link">Latihan 3</a>
    <a href="/tgsmandiri.php" class="button-link">Tugas Mandiri</a>
    <a href="/objeksegitiga.php" class="button-link">Menghitung Segitiga</a>
    <a href="/prak5.php" class="button-link">Praktikum 5.1</a>
    <a href="/prak5(2).php" class="button-link">Praktikum 5.2</a>
    <a href="/prak6.php" class="button-link">Praktikum 6</a>
    <a href="/ab&pol.php.php" class="button-link">Abstraksi & Polimorfisme</a>
  </div>
</div>
</body>
</html>
