<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.13.7</title>
</head>
<body>
<?php
$x = 0.5;
$n = 12;
$eps = 0.000001;

$sumN = $x;
$term = $x;
for ($i = 1; $i <= $n; $i++) {
    $term = $term * ((2 * $i - 1) * (2 * $i - 1) * $x * $x) / ((2 * $i) * (2 * $i + 1));
    $sumN += $term;
}

$sumEps = $x;
$term = $x;
$i = 1;
do {
    $term = $term * ((2 * $i - 1) * (2 * $i - 1) * $x * $x) / ((2 * $i) * (2 * $i + 1));
    $sumEps += $term;
    $i++;
} while (abs($term) >= $eps);

$standard = asin($x);

echo "<h3>ж) arcsin(x)</h3>";
echo "x = $x<br>";
echo "Сумма $n слагаемых: $sumN<br>";
echo "Сумма до eps = $eps: $sumEps<br>";
echo "Стандартная функция asin(x): $standard<br>";
?>
</body>
</html>
