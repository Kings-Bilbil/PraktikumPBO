<?php
class itemPerpustakaan{
    protected $judul;
    protected $tahun_terbit;

    public function pinjam(){
        return "Meminjam Buku";
    }
}

class Buku extends itemPerpustakaan{
    public $ISBN;

    public function pinjam()
}
class Dvd extends itemPerpustakaan{
    public $durasi;

    public function pinjam()
}
class Majalah extends itemPerpustakaan{

}
?>