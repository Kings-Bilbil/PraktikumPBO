<?php

trait Loggable
{
    public function logActivity(string $message): void
    {
        echo "[LOG]: " . $message . PHP_EOL;
    }
}

trait Notifiable
{
    public function sendNotification(string $message): void
    {
        echo "[NOTIFIKASI]: " . $message . PHP_EOL;
    }
}

trait Searchable
{
    public function searchByTitle(string $keyword): bool
    {
        return stristr($this->judul, $keyword) !== false;
    }
}

abstract class ItemPerpustakaan
{
    use Loggable, Searchable;

    public string $judul;
    public string $penulis;
    public int $tahunTerbit;
    protected bool $dipinjam = false;

    public function __construct(string $judul, string $penulis, int $tahunTerbit)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }

    public function pinjam(): void
    {
        if (!$this->dipinjam) {
            $this->dipinjam = true;
            echo "Meminjam item umum: '{$this->judul}'" . PHP_EOL;
            $this->logActivity("Item '{$this->judul}' dipinjam.");
        } else {
            echo "Item '{$this->judul}' sudah dipinjam." . PHP_EOL;
        }
    }

    public function kembalikan(): void
    {
        if ($this->dipinjam) {
            $this->dipinjam = false;
            echo "Item '{$this->judul}' telah dikembalikan." . PHP_EOL;
            $this->logActivity("Item '{$this->judul}' dikembalikan.");
        } else {
            echo "Item '{$this->judul}' tidak sedang dalam status dipinjam." . PHP_EOL;
        }
    }

    public function getInfo(): string
    {
        return "Judul: {$this->judul}, Penulis/Penerbit: {$this->penulis}, Tahun: {$this->tahunTerbit}";
    }
}

class Buku extends ItemPerpustakaan
{
    public string $isbn;

    public function __construct(string $judul, string $penulis, int $tahunTerbit, string $isbn)
    {
        parent::__construct($judul, $penulis, $tahunTerbit);
        $this->isbn = $isbn;
    }

    public function pinjam(): void
    {
        if (!$this->dipinjam) {
            $this->dipinjam = true;
            echo "Meminjam BUKU: '{$this->judul}' (ISBN: {$this->isbn}). Peminjaman berlaku 30 hari." . PHP_EOL;
            $this->logActivity("Buku '{$this->judul}' dipinjam.");
        } else {
            echo "Buku '{$this->judul}' sudah dipinjam." . PHP_EOL;
        }
    }

    public function getInfo(): string
    {
        return parent::getInfo() . ", ISBN: {$this->isbn}";
    }
}

class DVD extends ItemPerpustakaan
{
    public int $durasi;

    public function __construct(string $judul, string $sutradara, int $tahunTerbit, int $durasi)
    {
        parent::__construct($judul, $sutradara, $tahunTerbit);
        $this->durasi = $durasi;
    }

    public function pinjam(): void
    {
        if (!$this->dipinjam) {
            $this->dipinjam = true;
            echo "Meminjam DVD: '{$this->judul}' (Durasi: {$this->durasi} menit). Peminjaman berlaku 7 hari." . PHP_EOL;
            $this->logActivity("DVD '{$this->judul}' dipinjam.");
        } else {
            echo "DVD '{$this->judul}' sudah dipinjam." . PHP_EOL;
        }
    }

    public function getInfo(): string
    {
        return parent::getInfo() . ", Durasi: {$this->durasi} menit";
    }
}

class Majalah extends ItemPerpustakaan
{
    public string $edisi;

    public function __construct(string $judul, string $penerbit, int $tahunTerbit, string $edisi)
    {
        parent::__construct($judul, $penerbit, $tahunTerbit);
        $this->edisi = $edisi;
    }

    public function pinjam(): void
    {
        if (!$this->dipinjam) {
            $this->dipinjam = true;
            echo "Meminjam MAJALAH: '{$this->judul}' edisi {$this->edisi}. Hanya boleh dibaca di tempat." . PHP_EOL;
            $this->logActivity("Majalah '{$this->judul}' edisi {$this->edisi} dibaca.");
        } else {
            echo "Majalah '{$this->judul}' edisi {$this->edisi} sedang dibaca." . PHP_EOL;
        }
    }
    
    public function getInfo(): string
    {
        return parent::getInfo() . ", Edisi: {$this->edisi}";
    }
}

class Pengguna
{
    use Notifiable, Loggable;

    public string $nama;
    public string $email;

    public function __construct(string $nama, string $email)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->logActivity("Pengguna baru '{$this->nama}' dibuat.");
    }
}

class Transaksi
{
    use Loggable, Notifiable;
    
    public function prosesPeminjaman(Pengguna $pengguna, ItemPerpustakaan $item)
    {
        echo "------------------------------------------------------" . PHP_EOL;
        echo "Memproses peminjaman untuk '{$pengguna->nama}'..." . PHP_EOL;
        $item->pinjam();
        
        $this->logActivity("Transaksi peminjaman: {$pengguna->nama} meminjam {$item->judul}.");
        
        $this->sendNotification("Transaksi peminjaman '{$item->judul}' berhasil.");
        
        $pengguna->sendNotification("Halo {$pengguna->nama}, Anda telah berhasil meminjam '{$item->judul}'.");
        echo "------------------------------------------------------" . PHP_EOL . PHP_EOL;
    }
}

// =================================================================
// BAGIAN EKSEKUSI: Kode di bawah ini membuat dan menjalankan sistem
// =================================================================

// 1. Membuat beberapa item perpustakaan
$buku = new Buku("Laskar Pelangi", "Andrea Hirata", 2005, "978-979-3062-79-2");
$dvd = new DVD("The Avengers", "Joss Whedon", 2012, 143);
$majalah = new Majalah("National Geographic", "National Geographic Society", 2023, "Oktober");

// 2. Membuat pengguna
$pengguna = new Pengguna("Budi", "budi@example.com");
echo PHP_EOL;

// 3. Membuat objek transaksi untuk memproses peminjaman
$transaksi = new Transaksi();
$transaksi->prosesPeminjaman($pengguna, $buku);
$transaksi->prosesPeminjaman($pengguna, $dvd);
$transaksi->prosesPeminjaman($pengguna, $majalah);

// 4. Contoh mencoba meminjam item yang sama lagi
echo "Mencoba meminjam buku yang sama lagi..." . PHP_EOL;
$buku->pinjam();
echo PHP_EOL;

// 5. Contoh mengembalikan item
$buku->kembalikan();
echo PHP_EOL;

// 6. Contoh menggunakan kemampuan dari trait 'Searchable'
echo "Mencari item dengan kata kunci 'Pelangi'..." . PHP_EOL;
$koleksiItem = [$buku, $dvd, $majalah];
foreach ($koleksiItem as $item) {
    if ($item->searchByTitle("Pelangi")) {
        echo "Ditemukan: " . $item->getInfo() . PHP_EOL;
    }
}

echo "\nMencari item dengan kata kunci 'geo'..." . PHP_EOL;
foreach ($koleksiItem as $item) {
    if ($item->searchByTitle("geo")) {
        echo "Ditemukan: " . $item->getInfo() . PHP_EOL;
    }
}

?>