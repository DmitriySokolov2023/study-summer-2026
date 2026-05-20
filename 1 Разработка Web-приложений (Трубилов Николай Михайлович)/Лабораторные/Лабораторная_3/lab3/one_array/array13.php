<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вариант 13</title>
</head>
<body>
<?php
function distance($p1, $p2)
{
    $sum = 0;
    for ($i = 0; $i < count($p1); $i++) {
        $sum += ($p2[$i] - $p1[$i]) * ($p2[$i] - $p1[$i]);
    }
    return sqrt($sum);
}

$A = [1, 2];
$B = [4, 1];
$C = [6, 4];
$E = [];
$D = [];

for ($i = 0; $i < count($A); $i++) {
    $E[$i] = ($A[$i] + $C[$i]) / 2;
    $D[$i] = 2 * $E[$i] - $B[$i];
}

$diagAC = distance($A, $C);
$diagBD = distance($B, $D);

echo "<h3>Вариант 13</h3>";
echo "A = (" . implode(", ", $A) . ")<br>";
echo "B = (" . implode(", ", $B) . ")<br>";
echo "C = (" . implode(", ", $C) . ")<br>";
echo "Точка пересечения диагоналей E = (" . implode(", ", $E) . ")<br>";
echo "Четвертая вершина D = (" . implode(", ", $D) . ")<br><br>";
echo "Длина диагонали AC = " . round($diagAC, 4) . "<br>";
echo "Длина диагонали BD = " . round($diagBD, 4) . "<br>";
?>
</body>
</html>
