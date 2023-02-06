<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'domaci1';
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('Connection error: ' . mysqli_connect_error());
}