<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.13.3</title>
</head>
<body>
<?php
$x = 0.5;
$n = 12;
$eps = 0.000001;

$sumN = 1.0;
$term = 1.0;
for ($i = 1; $i <= $n; $i++) {
    $term = $term * (-1) * $x * $x / ((2 * $i - 1) * (2 * $i));
    $sumN += $term;
}

$sumEps = 1.0;
$term = 1.0;
$i = 1;
do {
    $term = $term * (-1) * $x * $x / ((2 * $i - 1) * (2 * $i));
    $sumEps += $term;
    $i++;
} while (abs($term) >= $eps);

$standard = cos($x);

echo "<h3>в) cos(x)</h3>";
echo "x = $x<br>";
echo "Сумма $n слагаемых: $sumN<br>";
echo "Сумма до eps = $eps: $sumEps<br>";
echo "Стандартная функция cos(x): $standard<br>";
?>
</body>
</html>
