<?php
// Mengaktifkan 'output buffering'. Ini seperti menyalakan perekam.
// Semua 'echo' yang terjadi setelah ini akan ditampung, bukan langsung ditampilkan.
ob_start();

// ======================================================
// BAGIAN LOGIKA PHP (PROSES DI SERVER)
// ======================================================

class Bunga {
    public $nama;
    public $warna;

    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
        
        // Pesan ini akan "direkam" oleh output buffer.
        // Menggunakan <br> agar baris baru berfungsi di HTML.
        echo "Objek bunga '$this->nama' ($this->warna) telah mekar!<br>";
    }

    /**
     * FUNGSI INI DIPERBAIKI: Menggunakan 'return' bukan 'echo'.
     * Metode ini sekarang mengembalikan sebuah string (teks),
     * yang nantinya bisa kita tampilkan di mana saja.
     * @return string
     */
    public function getInfo() {
        return "Ini adalah bunga $this->nama yang berwarna $this->warna.";
    }

    public function __destruct() {
        // Pesan ini juga akan "direkam".
        echo "Objek bunga '$this->nama' telah layu...<br>";
    }
}

// --- Membuat Objek dan Menyimpan Hasil ---

// 1. Membuat objek. Pesan dari constructor akan direkam.
$mawar = new Bunga('Mawar', 'Merah');
$melati = new Bunga('Melati', 'Putih');

// 2. Memanggil metode getInfo() dan menyimpan hasilnya ke dalam variabel.
$infoMawar = $mawar->getInfo();
$infoMelati = $melati->getInfo();

// 3. Menghentikan "perekam" dan menyimpan semua yang sudah terekam (pesan constructor)
//    ke dalam satu variabel. Setelah ini, variabel $logKejadian akan berisi:
//    "Objek bunga 'Mawar' (Merah) telah mekar!<br>Objek bunga 'Melati' (Putih) telah mekar!<br>"
$logKejadian = ob_get_clean();

// Pesan dari destructor akan otomatis terekam dan ditampilkan di akhir.
// Kita bisa menangkapnya juga, tapi untuk saat ini biarkan default.

// ======================================================
// BAGIAN TAMPILAN HTML (APA YANG DILIHAT PENGGUNA)
// ======================================================
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 5.2</title>
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
        .keterangan{
            text-align: center;
        }
        .log-box {
            background-color: #f0f0f0;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin: 15px 0;
            font-family: monospace;
            font-size: 0.9em;
            border-radius: 4px;
            text-align: left;
        }
        .button-link {
            display:block;
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
            text-decoration:none;
            margin-top: 20px;
        }
        .button-link:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="keterangan">Informasi Bunga</h1>
        
        <!-- Menampilkan hasil dari variabel PHP yang sudah disiapkan -->
        <p><b>Bunga 1:</b> <?php echo $infoMawar; ?></p>
        <p><b>Bunga 2:</b> <?php echo $infoMelati; ?></p>
        
        <hr>
        
        <!-- Menampilkan log dari constructor dan destructor -->
        <div class="log-box">
            <b>Log Kejadian (Constructor & Destructor):</b><br>
            <?php echo $logKejadian; ?>
        </div>

        <a href="/" class="button-link">Kembali ke index</a>
    </div>
</body>
</html>

