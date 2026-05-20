<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вариант 14</title>
</head>
<body>
<?php
function addVectors($x, $y)
{
    $result = [];
    for ($i = 0; $i < count($x); $i++) {
        $result[$i] = $x[$i] + $y[$i];
    }
    return $result;
}

function subVectors($x, $y)
{
    $result = [];
    for ($i = 0; $i < count($x); $i++) {
        $result[$i] = $x[$i] - $y[$i];
    }
    return $result;
}

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

$a = [3, 1];
$b = [1, 2];

$c = addVectors($a, $b);
$d = subVectors($a, $b);

$cosValue = scalarProduct($c, $d) / (vectorLength($c) * vectorLength($d));
$cosValue = max(-1, min(1, $cosValue));
$angleRad = acos($cosValue);
$angleDeg = rad2deg($angleRad);

echo "<h3>Вариант 14</h3>";
echo "Вектор a = {" . implode(", ", $a) . "}<br>";
echo "Вектор b = {" . implode(", ", $b) . "}<br>";
echo "Диагональ c = a + b = {" . implode(", ", $c) . "}<br>";
echo "Диагональ d = a - b = {" . implode(", ", $d) . "}<br><br>";
echo "Угол между диагоналями (в радианах) = " . round($angleRad, 4) . "<br>";
echo "Угол между диагоналями (в градусах) = " . round($angleDeg, 4) . "<br>";
?>
</body>
</html>
