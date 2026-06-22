<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.21</title>
</head>
<body>
<?php
echo "<h3>1. Неявное преобразование (автоматически)</h3>";
$a = "10"; // строка
$b = 5; // число
$sum = $a + $b; // строка "10" преобразуется в число 10
echo "\$a = '$a' (" . gettype($a) . "), \$b = $b (" . gettype($b) . ")<br>";
echo "\$a + \$b = $sum (" . gettype($sum) . ")<br><br>";

echo "<h3>2. Явное преобразование (через приведение типа)</h3>";
$x = 15.9;
$xInt = (int)$x; // дробная часть отбрасывается
$xStr = (string)$x; // число в строку
echo "\$x = $x (" . gettype($x) . ")<br>";
echo "(int)\$x = $xInt (" . gettype($xInt) . ")<br>";
echo "(string)\$x = '$xStr' (" . gettype($xStr) . ")<br><br>";

echo "<h3>3. Преобразование строки в число</h3>";
$s1 = "25";
$s2 = "25abc";
$n1 = (int)$s1;
$n2 = (int)$s2; // берется числовая часть в начале строки
echo "\$s1 = '$s1' -> (int) = $n1<br>";
echo "\$s2 = '$s2' -> (int) = $n2<br><br>";

echo "<h3>4. Преобразование в boolean</h3>";
$v1 = 0;
$v2 = 100;
$v3 = "";
$v4 = "text";
echo "(bool)0 = " . ((bool)$v1 ? "true" : "false") . "<br>";
echo "(bool)100 = " . ((bool)$v2 ? "true" : "false") . "<br>";
echo "(bool)'' = " . ((bool)$v3 ? "true" : "false") . "<br>";
echo "(bool)'text' = " . ((bool)$v4 ? "true" : "false") . "<br><br>";

echo "<h3>5. Преобразование null</h3>";
$n = null;
echo "\$n = null (" . gettype($n) . ")<br>";
echo "(int)\$n = " . (int)$n . "<br>";
echo "(string)\$n = '" . (string)$n . "'<br>";
?>
</body>
</html>
