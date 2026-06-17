<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Многомерный массив. Вариант 2</title>
</head>
<body>
<?php
$A = [
    [1, 2, 3],
    [4, 5, 6]
];

$m = count($A);
$n = count($A[0]);
$B = [];

for ($j = 0; $j < $n; $j++) {
    for ($i = 0; $i < $m; $i++) {
        $B[$j][$i] = $A[$i][$j];
    }
}

echo "<h3>Вариант 2. Транспонирование матрицы</h3>";
echo "<b>Матрица A:</b><br>";
for ($i = 0; $i < $m; $i++) {
    echo implode(" ", $A[$i]) . "<br>";
}

echo "<br><b>Транспонированная матрица:</b><br>";
for ($i = 0; $i < count($B); $i++) {
    echo implode(" ", $B[$i]) . "<br>";
}
?>
</body>
</html>
