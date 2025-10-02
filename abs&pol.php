<?php
abstract class Kendaraan{
    abstract public function jalan();
}

class Mobil extends Kendaraan {
    public function jalan(){
        echo "Mobil berjalan dengan 4 roda\n";
    }
}
class Motor extends Kendaraan {
    public function jalan(){
        echo "Motor berjalan dengan 2 roda\n";
    }
}

$mobil=new Mobil();
$motor=new Motor();
$mobil->jalan();
$motor->jalan();
?>

<?php
interface BangunDatar{
    public function luas();
}
class Persegi implements BangunDatar{
    public function __construct($sisi){
        $this->sisi= $sisi;
    }
    public function luas(){
        return $this->sisi * $this->sisi;
    }
    }
class Lingkaran implements BangunDatar{
    public function __construct($jari){
        $this->jari= $jari;
    }
    public function luas(){
        return 3.14 * $this->jari * $this->jari;
    }
    }
$sisi = 2;
$persegi=new Persegi();
$persegi->luas($sisi);

?>