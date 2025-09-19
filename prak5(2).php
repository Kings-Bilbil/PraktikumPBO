<?php
class Mahasiswa{
  var $nama;
  var $nim;
  var $prodi;
  var $ipk;
  var $password;


  protected function getNilaiIPK(){
    return "Nilai IPK mahasiswa adalah $this->ipk";
  }
  private function getPassword(){
    return "Password akun mahasiswa adalah $this->password";
    }
  public function tampilkanPassword(){
    echo $this->getPassword();
  }
  function setNilaiIPK($ipk){
    $this->ipk = $ipk;
  }
  function setPassword($password){
    $this->password = $password;
  }
}

class Nilai extends Mahasiswa{
    public function tampilkanIPK(){
        echo $this->getNilaiIPK();
    }
}


$mahasiswa = new Mahasiswa();
$mahasiswa->setPassword('12345'); //contoh penggunaan method untuk menetapkan nilai property
$mahasiswa->nama = "Nabil";
$mahasiswa->nim = "1046";
$mahasiswa->prodi = "Sistem Informasi";
$nilai = new Nilai();
$nilai->ipk = "4.0";

echo $mahasiswa->nama;
echo "\n";
echo $mahasiswa->nim;
echo "\n";
echo $mahasiswa->prodi;
echo "\n";
$nilai->tampilkanIPK();
echo "\n";
$mahasiswa->tampilkanPassword();
?>

<!DOCTYPE html>
<html lang="en">
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
    
</body>
</html>