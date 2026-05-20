<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.13.10</title>
</head>
<body>
<?php
$x = 0.8;
$n = 12;
$eps = 0.000001;
$q = ($x - 1) / $x;

$sumN = 0.0;
$term = $q;
for ($i = 1; $i <= $n; $i++) {
    if ($i == 1) {
        $term = $q;
    } else {
        $term = $term * $q * ($i - 1) / $i;
    }
    $sumN += $term;
}

$sumEps = 0.0;
$term = $q;
$i = 1;
while (abs($term) >= $eps) {
    $sumEps += $term;
    $i++;
    $term = $term * $q * ($i - 1) / $i;
}

$standard = log($x);

echo "<h3>к) Ln(x)</h3>";
echo "x = $x<br>";
echo "Сумма $n слагаемых: $sumN<br>";
echo "Сумма до eps = $eps: $sumEps<br>";
echo "Стандартная функция log(x): $standard<br>";
?>
</body>
</html>
