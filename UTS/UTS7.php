<?php
class Kamar{
    public $nomorKamar;
    public $tipeKamar;
    protected $harga;
}
class Tamu{
    public $nama;
    public $idTamu;
}
class Reservasi extends Kamar{
    public $nomorKamar;
    public $nama;
    public $harga;
    public $persen;
    static $counter = 0;
    public function hitungTotalBiaya($malam){
        self::$counter + 1;
        if ($this->tipeKamar == "suite"){
            $this->persen = $this->harga * 0.2;
        }
        elseif ($this->tipeKamar == "deluxe"){
            $this->persen = $this->harga * 0.5;
        }
        return ($this->harga + $this->persen) * $malam;
    }

}
$reservasi=new Reservasi();
$reservasi->nama="Budi\n";
$reservasi->nomorKamar="101 -";
$reservasi->harga=1000000;
$reservasi->tipeKamar=" suite\n";
echo "Tamu: ".$reservasi->nama;
echo "Kamar: ".$reservasi->nomorKamar;
echo $reservasi->tipeKamar;
echo "Total Biaya: ".$reservasi->hitungTotalBiaya(3);
?>