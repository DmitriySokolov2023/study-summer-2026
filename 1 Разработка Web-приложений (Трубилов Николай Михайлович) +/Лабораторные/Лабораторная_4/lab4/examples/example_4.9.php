<?php

$ocenka[0] = 4;
$ocenka[1] = 4;
$ocenka[2] = 5;
$ocenka[3] = 3;
$ocenka[4] = 2;
srednocenka($ocenka);

function srednocenka($massivocenok)
{
    $summa = 0;
    $kolocenok = count($massivocenok);
    for ($index = 0; $index < $kolocenok; $index++) {
        $summa += $massivocenok[$index];
    }
    echo 'Средний балл =', $summa / $kolocenok;
}
