<?php
class Bunga {
    public $nama;
    public $warna;

    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
    }

    public function mekar() {
        return "Objek bunga '$this->nama' ($this->warna) telah mekar!\n";
    }

    public function tampilkanInfo() {
        return "Informasi: Ini adalah bunga $this->nama yang berwarna $this->warna.\n";
    }

    public function __destruct() {
        echo "Objek bunga '$this->nama' telah layu...\n";
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
    <title>Praktikum 5.2</title>
    <style>
        body {
            font-family: system-ui, Segoe UI, Arial, sans-serif;
            /* background-image: url('path/to/image.jpg'); */ /* Tambahkan ini jika ada gambar */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 16px;
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
        a { text-decoration: none; } /* Perbaiki: tambah spasi dan ; */
        .keterangan { text-align: center; }
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
        }
        .button-link:hover { background: #0056b3; }
        hr {
            border: none;
            height: 1px;
            background-color: #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="keterangan">Bunga</h1>
        <p class="keterangan">Mekar Mawar: <?php echo $mawar->mekar(); ?></p>
        <p class="keterangan">Info Mawar: <?php echo $mawar->tampilkanInfo(); ?></p>
        <p class="keterangan">Mekar Melati: <?php echo $melati->mekar(); ?></p>
        <p class="keterangan">Info Melati: <?php echo $melati->tampilkanInfo(); ?></p>
        <hr>
        <a href="/" class="button-link">Kembali ke index</a>
    </div>
    <!-- Pesan layu muncul otomatis di sini (dari destructor) -->
</body>
</html>
