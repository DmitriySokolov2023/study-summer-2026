<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.7</title>
</head>
<body>
<?php
$profit = 85000;// прибыль
$Pmin = 50000;// нижняя граница
$Pmax = 120000;// верхняя граница

$stavkaMin = 10;// %
$stavkaSrdn = 18;// %
$stavkaMax = 25;// %

if ($profit <= $Pmin) {
    $stavka = $stavkaMin;
} elseif ($profit > $Pmax) {
    $stavka = $stavkaMax;
} else {
    $stavka = $stavkaSrdn;
}

$nalog = $profit * $stavka / 100;

echo "<h3>Расчет налога по прибыли</h3>";
echo "Прибыль: $profit<br>";
echo "Pmin: $Pmin, Pmax: $Pmax<br>";
echo "Применяемая ставка: $stavka%<br>";
echo "Сумма налога: $nalog";
?>
</body>
</html>
