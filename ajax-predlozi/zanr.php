<?php

$zanrovi[] = 'Hip hop';
$zanrovi[] = 'Rap';
$zanrpvi[] = 'Trap';
$zanrovi[] = 'Pop';
$zanrovi[] = 'RnB';
$zanrovi[] = 'Rock';



$query = $_REQUEST['query'];
$suggestion = "";  

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($zanrovi as $zanr) {
        if (stristr($query, substr($zanr, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $zanr;
            } else {
                $suggestion .= ", $zanr";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'Nema predloga';
} else {
    echo $suggestion;
}