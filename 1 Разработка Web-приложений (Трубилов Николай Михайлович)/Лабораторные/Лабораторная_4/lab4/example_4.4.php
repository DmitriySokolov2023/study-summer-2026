<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4.4</title>
</head>
<body>
<?php
function expSeries($x, $n)
{
    if (!is_numeric($x) || !is_int($n) || $n < 0) {
        return false;
    }

    $sum = 1.0;
    $term = 1.0;
    for ($i = 1; $i <= $n; $i++) {
        $term = $term * $x / $i;
        $sum += $term;
    }

    return $sum;
}

function lnOnePlusXSeries($x, $n, &$result, &$errorText)
{
    if (!is_numeric($x) || $x <= -1 || $x >= 1 || !is_int($n) || $n <= 0) {
        $errorText = 'Ошибка: для ln(1 + x) должно выполняться -1 < x < 1, n > 0.';
        return false;
    }

    $result = 0.0;
    $term = $x;
    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1) {
            $term = $x;
        } else {
            $term = $term * (-1) * $x * ($i - 1) / $i;
        }
        $result += $term;
    }

    return true;
}

function cosSeries($x, $n = 10)
{
    if (!is_numeric($x) || !is_int($n) || $n < 0) {
        return false;
    }

    $sum = 1.0;
    $term = 1.0;
    for ($i = 1; $i <= $n; $i++) {
        $term = $term * (-1) * $x * $x / ((2 * $i - 1) * (2 * $i));
        $sum += $term;
    }

    return $sum;
}

function sinSeries($x, $eps, &$steps)
{
    if (!is_numeric($x) || !is_numeric($eps) || $eps <= 0) {
        return false;
    }

    $sum = $x;
    $term = $x;
    $steps = 1;

    do {
        $term = $term * (-1) * $x * $x / ((2 * $steps) * (2 * $steps + 1));
        $sum += $term;
        $steps++;
    } while (abs($term) >= $eps);

    return $sum;
}

function atanSeriesFromArray($params, &$result)
{
    if (!isset($params['x'], $params['n']) || !is_numeric($params['x']) || !is_int($params['n']) || abs($params['x']) >= 1) {
        return false;
    }

    $x = $params['x'];
    $n = $params['n'];
    $result = 0.0;
    $term = $x;

    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1) {
            $term = $x;
        } else {
            $term = $term * (-1) * $x * $x * (2 * $i - 3) / (2 * $i - 1);
        }
        $result += $term;
    }

    return true;
}

$x = 0.5;
$n = 10;
$eps = 0.000001;
$lnResult = 0;
$lnError = '';
$sinSteps = 0;
$atanResult = 0;

echo "<h3>Пять алгоритмов в виде функций с обработкой ошибок</h3>";
echo "x = $x, n = $n, eps = $eps<br><br>";

echo "1. e^x = " . expSeries($x, $n) . "<br>";

if (lnOnePlusXSeries($x, $n, $lnResult, $lnError)) {
    echo "2. ln(1 + x) = $lnResult<br>";
} else {
    echo $lnError . "<br>";
}

echo "3. cos(x) = " . cosSeries($x, $n) . "<br>";
echo "4. sin(x) = " . sinSeries($x, $eps, $sinSteps) . " (шагов: $sinSteps)<br>";

if (atanSeriesFromArray(['x' => $x, 'n' => $n], $atanResult)) {
    echo "5. arctg(x) = $atanResult<br>";
} else {
    echo "Ошибка в вычислении arctg(x)<br>";
}
?>
</body>
</html>
