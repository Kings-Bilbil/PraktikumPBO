<?php
abstract class Kendaraan{
    abstract public function jalan();
}

class Mobil extends Kendaraan {
    public function jalan(){
        return "Mobil berjalan dengan 4 roda\n";
    }
}
class Motor extends Kendaraan {
    public function jalan(){
        return "Motor berjalan dengan 2 roda\n";
    }
}

$mobil=new Mobil();
$motor=new Motor();

?>

<?php
interface BangunDatar{
    public function luas();
}
class Persegi implements BangunDatar{
    private $sisi;
    public function __construct($sisi){
        $this->sisi= $sisi;
    }
    public function luas(){
        return "Luas Persegi: " . $this->sisi * $this->sisi . "\n";
    }
    }
class Lingkaran implements BangunDatar{
    private $jari;
    public function __construct($jari){
        $this->jari = $jari;
    }
    public function luas(){
        return "Luas Lingkaran: " . 3.14 * $this->jari * $this->jari . "\n";
    }
    }
$BangunDatar=[new Persegi(2),new Lingkaran(3)];
?>

<?php
abstract class ItemPerpustakaan{
    abstract function pinjam();
}
class Buku extends ItemPerpustakaan{
    private $nama;
    public function __construct($nama){
        $this->nama=$nama;
    }
    public function pinjam(){
        return "Buku $this->nama itu akan dipinjam\n";
    }
}
class Majalah extends ItemPerpustakaan{
    private $nama;
    public function __construct($nama){
        $this->nama=$nama;
    }
    public function pinjam(){
        return "Majalah $this->nama itu akan dipinjam\n";
    }
}

$gabungan=[new Buku("Matematika"), new Majalah("Kartun")];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstraksi & Polimorfisme</title>
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
        <h1 class="keterangan">Abstraksi & Polimorfisme</h1>
        
        <p class="keterangan"><b>Latihan 1:</b><br>
        <?php echo $mobil->jalan(); "\n".$motor->jalan(); ?>
        </p>
        
        <hr>

        <p class="keterangan"><b>Latihan 2:</b><br>Telah dibeli 1 unit 
        <?php foreach ($BangunDatar as $bangun){echo $bangun->luas();} ?>
        </p>
        
        <hr>

        <p class="keterangan"><b>Latihan 3</b><br>
        <?php foreach ($gabungan as $kumpul){$kumpul->pinjam();} ?>
        </p>

        <a href="/" class="button-link">Kembali ke Index</a>
    </div>
</body>
</html>