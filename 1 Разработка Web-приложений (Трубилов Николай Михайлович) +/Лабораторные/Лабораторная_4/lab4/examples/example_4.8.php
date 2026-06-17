<?php

function vivod_massiva($array)
{
    for ($i = 0;$i < count($array); $i++) {
        echo "Элемент $i = ", $array[$i], "<br>";
    }
}
$fructs[0] = "яблоко";
$fructs[1] = "груша";
$fructs[2] = "абрикос";
$fructs[3] = "лимон";
vivod_massiva($fructs);
