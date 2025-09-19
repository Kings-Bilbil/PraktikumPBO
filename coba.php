<?php
class Mobil{
    public $pemilik;
    public $warna;
    public $merk;
    public function hidupkanMobil(){
        return  "hidupkan mobil";
    }
    public function matikanMobil(){
        return "matikan mobil";
    }
}
$mobil1= new Mobil();
echo $mobil1->matikanMobil();
?>