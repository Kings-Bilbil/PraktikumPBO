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
        echo "-------------------------------\n";
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

$mahasiswa1->getKeterangan();
$mahasiswa2->getKeterangan();
$mahasiswa3->getKeterangan();

?>