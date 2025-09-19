<?php
class Mahasiswa{
  var $nama;
  var $nim;
  var $prodi;
  var $ipk;
  var $password;


  protected function getNilaiIPK(){
    return "Nilai IPK mahasiswa adalah $this->ipk";
  }
  private function getPassword(){
    return "Password akun mahasiswa adalah $this->password";
    }
  public function tampilkanPassword(){
    echo $this->getPassword();
  }
  function setNilaiIPK($ipk){
    $this->ipk = $ipk;
  }
  function setPassword($password){
    $this->password = $password;
  }
}

class Nilai extends Mahasiswa{
    public function tampilkanIPK(){
        echo $this->getNilaiIPK();
    }
}


$mahasiswa = new Mahasiswa();
$mahasiswa->setPassword('12345'); //contoh penggunaan method untuk menetapkan nilai property
$mahasiswa->nama = "Nabil";
$mahasiswa->nim = "1046";
$mahasiswa->prodi = "Sistem Informasi";
$nilai = new Nilai();
$nilai->ipk = "4.0";

echo $mahasiswa->nama;
echo "\n";
echo $mahasiswa->nim;
echo "\n";
echo $mahasiswa->prodi;
echo "\n";
$nilai->tampilkanIPK();
echo "\n";
$mahasiswa->tampilkanPassword();