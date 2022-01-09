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

abstract class fight {

    use hewan;

    public $attackPower;
    public $defencePower;

    public function serang($target)
    {
        // $this->diserang($target);
        echo $this->nama . " sedang menyerang {$target->nama} </br>";
        $target->diserang($this);
    }

    public function diserang($penyerang)
    {
        echo $this->nama . " sedang diserang " . $penyerang->nama;
        $this->darah = $this->darah - ($penyerang->attackPower / $this->defencePower);
    }

    public function getInfo()
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
    }

    abstract public function getInfoHewan();

}

class Space  
{
    public static function show()
    {
        echo "<br/>";
        echo "================";
        echo "<br/>";
    }
}


class Harimau extends fight {
    // use hewan;
    // use fight;

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
        echo "Jenis Hewan : Hariamu <br>";
        $this->getInfo();
    }
}

class Elang extends fight {
    // use hewan;
    // use fight;

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
        echo "Jenis Hewan : Elang <br>";
        $this->getInfo();
    }
}

$harimau1 = new Harimau('Harimau 1');
$elang1 = new Elang('Elang 1');

$harimau1->getInfoHewan();
Space::show();
$elang1->getInfoHewan();

Space::show();
$harimau1->serang($elang1);
Space::show();
$elang1->getInfoHewan();

Space::show();
$elang1->serang($harimau1);
Space::show();
$harimau1->getInfoHewan();

// echo $harimau1->atraksi();
// echo "</br>";
// echo $elang1->serang($harimau1);
// echo "</br>";
// echo $elang1->getInfoHewan();

// echo "<br/>";

// echo $elang1->atraksi();
// echo "</br>";
// echo $harimau1->serang($elang1);
// echo "</br>";
// echo $harimau1->getInfoHewan();

