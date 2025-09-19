<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $prodi;
    public $angkatan;
    public $keterangan;

    public function getKeterangan(){
        echo "Nama: $this->nama\n";
        echo "Nim: $this->nim\n";
        echo "Prodi: $this->prodi\n";
        echo "Angkatan: $this->angkatan\n";
        echo "Keterangan: $this->keterangan\n";
    }
}

$mahasiswa1 = new Mahasiswa();
$mahasiswa1 -> nama= "Nabil";
$mahasiswa1 -> nim= "1046";
$mahasiswa1 -> prodi= "Sistem Informasi";
$mahasiswa1 -> angkatan= "2025";
$mahasiswa1 -> keterangan= "Aktif";

$mahasiswa2 = new Mahasiswa();
$mahasiswa2 -> nama= "Rafli";
$mahasiswa2 -> nim= "1008";
$mahasiswa2 -> prodi= "Sistem Informasi";
$mahasiswa2 -> angkatan= "2025";
$mahasiswa2 -> keterangan= "Cuti";

$mahasiswa3 = new Mahasiswa();
$mahasiswa3 -> nama= "Fahdil";
$mahasiswa3 -> nim= "1036";
$mahasiswa3 -> prodi= "Sistem Informasi";
$mahasiswa3 -> angkatan= "2025";
$mahasiswa3 -> keterangan= "Keluar";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 5.1</title>
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
        <h1 class="keterangan">Class Mahasiswa</h1>
        
        <!-- Menampilkan hasil dari variabel PHP -->
        <p class="keterangan">Nama: <?php echo $mahasiswa1->nama;?></p>
        <p class="keterangan">Nim: <?php echo $mahasiswa1->nim;?></p>
        <p class="keterangan">Prodi: <?php echo $mahasiswa1->prodi;?></p>
        <p class="keterangan">Angkatan: <?php echo $mahasiswa1->angkatan;?></p>
        <p class="keterangan">Keterangan: <?php echo $mahasiswa1->keterangan;?></p>
        <hr>
        <p class="keterangan">Nama: <?php echo $mahasiswa2->nama;?></p>
        <p class="keterangan">Nim: <?php echo $mahasiswa2->nim;?></p>
        <p class="keterangan">Prodi: <?php echo $mahasiswa2->prodi;?></p>
        <p class="keterangan">Angkatan: <?php echo $mahasiswa2->angkatan;?></p>
        <p class="keterangan">Keterangan: <?php echo $mahasiswa2->keterangan;?></p>
        <hr>
        <p class="keterangan">Nama: <?php echo $mahasiswa3->nama;?></p>
        <p class="keterangan">Nim: <?php echo $mahasiswa3->nim;?></p>
        <p class="keterangan">Prodi: <?php echo $mahasiswa3->prodi;?></p>
        <p class="keterangan">Angkatan: <?php echo $mahasiswa3->angkatan;?></p>
        <p class="keterangan">Keterangan: <?php echo $mahasiswa3->keterangan;?></p>
        <a href="/" class="button-link">Kembali ke index</a>
    </div>
</body>
</html>