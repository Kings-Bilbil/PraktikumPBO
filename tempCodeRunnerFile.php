<?php
abstract class ItemPerpustakaan{
    abstract function pinjam();
}
class Buku extends ItemPerpustakaan{
    public function pinjam(){
        echo "Buku akan dipinjam";
    }
}
class Majalah extends ItemPerpustakaan{
    public function pinjam(){
        echo "Majalah akan sedang dipinjam";
    }
}
$gabungan=[new Buku(), new Majalah()];
foreach ($gabungan as $kumpul){
    $kumpul->pinjam();
}
?>