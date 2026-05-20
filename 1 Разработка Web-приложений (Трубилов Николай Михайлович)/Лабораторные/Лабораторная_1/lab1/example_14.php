<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.14</title>
</head>
<body>
<?php
$a = 10;
$b = 25;

echo "<h3>Исходные значения</h3>";
echo "\$a = $a, \$b = $b<br>";
echo "Сложение: " . ($a + $b) . "<br>";
echo "Конкатенация: " . ($a . $b) . "<br><br>";

echo "<h3>Удаляем переменную \$a</h3>";
unset($a);

echo "Проверка isset(\$a): " . (isset($a) ? "true" : "false") . "<br>";
echo "Проверка isset(\$b): " . (isset($b) ? "true" : "false") . "<br>";

echo "<h3>Проверка операций после удаления \$a</h3>";
echo "Сложение: " . ($a + $b) . "<br>";
echo "Конкатенация: " . ($a . $b) . "<br><br>";

echo "<h3>Удаляем переменную \$b</h3>";
unset($b);

echo "<h3>Проверка операций после удаления \$b</h3>";
echo "Сложение: " . ($a + $b) . "<br>";
echo "Конкатенация: " . ($a . $b) . "<br><br>";

?>
</body>
</html>
