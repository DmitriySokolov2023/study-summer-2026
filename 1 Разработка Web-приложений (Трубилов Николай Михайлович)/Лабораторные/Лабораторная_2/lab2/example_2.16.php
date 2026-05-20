<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.16</title>
</head>
<body>
<?php
$a = 6;
$x = 25;
$eps = 0.000001;

$yPrev = $a;
$n = 0;

do {
    $yCurrent = 0.5 * ($yPrev + $x / $yPrev);
    $n++;
    $difference = abs(($yCurrent * $yCurrent) - ($yPrev * $yPrev));
    $yPrev = $yCurrent;
} while ($difference >= $eps);

echo "<h3>Поиск первого члена последовательности</h3>";
echo "a = $a<br>";
echo "x = $x<br>";
echo "eps = $eps<br><br>";

echo "Номер найденного члена n = $n<br>";
echo "Значение y(n) = $yCurrent<br>";
echo "|y(n)^2 - y(n-1)^2| = $difference<br>";
?>
</body>
</html>
