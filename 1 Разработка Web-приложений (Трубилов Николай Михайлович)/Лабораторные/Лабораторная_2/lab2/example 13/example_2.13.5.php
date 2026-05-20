<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.13.5</title>
</head>
<body>
<?php
$x = 0.5;
$m = 3;
$n = 12;
$eps = 0.000001;

$sumN = 1.0;
$term = 1.0;
for ($i = 1; $i <= $n; $i++) {
    $term = $term * ($m - $i + 1) * $x / $i;
    $sumN += $term;
}

$sumEps = 1.0;
$term = 1.0;
$i = 1;
do {
    $term = $term * ($m - $i + 1) * $x / $i;
    $sumEps += $term;
    $i++;
} while (abs($term) >= $eps && $i < 100);

$standard = pow(1 + $x, $m);

echo "<h3>д) (1 + x)^m</h3>";
echo "x = $x, m = $m<br>";
echo "Сумма $n слагаемых: $sumN<br>";
echo "Сумма до eps = $eps: $sumEps<br>";
echo "Стандартная функция pow(1 + x, m): $standard<br>";
?>
</body>
</html>
