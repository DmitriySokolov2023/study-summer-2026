<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вариант 16</title>
</head>
<body>
<?php
function scalarProduct($x, $y)
{
    $sum = 0;
    for ($i = 0; $i < count($x); $i++) {
        $sum += $x[$i] * $y[$i];
    }
    return $sum;
}

function vectorLength($x)
{
    $sum = 0;
    for ($i = 0; $i < count($x); $i++) {
        $sum += $x[$i] * $x[$i];
    }
    return sqrt($sum);
}

function buildVector($start, $end)
{
    $result = [];
    for ($i = 0; $i < count($start); $i++) {
        $result[$i] = $end[$i] - $start[$i];
    }
    return $result;
}

function midpoint($p1, $p2)
{
    $result = [];
    for ($i = 0; $i < count($p1); $i++) {
        $result[$i] = ($p1[$i] + $p2[$i]) / 2;
    }
    return $result;
}

function angleBetween($u, $v)
{
    $cosValue = scalarProduct($u, $v) / (vectorLength($u) * vectorLength($v));
    $cosValue = max(-1, min(1, $cosValue));
    return rad2deg(acos($cosValue));
}

$A = [1, 1];
$B = [6, 2];
$C = [3, 7];

$Mbc = midpoint($B, $C);
$Mac = midpoint($A, $C);
$Mab = midpoint($A, $B);

$medianA = buildVector($A, $Mbc);
$medianB = buildVector($B, $Mac);
$medianC = buildVector($C, $Mab);

$angleAB = angleBetween($medianA, $medianB);
$angleAC = angleBetween($medianA, $medianC);
$angleBC = angleBetween($medianB, $medianC);

echo "<h3>Вариант 16</h3>";
echo "A = (" . implode(", ", $A) . ")<br>";
echo "B = (" . implode(", ", $B) . ")<br>";
echo "C = (" . implode(", ", $C) . ")<br><br>";
echo "Медиана из A = {" . implode(", ", $medianA) . "}<br>";
echo "Медиана из B = {" . implode(", ", $medianB) . "}<br>";
echo "Медиана из C = {" . implode(", ", $medianC) . "}<br><br>";
echo "Угол между медианами из A и B = " . round($angleAB, 4) . " град.<br>";
echo "Угол между медианами из A и C = " . round($angleAC, 4) . " град.<br>";
echo "Угол между медианами из B и C = " . round($angleBC, 4) . " град.<br>";
?>
</body>
</html>
