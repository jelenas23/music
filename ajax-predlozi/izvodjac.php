<?php

$izvodjaci[] = 'The Weeknd';
$izvodjaci[] = 'Beyonce';
$izvodjaci[] = 'Coldplay';
$izvodjaci[] = 'Drake';
$izvodjaci[] = 'Chris Brown';
$izvodjaci[] = 'JLo';
$izvodjaci[] = 'Khalid';



$query = $_REQUEST['query'];
$suggestion = "";  

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($izvodjaci as $izvodjac) {
        if (stristr($query, substr($izvodjac, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $izvodjac;
            } else {
                $suggestion .= ", $izvodjac";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'Nema predloga';
} else {
    echo $suggestion;
}