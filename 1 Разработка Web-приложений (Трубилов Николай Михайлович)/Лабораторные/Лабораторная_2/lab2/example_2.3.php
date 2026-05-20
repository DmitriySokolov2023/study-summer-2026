<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.3</title>
</head>
<body>
<?php
echo "<h3>Преобразование типов через settype()</h3>";
$a = "30";
$b = "6";

echo "До settype: \$a = '$a' (" . gettype($a) . "), \$b = '$b' (" . gettype($b) . ")<br>";
settype($a, "integer");
settype($b, "integer");
echo "После settype: \$a = $a (" . gettype($a) . "), \$b = $b (" . gettype($b) . ")<br>";
echo "Сложение: " . ($a + $b) . "<br>";
echo "Вычитание: " . ($a - $b) . "<br>";
echo "Умножение: " . ($a * $b) . "<br>";
echo "Деление: " . ($a / $b) . "<br><br>";

echo "<h3>Преобразование типов через стандартное приведение</h3>";
$c = "18.5";
$d = "2";

echo "До приведения: \$c = '$c' (" . gettype($c) . "), \$d = '$d' (" . gettype($d) . ")<br>";
$cNum = (float)$c;
$dNum = (int)$d;
echo "После приведения: \$cNum = $cNum (" . gettype($cNum) . "), \$dNum = $dNum (" . gettype($dNum) . ")<br>";
echo "Сложение: " . ($cNum + $dNum) . "<br>";
echo "Вычитание: " . ($cNum - $dNum) . "<br>";
echo "Умножение: " . ($cNum * $dNum) . "<br>";
echo "Деление: " . ($cNum / $dNum) . "<br>";
echo "Конкатенация: " . ($cNum . $dNum) . "<br>";
?>
</body>
</html>
