<?php

$pesme[] = 'La Fama';
$pesme[] = 'Often';
$pesme[] = 'Stay';
$pesme[] = 'Flowers';
$pesme[] = 'Unholy';
$pesme[] = 'Popstar';



$query = $_REQUEST['query'];
$suggestion = "";  

if ($query !== "") {
    $query = strtolower($query);
    $length = strlen($query);

    foreach ($pesme as $pesma) {
        if (stristr($query, substr($pesma, 0, $length))) {
            if ($suggestion == "") {
                $suggestion = $pesma;
            } else {
                $suggestion .= ", $pesma";
            }
        }
    }
}
if ($suggestion == "") {
    echo 'Nema predloga';
} else {
    echo $suggestion;
}