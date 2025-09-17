<?php
// --- LOGIKA PHP DITEMPATKAN DI SINI ---

// Mendefinisikan kelas untuk Persegi Panjang
class PersegiPanjang {
    // Properti untuk panjang dan lebar
    public $panjang;
    public $lebar;

    /**
     * Metode untuk menghitung luas.
     * @return float|int
     */
    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
}

// 1. Buat objek baru dari kelas PersegiPanjang
$persegiPanjang = new PersegiPanjang();

// 2. Atur nilai properti panjang dan lebar
$persegiPanjang->panjang = 4;
$persegiPanjang->lebar = 3;

// 3. Hitung luas dan simpan hasilnya di variabel
$hasilLuas = $persegiPanjang->hitungLuas();

// --- KODE HTML DIMULAI DI BAWAH ---
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Persegi Panjang</title>
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
    </style>
</head>
<body>

    <div class="form-container">
        <h1 class="keterangan">Hasil Perhitungan</h1>
        
        <!-- Menampilkan hasil dari variabel PHP -->
        <p class="keterangan"> Rumus Luas: Panjang x Tinggi</p>
        <p class="keterangan">Hasil: <?php echo $persegiPanjang->panjang . " x " . $persegiPanjang->lebar . " = " . $hasilLuas; ?></p>
        <a href="/" class="button-link">Kembali ke index</a>
    </div>

</body>
</html>



