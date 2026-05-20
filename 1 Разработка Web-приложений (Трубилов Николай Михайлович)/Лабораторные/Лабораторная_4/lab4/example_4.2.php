<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4.2</title>
</head>
<body>
<?php
require_once __DIR__ . '/factorial_iter_lib.php';

function internalFactorialIterative($n)
{
    if (!is_int($n) || $n < 0) {
        return false;
    }

    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}

$number = 6;
$internal = internalFactorialIterative($number);
$external = externalFactorialIterative($number);

echo "<h3>Итеративный факториал</h3>";
echo "Число n = $number<br>";
echo "Внутренняя функция: $internal<br>";
echo "Внешняя функция: $external<br>";
?>
</body>
</html>
