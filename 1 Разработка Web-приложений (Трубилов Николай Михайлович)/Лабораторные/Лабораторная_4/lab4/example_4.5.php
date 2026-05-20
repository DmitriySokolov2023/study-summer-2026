<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4.5</title>
</head>
<body>
<?php
function powerSeries($x, $m, $n)
{
    $sum = 1.0;
    $term = 1.0;
    for ($i = 1; $i <= $n; $i++) {
        $term = $term * ($m - $i + 1) * $x / $i;
        $sum += $term;
    }
    return $sum;
}

function arcsinSeries($x, $n, &$result)
{
    $result = $x;
    $term = $x;
    for ($i = 1; $i <= $n; $i++) {
        $term = $term * ((2 * $i - 1) * (2 * $i - 1) * $x * $x) / ((2 * $i) * (2 * $i + 1));
        $result += $term;
    }
}

function inverseRootSeries($x, $n = 10)
{
    $sum = 1.0;
    $term = 1.0;
    for ($i = 1; $i <= $n; $i++) {
        $term = $term * (-(2 * $i - 1) * $x * $x) / (2 * $i);
        $sum += $term;
    }
    return $sum;
}

function expMinusXSeries($x, $n, &$terms)
{
    $sum = 1.0;
    $term = 1.0;
    $terms = [];
    for ($i = 1; $i <= $n; $i++) {
        $term = $term * (-1) * $x / $i;
        $sum += $term;
        $terms[] = $term;
    }
    return $sum;
}

function lnXSeries($x, $n)
{
    $q = ($x - 1) / $x;
    $sum = 0.0;
    $term = $q;
    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1) {
            $term = $q;
        } else {
            $term = $term * $q * ($i - 1) / $i;
        }
        $sum += $term;
    }
    return $sum;
}

$x = 0.5;
$m = 3;
$n = 10;
$xLn = 0.8;
$arcsinResult = 0;
$terms = [];

arcsinSeries($x, $n, $arcsinResult);
$expMinus = expMinusXSeries($x, $n, $terms);

echo "<h3>Еще пять алгоритмов в виде функций</h3>";
echo "1. (1 + x)^m = " . powerSeries($x, $m, $n) . "<br>";
echo "2. arcsin(x) = $arcsinResult<br>";
echo "3. 1 / sqrt(1 + x^2) = " . inverseRootSeries($x, $n) . "<br>";
echo "4. e^(-x) = $expMinus<br>";
echo "5. ln(x) = " . lnXSeries($xLn, $n) . "<br>";
?>
</body>
</html>
