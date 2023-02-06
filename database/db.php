<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = '';
$conn = mysqli_connect($host, $user, $password, $database);

if ($conn->connec) {
    die('Connection error: ' . mysqli_connect_error());
}