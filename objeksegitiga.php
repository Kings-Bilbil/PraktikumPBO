<?php
// Memasukkan file definisi class Segitiga agar bisa digunakan di sini.
require_once 'segitiga.php';

// --- IMPLEMENTASI OBJEK ---

// 1. Membuat objek segitiga pertama (Sama Kaki)
// Parameter: __construct(alas, tinggi, sisi1, sisi2, sisi3)
$segitiga1 = new Segitiga(10, 8, 6, 8, 6);

// 2. Membuat objek segitiga kedua (Sama Sisi)
$segitiga2 = new Segitiga(5, 4.33, 5, 5, 5);

// --- BAGIAN TAMPILAN HTML ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Segitiga</title>
    <style>
        body {
            font-family: system-ui, Segoe UI, Arial, sans-serif;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 16px;
        }
        .info-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        .keterangan {
            text-align: center;
            line-height: 1.6;
        }
        pre { /* Menggunakan tag <pre> agar format teks terjaga */
            font-family: system-ui, Segoe UI, Arial, sans-serif;
            line-height: 1.8;
            font-size: 16px;
            white-space: pre-wrap; /* Agar teks bisa wrap */
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
        .button-link {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            text-align: center;
            background: #007bff;
            border: none;
            border-radius: 8px;
            color: white !important;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        .button-link:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h1 class="keterangan">Detail Informasi Segitiga</h1>
        
        <!-- Menampilkan informasi dari objek pertama -->
        <pre><?php echo $segitiga1->tampilkanInfo(); ?></pre>
        
        <hr>

        <!-- Menampilkan informasi dari objek kedua -->
        <pre><?php echo $segitiga2->tampilkanInfo(); ?></pre>
        <a href="/" class="button-link">Kembali ke Index</a>
    </div>
</body>
</html>
