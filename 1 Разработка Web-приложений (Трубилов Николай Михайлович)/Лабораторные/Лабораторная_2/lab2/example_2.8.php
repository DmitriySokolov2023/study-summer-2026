<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.8</title>
</head>
<body>
<?php
$a1 = 2;
$d = 3;
$maxSum = 100;

echo "<h3>Сумма членов арифметической прогрессии</h3>";
echo "Первый член: $a1<br>";
echo "Разность: $d<br>";
echo "Максимальная сумма: $maxSum<br><br>";

echo "<h4>1. Цикл while</h4>";
$term = $a1;
$sum = 0;
while ($sum + $term <= $maxSum) {
    $sum += $term;
    echo "Добавили $term, сумма = $sum<br>";
    $term += $d;
}

echo "<br><h4>2. Цикл do...while</h4>";
$term = $a1;
$sum = 0;
do {
    if ($sum + $term > $maxSum) {
        break;
    }
    $sum += $term;
    echo "Добавили $term, сумма = $sum<br>";
    $term += $d;
} while (true);

echo "<br><h4>3. Цикл for</h4>";
$sum = 0;
for ($term = $a1; $sum + $term <= $maxSum; $term += $d) {
    $sum += $term;
    echo "Добавили $term, сумма = $sum<br>";
}
?>
</body>
</html>
