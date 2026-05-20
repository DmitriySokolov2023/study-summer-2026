<?php

function kvadrat1($chislo)
{
    return $chislo * $chislo;
}
function kvadrat2($chislo)
{
    $a = $chislo;
    return ($a * $chislo);
}

$vxodn1 = 5;
$vxodn2 = 6;
echo "5 x 5 = ", kvadrat1($vxodn1), "</br>";
echo "6 x 6 = ", kvadrat2($vxodn2), "</br>";
echo "7 x 7 x 7 = ", kub(7), "</br>";
function kub($chislo)
{
    $a = $chislo;
    return (kvadrat2($a) * $chislo);
}
