<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Многомерный массив. Вариант 14</title>
</head>
<body>
<?php
$A = [
    [4, 7, 2],
    [1, 9, 5],
    [6, 3, 8],
    [2, 4, 1]
];

$p = 2;
$r = 2;
$m = count($A);
$n = count($A[0]);

$minInColumn = $A[0][$p - 1];
$sumBelowRow = 0;

for ($i = 0; $i < $m; $i++) {
    if ($A[$i][$p - 1] < $minInColumn) {
        $minInColumn = $A[$i][$p - 1];
    }
}

for ($i = $r; $i < $m; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $sumBelowRow += $A[$i][$j];
    }
}

echo "<h3>Вариант 14</h3>";
echo "<b>Матрица:</b><br>";
for ($i = 0; $i < $m; $i++) {
    echo implode(" ", $A[$i]) . "<br>";
}

echo "<br>Номер столбца p = $p<br>";
echo "Номер строки r = $r<br>";
echo "Минимальный элемент p-го столбца: $minInColumn<br>";
echo "Сумма элементов ниже r-й строки: $sumBelowRow<br>";
?>
</body>
</html>
