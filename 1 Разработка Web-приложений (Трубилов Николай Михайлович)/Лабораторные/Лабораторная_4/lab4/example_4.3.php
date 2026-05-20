<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4.3</title>
</head>
<body>
<?php
require_once __DIR__ . '/factorial_rec_lib.php';

function internalFactorialRecursive($n)
{
    if (!is_int($n) || $n < 0) {
        return false;
    }

    if ($n === 0 || $n === 1) {
        return 1;
    }

    return $n * internalFactorialRecursive($n - 1);
}

$number = 6;
$internal = internalFactorialRecursive($number);
$external = externalFactorialRecursive($number);

echo "<h3>Рекурсивный факториал</h3>";
echo "Число n = $number<br>";
echo "Внутренняя функция: $internal<br>";
echo "Внешняя функция: $external<br>";
?>
</body>
</html>
