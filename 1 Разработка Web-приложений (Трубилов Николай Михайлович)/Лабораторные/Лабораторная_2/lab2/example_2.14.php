<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.14</title>
</head>
<body>
<?php
$eps = 0.000001;

$product = 1.0;
$piPrev = 0.0;
$k = 0;

do {
    $k++;
    $factor = (2 * $k) * (2 * $k) / ((2 * $k - 1) * (2 * $k + 1));
    $product *= $factor;
    $piCurrent = 2 * $product;
    $difference = abs($piCurrent - $piPrev);
    $piPrev = $piCurrent;
} while ($difference >= $eps);

echo "<h3>Вычисление числа pi</h3>";
echo "Малое число eps = $eps<br>";
echo "Количество пар сомножителей k = $k<br>";
echo "Приближенное значение pi = $piCurrent<br>";
echo "Разность |pi(k) - pi(k-1)| = $difference<br>";
echo "Стандартное значение pi = " . pi() . "<br>";
?>
</body>
</html>
