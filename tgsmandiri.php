<?php
// --- BAGIAN LOGIKA PHP ---

/**
 * Class Buku merepresentasikan sebuah buku dengan properti judul, penulis, dan tahun.
 * Ini adalah 'cetak biru' untuk setiap objek buku yang akan kita buat.
 */
class Buku {
    // Properti publik agar bisa diakses dari luar kelas.
    public $judul;
    public $penulis;
    public $tahun;

    /**
     * Constructor adalah metode khusus yang otomatis dipanggil saat objek baru dibuat.
     * Fungsinya untuk mengisi properti objek dengan data awal.
     */
    public function __construct($judul, $penulis, $tahun) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun = $tahun;
    }
}

/**
 * Class Perpustakaan bertugas untuk mengelola kumpulan objek buku.
 */
class Perpustakaan {
    // Properti private, artinya hanya bisa diakses dari dalam kelas Perpustakaan itu sendiri.
    // Ini untuk menyimpan semua buku dalam bentuk array.
    private $daftarBuku = [];

    /**
     * Metode untuk menambahkan objek Buku ke dalam array $daftarBuku.
     * Tipe data 'Buku' sebelum parameter '$buku' memastikan hanya objek dari class Buku yang bisa ditambahkan.
     */
    public function tambahBuku(Buku $buku) {
        // Menambahkan buku baru ke akhir array $daftarBuku.
        $this->daftarBuku[] = $buku;
    }

    /**
     * Metode untuk menampilkan seluruh daftar buku yang tersimpan.
     * Mengembalikan array berisi objek-objek buku.
     */
    public function getDaftarBuku() {
        return $this->daftarBuku;
    }
}

// --- PROSES IMPLEMENTASI APLIKASI ---

// 1. Membuat objek perpustakaan baru.
$perpustakaan = new Perpustakaan();

// 2. Membuat 3 objek buku baru dengan data masing-masing.
// Constructor (__construct) langsung dipanggil di sini.
$buku1 = new Buku("Laskar Pelangi", "Andrea Hirata", 2005);
$buku2 = new Buku("Bumi Manusia", "Pramoedya Ananta Toer", 1980);
$buku3 = new Buku("Cantik Itu Luka", "Eka Kurniawan", 2002);

// 3. Menambahkan ketiga objek buku ke dalam objek perpustakaan.
$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);
$perpustakaan->tambahBuku($buku3);

// 4. Mengambil semua data buku dari perpustakaan untuk ditampilkan di HTML.
$semuaBuku = $perpustakaan->getDaftarBuku();

// --- BAGIAN TAMPILAN HTML ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Perpustakaan</title>
    <!-- Menggunakan CSS yang sama seperti sebelumnya, dengan sedikit penyesuaian -->
    <style>
        body {
            font-family: system-ui, Segoe UI, Arial, sans-serif;
            background-image: url('sky-414199_1280.jpg');
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
            max-width: 650px; /* Dibuat lebih lebar untuk tabel */
            box-sizing: border-box;
        }
        .keterangan {
            text-align: center;
            line-height: 1.6;
        }
        /* Style untuk tabel daftar buku */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: 600;
        }
        /* Style untuk tombol kembali */
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
    <div class="form-container">
        <h1 class="keterangan">Daftar Buku di Perpustakaan</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Looping (perulangan) untuk menampilkan setiap buku dari array $semuaBuku ke dalam baris tabel.
                foreach ($semuaBuku as $buku):
                ?>
                <tr>
                    <!-- htmlspecialchars() digunakan untuk keamanan, mencegah script injection. -->
                    <td><?php echo htmlspecialchars($buku->judul); ?></td>
                    <td><?php echo htmlspecialchars($buku->penulis); ?></td>
                    <td><?php echo htmlspecialchars($buku->tahun); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tombol untuk kembali ke halaman utama/index -->
        <a href="/" class="button-link">Kembali ke Index</a>
    </div>
</body>
</html>
