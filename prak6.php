<?php
class Bunga {
    public $nama;
    public $warna;

    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
    }

    public function mekar() {
        return "🌸 Objek bunga '$this->nama' ($this->warna) telah mekar!";
    }

    public function tampilkanInfo() {
        return "Informasi: Ini adalah bunga $this->nama yang berwarna $this->warna.";
    }

    public function layu() {
        return "🌿 Objek bunga '$this->nama' telah layu...";
    }

    public function __destruct() {
        echo "<div style='text-align: center; color: #666; font-style: italic; margin-top: 20px; padding: 10px; background: rgba(255,255,255,0.5); border-radius: 8px;'>[Lifecycle Otomatis] " . $this->layu() . "</div>\n";
    }
}

$mawar = new Bunga('Mawar', 'Merah');
$melati = new Bunga('Melati', 'Putih');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 6 - Bunga Cantik</title>
    <style>
        body {
            font-family: system-ui, Segoe UI, Arial, sans-serif;
            /* Background image bunga untuk tema (ganti dengan URL gambar Anda) */
            background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'); /* Contoh: Taman bunga dari Unsplash */
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Fixed agar gambar tidak scroll */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 16px;
            color: #333;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            width: 100%;
            max-width: 550px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #d63384; /* Warna pink untuk tema bunga */
            margin-bottom: 20px;
            font-size: 2em;
        }
        .bunga-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            padding: 15px;
            margin: 15px 0;
            border-left: 5px solid; /* Garis warna sesuai bunga */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .bunga-card:hover {
            transform: translateY(-5px); /* Efek angkat saat hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .mawar { border-left-color: #dc3545; } /* Merah untuk mawar */
        .melati { border-left-color: #f8f9fa; border-left-width: 5px; border-left-style: solid; background: linear-gradient(to right, rgba(255,255,255,0.9), rgba(248,249,250,0.9)); } /* Putih/abu untuk melati */
        .info-text {
            font-size: 1.1em;
            line-height: 1.5;
            margin: 10px 0;
        }
        a { 
            text-decoration: none; /* Perbaiki: tambah spasi dan ; */
        }
        .button-link {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            background: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
        }
        .button-link:hover {
            background: #0056b3;
        }
        hr {
            border: none;
            height: 1px;
            background-color: #ccc;
            margin: 20px 0;
        }
        /* Responsif untuk mobile */
        @media (max-width: 600px) {
            .form-container { padding: 20px; max-width: 90%; }
            h1 { font-size: 1.5em; }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>🌺 Koleksi Bunga 🌺</h1>
        
        <!-- Card untuk Mawar -->
        <div class="bunga-card mawar">
            <h2 style="color: #dc3545; margin: 0 0 10px 0;">Mawar Merah</h2>
            <p class="info-text"><?php echo $mawar->mekar(); ?></p>
            <p class="info-text"><?php echo $mawar->tampilkanInfo(); ?></p>
            <p class="info-text" style="color: #666; font-style: italic;"><?php echo $mawar->layu(); ?></p> <!-- Simulasi layu -->
        </div>
        
        <hr>
        
        <!-- Card untuk Melati -->
        <div class="bunga-card melati">
            <h2 style="color: #6c757d; margin: 0 0 10px 0;">Melati Putih</h2>
            <p class="info-text"><?php echo $melati->mekar(); ?></p>
            <p class="info-text"><?php echo $melati->tampilkanInfo(); ?></p>
            <p class="info-text" style="color: #666; font-style: italic;"><?php echo $melati->layu(); ?></p> <!-- Simulasi layu -->
        </div>
        
        <a href="/" class="button-link">Kembali ke Index</a>
    </div>
    <!-- Destructor otomatis muncul di sini untuk demo lifecycle (untuk kedua objek) -->
</body>
</html>
