<?php
    class Korisnik
    {
        public $id;
        public $username;
        public $password;
        public $email;

        public function __construct($id, $username,$password,$email)
        {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
        }


        public function dodajKorisnika()
        {
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'domaci1';
            $conn = mysqli_connect($host, $user, $password, $database);

            $query = "INSERT INTO korisnik (username, password,email) 
            VALUES ('$this->username', '$this->password','$this->email',)";

            if (mysqli_query($conn, $query)) {
                header('Location: login.php');
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
