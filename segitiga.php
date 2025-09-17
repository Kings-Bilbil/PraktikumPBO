<?php

/**
 * Class Segitiga adalah cetak biru untuk objek segitiga.
 * Sesuai dengan Class Diagram, class ini memiliki properti private untuk
 * alas, tinggi, dan ketiga sisinya, serta metode public untuk berinteraksi dengannya.
 */
class Segitiga {
    // Properti private, hanya bisa diakses dari dalam class ini.
    private $alas;
    private $tinggi;
    private $sisi1;
    private $sisi2;
    private $sisi3;

    /**
     * Constructor untuk membuat objek Segitiga baru dan menginisialisasi nilainya.
     * @param float $a Nilai untuk alas.
     * @param float $t Nilai untuk tinggi.
     * @param float $s1 Nilai untuk sisi pertama.
     * @param float $s2 Nilai untuk sisi kedua.
     * @param float $s3 Nilai untuk sisi ketiga.
     */
    public function __construct($a, $t, $s1, $s2, $s3) {
        $this->alas = $a;
        $this->tinggi = $t;
        $this->sisi1 = $s1;
        $this->sisi2 = $s2;
        $this->sisi3 = $s3;
    }

    /**
     * Metode untuk menghitung luas segitiga.
     * @return float Hasil perhitungan luas (0.5 * alas * tinggi).
     */
    public function hitungLuas() {
        return 0.5 * $this->alas * $this->tinggi;
    }

    /**
     * Metode untuk menghitung keliling segitiga.
     * @return float Hasil penjumlahan ketiga sisi.
     */
    public function hitungKeliling() {
        return $this->sisi1 + $this->sisi2 + $this->sisi3;
    }

    /**
     * Metode untuk mengecek jenis segitiga berdasarkan panjang sisinya.
     * @return string Jenis segitiga ("Sama Sisi", "Sama Kaki", atau "Sembarang").
     */
    public function cekJenis() {
        // Jika semua sisi sama panjang
        if ($this->sisi1 == $this->sisi2 && $this->sisi2 == $this->sisi3) {
            return "Sama Sisi";
        // Jika ada sepasang sisi yang sama panjang
        } elseif ($this->sisi1 == $this->sisi2 || $this->sisi2 == $this->sisi3 || $this->sisi1 == $this->sisi3) {
            return "Sama Kaki";
        // Jika semua sisi berbeda
        } else {
            return "Sembarang";
        }
    }

    /**
     * Metode untuk mengumpulkan dan memformat semua informasi segitiga.
     * @return string Teks yang berisi semua detail segitiga.
     */
    public function tampilkanInfo() {
        $info = "Alas : " . $this->alas . "\n" .
                "Tinggi : " . $this->tinggi . "\n" .
                "Sisi : " . $this->sisi1 . ", " . $this->sisi2 . ", " . $this->sisi3 . "\n" .
                "Luas : " . $this->hitungLuas() . "\n" .
                "Keliling : " . $this->hitungKeliling() . "\n" .
                "Jenis: " . $this->cekJenis();
        return $info;
    }
}
