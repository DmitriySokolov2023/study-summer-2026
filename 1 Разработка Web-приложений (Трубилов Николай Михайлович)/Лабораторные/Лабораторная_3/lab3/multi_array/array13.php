<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Многомерный массив. Вариант 13</title>
</head>
<body>
<?php
$A = [
    [3, -2, 5, 0],
    [7, 1, -4, 2],
    [-1, 6, 8, 4]
];

$p = 2;
$m = count($A);
$n = count($A[0]);

$minPositive = null;
$productNonNegative = 1;
$hasNonNegative = false;

for ($i = 0; $i < $m; $i++) {
    for ($j = 0; $j < $n; $j++) {
        if ($j < $p - 1) {
            if ($A[$i][$j] > 0 && ($minPositive === null || $A[$i][$j] < $minPositive)) {
                $minPositive = $A[$i][$j];
            }
        } else {
            if ($A[$i][$j] >= 0) {
                $productNonNegative *= $A[$i][$j];
                $hasNonNegative = true;
            }
        }
    }
}

echo "<h3>Вариант 13</h3>";
echo "<b>Матрица:</b><br>";
for ($i = 0; $i < $m; $i++) {
    echo implode(" ", $A[$i]) . "<br>";
}

echo "<br>Номер столбца p = $p<br>";
echo "Минимальный положительный элемент слева от p-го столбца: ";
echo $minPositive !== null ? $minPositive : "не найден";
echo "<br>Произведение неотрицательных элементов в остальной части матрицы: ";
echo $hasNonNegative ? $productNonNegative : 0;
echo "<br>";
?>
</body>
</html>
