<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.15</title>
</head>
<body>
<?php
$eps = 0.000001;
$maxN = 30;

function relativeError($left, $right)
{
    if ($right == 0) {
        return abs($left - $right);
    }

    return abs($left - $right) / abs($right);
}

function firstNForAccuracy($maxN, $eps, $mode)
{
    for ($n = 1; $n <= $maxN; $n++) {
        $left = 0;

        if ($mode == "a") {
            for ($i = 1; $i <= $n; $i++) {
                $left += $i ** 3;
            }
            $right = ($n ** 2) * (($n + 1) ** 2) / 4;
        } elseif ($mode == "b") {
            for ($i = 1; $i <= $n; $i++) {
                $left += (2 * $i - 1) ** 2;
            }
            $right = $n * (4 * $n ** 2 - 1) / 3;
        } else {
            for ($i = 1; $i <= $n; $i++) {
                $left += (2 * $i - 1) ** 3;
            }
            $right = ($n ** 2) * (2 * $n ** 2 - 1);
        }

        $error = relativeError($left, $right);
        if ($error < $eps) {
            return [$n, $left, $right, $error];
        }
    }

    return [null, null, null, null];
}

list($nA, $leftA, $rightA, $errorA) = firstNForAccuracy($maxN, $eps, "a");
list($nB, $leftB, $rightB, $errorB) = firstNForAccuracy($maxN, $eps, "b");
list($nC, $leftC, $rightC, $errorC) = firstNForAccuracy($maxN, $eps, "c");

echo "<h3>Проверка равенств</h3>";
echo "eps = $eps<br>";
echo "Максимально проверяемое n = $maxN<br><br>";

echo "<b>а)</b> 1^3 + 2^3 + ... + n^3 = n^2 (n + 1)^2 / 4<br>";
echo "Первое n, при котором относительная погрешность меньше eps: $nA<br>";
echo "Левая часть = $leftA, правая часть = $rightA<br>";
echo "Относительная погрешность = $errorA<br><br>";

echo "<b>б)</b> 1^2 + 3^2 + 5^2 + ... + (2n - 1)^2 = n(4n^2 - 1) / 3<br>";
echo "Первое n, при котором относительная погрешность меньше eps: $nB<br>";
echo "Левая часть = $leftB, правая часть = $rightB<br>";
echo "Относительная погрешность = $errorB<br><br>";

echo "<b>в)</b> 1^3 + 3^3 + 5^3 + ... + (2n - 1)^3 = n^2(2n^2 - 1)<br>";
echo "Первое n, при котором относительная погрешность меньше eps: $nC<br>";
echo "Левая часть = $leftC, правая часть = $rightC<br>";
echo "Относительная погрешность = $errorC<br>";
?>
</body>
</html>
