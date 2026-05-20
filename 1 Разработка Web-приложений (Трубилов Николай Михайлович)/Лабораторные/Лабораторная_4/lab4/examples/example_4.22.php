<?php

function obratn_znach($chislo)
{
    if ($chislo != 0) {
        return 1 / $chislo;
    } else {
        return false;
    }
}
$x = 0;
//$x = 4;
$y = obratn_znach($x);
if ($y == false) {
    echo "Вычисление числа, обратного X, невозможно,<br>";
    echo "так как X = 0;  <br>";
} else {
    echo "1/x = ",$y,"<br>";
}
$y = obratn_znach($x)
    or die("Вычисление числа, обратного X, невозможно!!<br>");
echo  "Значение x = ", $x, "<br>";
