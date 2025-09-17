<?php
// --- LOGIKA PHP DITEMPATKAN DI SINI ---

class Produk {
    public $nama;
    public $harga;
    public $stok;

    /**
     * Metode untuk menampilkan informasi produk saat ini.
     * Harga akan diformat ke dalam Rupiah.
     * @return string
     */
    public function tampilkanInfo() {
        $hargaFormatted = "Rp" . number_format($this->harga, 0, ',', '.');
        return "Produk: {$this->nama}, Harga: {$hargaFormatted}, Stok: {$this->stok} Unit";
    }
    
    /**
     * Metode untuk memproses pembelian.
     * Metode ini akan mengurangi stok secara langsung.
     * @param int $jumlah Jumlah produk yang dibeli.
     * @return bool True jika berhasil, false jika gagal.
     */
    public function beliProduk($jumlah = 1){
        if ($this->stok >= $jumlah) {
            // Mengurangi stok produk secara permanen
            $this->stok -= $jumlah;
            return true; // Transaksi berhasil
        } else {
            return false; // Stok tidak cukup
        }
    }
}

// 1. Buat objek produk
$produk = new Produk();
$produk->nama = "Laptop";
$produk->harga = 5000000; // Simpan harga sebagai angka untuk perhitungan
$produk->stok = 3;

// 2. Simpan informasi STOK SEBELUM transaksi
$infoSebelum = $produk->tampilkanInfo();

// 3. Lakukan proses pembelian 1 unit
$produk->beliProduk(1);

// 4. Simpan informasi STOK SETELAH transaksi
$infoSetelah = $produk->tampilkanInfo();

// --- KODE HTML DIMULAI DI BAWAH ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Pembelian Produk</title>
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
        .keterangan {
            text-align: center;
            line-height: 1.6;
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
        <h1 class="keterangan">Detail Pembelian Produk</h1>
        
        <!-- Menampilkan data SEBELUM transaksi -->
        <p class="keterangan"><b>Stok sebelum transaksi:</b><br><?php echo $infoSebelum; ?></p>
        
        <hr>

        <!-- Menampilkan detail transaksi -->
        <p class="keterangan"><b>Transaksi:</b><br>Telah dibeli 1 unit <?php echo $produk->nama; ?> seharga <?php echo "Rp" . number_format($produk->harga, 0, ',', '.'); ?></p>
        
        <hr>

        <!-- Menampilkan data SETELAH transaksi -->
        <p class="keterangan"><b>Stok setelah transaksi:</b><br><?php echo $infoSetelah; ?></p>

        <a href="/" class="button-link">Kembali ke Index</a>
    </div>
</body>
</html>
