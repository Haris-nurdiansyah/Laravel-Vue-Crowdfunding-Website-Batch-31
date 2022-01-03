<?php 

trait hewan {
    public $nama;
    public $darah = 50;
    public $jumlah_kaki;
    public $keahlian;

    public function atraksi()
    {
        return $this->nama . " sedang " . $this->keahlian;
    }
}

trait fight {
    public $attackPower;
    public $defencePower;

    public function serang($penyerang)
    {
        $this->diserang($penyerang);
        return $penyerang->nama . " sedang menyerang " .  $this->nama;
    }
    public function diserang($penyerang)
    {
        $this->darah = $this->darah - ($penyerang->attackPower / $this->defencePower);
        echo $this->nama . " sedang diserang " . $penyerang->nama . "<br/>";
    }
}

class Harimau {
    use hewan;
    use fight;

    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlah_kaki = 4;
        $this->keahlian = 'lari cepat';
        $this->attackPower = 7;
        $this->defencePower = 8;
    }

    public function getInfoHewan()
    {
        echo "Nama : " . $this->nama;
        echo "</br>";
        echo"Darah : " .  $this->darah;
        echo "</br>";
        echo "Jumlah kaki : " . $this->jumlah_kaki;
        echo "</br>";
        echo "keahlian : " . $this->keahlian;
        echo "</br>";
        echo "Attack power : " . $this->attackPower;
        echo "</br>";
        echo "Defence power : " . $this->defencePower;
        echo "</br>";
    }
}

class Elang {
    use hewan;
    use fight;

    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlah_kaki = 2;
        $this->keahlian = 'terbang tinggi';
        $this->attackPower = 10;
        $this->defencePower = 5;
    }

    public function getInfoHewan()
    {
        echo "Nama : " . $this->nama;
        echo "</br>";
        echo"Darah : " .  $this->darah;
        echo "</br>";
        echo "Jumlah kaki : " . $this->jumlah_kaki;
        echo "</br>";
        echo "keahlian : " . $this->keahlian;
        echo "</br>";
        echo "Attack power : " . $this->attackPower;
        echo "</br>";
        echo "Defence power : " . $this->defencePower;
        echo "</br>";
    }
}

$harimau1 = new Harimau('Harimau 1');
$elang1 = new Elang('Elang 1');

echo $harimau1->atraksi();
echo "</br>";
echo $elang1->serang($harimau1);
echo "</br>";
echo $elang1->getInfoHewan();

echo "<br/>";

echo $elang1->atraksi();
echo "</br>";
echo $harimau1->serang($elang1);
echo "</br>";
echo $harimau1->getInfoHewan();

