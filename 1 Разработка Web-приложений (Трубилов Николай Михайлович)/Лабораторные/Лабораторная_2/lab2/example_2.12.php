<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.12</title>
</head>
<body>
<?php
$A = 1000;
$m = 10;
$n = 120;
$k = 6;
$B = 2500;

$capital = $A;
$profit = $A * $m / 100;

for ($month = 1; $month <= $k; $month++) {
    $capital += $profit;
    $profit = $profit * $n / 100;
}

$capitalCheck = $A;
$profitCheck = $A * $m / 100;
$monthOverB = 0;
$month = 1;

while ($capitalCheck <= $B) {
    $capitalCheck += $profitCheck;
    if ($capitalCheck > $B) {
        $monthOverB = $month;
        break;
    }
    $profitCheck = $profitCheck * $n / 100;
    $month++;

    if ($month > 1000) {
        break;
    }
}

echo "<h3>Капитал предприятия</h3>";
echo "Начальный капитал A = $A тыс. руб.<br>";
echo "Первый месяц: прибыль $m% от A<br>";
echo "Каждый следующий месяц: $n% от прибыли предыдущего месяца<br>";
echo "Количество месяцев k = $k<br>";
echo "Порог B = $B тыс. руб.<br><br>";

echo "Общий капитал через $k месяцев: " . round($capital, 2) . " тыс. руб.<br>";

if ($monthOverB > 0) {
    echo "Капитал превысит $B тыс. руб. в месяце номер $monthOverB.";
} else {
    echo "За рассмотренный период капитал не превысил $B тыс. руб.";
}
?>
</body>
</html>
