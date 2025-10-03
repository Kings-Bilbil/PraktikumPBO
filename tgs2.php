<?php
class ItemPerpustakaan{
    protected $nama;
    protected function pinjam(){
        return "Minjam?";
    }
}
class Buku extends ItemPerpustakaan{
    public $nama;
    public $tahun;
}
class DVD extends ItemPerpustakaan{
    
}

?>