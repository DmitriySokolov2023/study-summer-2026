<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.13.2</title>
</head>
<body>
<?php
$x = 0.5;
$n = 12;
$eps = 0.000001;

$sumN = 0.0;
$term = $x;
for ($i = 1; $i <= $n; $i++) {
    if ($i == 1) {
        $term = $x;
    } else {
        $term = $term * (-1) * $x * ($i - 1) / $i;
    }
    $sumN += $term;
}

$sumEps = 0.0;
$term = $x;
$i = 1;
while (abs($term) >= $eps) {
    $sumEps += $term;
    $i++;
    $term = $term * (-1) * $x * ($i - 1) / $i;
}

$standard = log(1 + $x);

echo "<h3>б) Ln(1 + x)</h3>";
echo "x = $x<br>";
echo "Сумма $n слагаемых: $sumN<br>";
echo "Сумма до eps = $eps: $sumEps<br>";
echo "Стандартная функция log(1 + x): $standard<br>";
?>
</body>
</html>
