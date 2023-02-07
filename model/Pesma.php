<?php

class Pesma
{
    public $id;
    public $naziv;
    public $izvodjac;
    public $zanr;
    public $trajanje;
    public $godina;
    public $korisnik_id;
    public $created_at;

    public function __construct($id,$naziv,$izvodjac,$zanr,$trajanje,$godina,$korisnik_id,$created_at) {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->izvodjac = $izvodjac;
        $this->zanr = $zanr;
        $this->trajanje = $trajanje;
        $this->godina = $godina;
        $this->korisnik_id = $korisnik_id;
        $this->created_at = $created_at;
    }

    public function dodajPesmu()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'domaci1';
        $conn = mysqli_connect($host, $user, $password, $database);

        $query = "INSERT INTO pesma (naziv, izvodjac, zanr, trajanje, godina, korisnik_id) 
             VALUES ('$this->naziv', '$this->izvodjac',
            '$this->zanr', '$this->trajanje', '$this->godina', '$this->korisnik_id')";

        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
