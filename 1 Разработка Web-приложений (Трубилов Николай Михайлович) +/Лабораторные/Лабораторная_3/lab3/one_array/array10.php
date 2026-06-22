<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вариант 10</title>
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

$a = [2, 1, -1];
$b = [1, 2, 3];

$ab = scalarProduct($a, $b);
$lenA = vectorLength($a);
$lenB = vectorLength($b);

$projBOnA = $ab / $lenA;
$projAOnB = $ab / $lenB;

echo "<h3>Вариант 10</h3>";
echo "Вектор a = {" . implode(", ", $a) . "}<br>";
echo "Вектор b = {" . implode(", ", $b) . "}<br>";
echo "(a, b) = $ab<br>";
echo "|a| = " . round($lenA, 4) . "<br>";
echo "|b| = " . round($lenB, 4) . "<br><br>";
echo "pr_a b = " . round($projBOnA, 4) . "<br>";
echo "pr_b a = " . round($projAOnB, 4) . "<br>";
?>
</body>
</html>
