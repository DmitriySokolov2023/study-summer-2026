<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.7</title>
</head>
<body>
<?php
$a = 10;
$b = 15.7;
$c = "Привет";
$d = true;
$e = null;
$f = array(1, 2, 3);

echo "<h3>Определение типа через gettype()</h3>";
echo '$a = 10, тип: ' . gettype($a) . "<br>";
echo '$b = 15.7, тип: ' . gettype($b) . "<br>";
echo '$c = "Привет", тип: ' . gettype($c) . "<br>";
echo '$d = true, тип: ' . gettype($d) . "<br>";
echo '$e = null, тип: ' . gettype($e) . "<br>";
echo '$f = array(1,2,3), тип: ' . gettype($f) . "<br><br>";

echo "<h3>Проверка конкретного типа через функции is_*</h3>";
echo 'is_integer($a): ' . (is_integer($a) ? 'true' : 'false') . "<br>";
echo 'is_float($b): ' . (is_float($b) ? 'true' : 'false') . "<br>";
echo 'is_string($c): ' . (is_string($c) ? 'true' : 'false') . "<br>";
echo 'is_bool($d): ' . (is_bool($d) ? 'true' : 'false') . "<br>";
echo 'is_null($e): ' . (is_null($e) ? 'true' : 'false') . "<br>";
echo 'is_array($f): ' . (is_array($f) ? 'true' : 'false') . "<br><br>";

echo "<h3>Пример, когда проверка не проходит</h3>";
echo 'is_int($b): ' . (is_integer($b) ? 'true' : 'false') . "<br>";
echo 'is_string($a): ' . (is_string($a) ? 'true' : 'false') . "<br>";
?>
</body>
</html>
