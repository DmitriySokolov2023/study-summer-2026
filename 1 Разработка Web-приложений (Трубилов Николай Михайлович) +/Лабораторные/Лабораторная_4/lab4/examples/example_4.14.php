<?php


function VozvratIzmenMassiva($vhodn_massiv, $mnogit)
{
    $kolelementov = count($vhodn_massiv);
    for ($index = 0; $index < $kolelementov; $index++) {
        $vihodn_massiv[$index] = $vhodn_massiv[$index] * $mnogit;
    }
    return $vihodn_massiv;
}

$massiv = array(1,2,3,4,5);
$mnog1 = 2;
$massiv1 = VozvratIzmenMassiva($massiv, $mnog1);
echo "Результаты с первым множителем <br>";
$i = 0;
foreach ($massiv1 as $value) {
    echo "Значение элемента массива c индексом $i: $value <br>";
    $i++;
}

$mnog2 = 3;
$massiv2 = VozvratIzmenMassiva($massiv1, $mnog2);
echo "Результаты со вторым множителем <br>";
$i = 0;
foreach ($massiv2 as $value) {
    echo "Значение элемента массива c индексом $i: $value <br>";
    $i++;
}

list($firstelem, $secondelem) = VozvratIzmenMassiva($massiv, $mnog1);
echo "Результаты использования функции list <br>";
echo "Первый элемент изменённого массива = $firstelem <br>";
echo "Второй элемент изменённого массива = $secondelem <br>";
