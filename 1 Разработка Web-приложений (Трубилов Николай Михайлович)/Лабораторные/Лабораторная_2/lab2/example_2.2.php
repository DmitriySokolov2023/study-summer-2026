<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.2</title>
</head>
<body>
<?php
$num = 10;
$str1 = "25";
$str2 = "4.5";

echo "<h3>Операнды смешанного типа (числа и строки)</h3>";
echo "\$num = $num (" . gettype($num) . ")<br>";
echo "\$str1 = '$str1' (" . gettype($str1) . ")<br>";
echo "\$str2 = '$str2' (" . gettype($str2) . ")<br><br>";

echo "Сложение \$num + \$str1 = " . ($num + $str1) . "<br>";
echo "Вычитание \$str1 - \$num = " . ($str1 - $num) . "<br>";
echo "Умножение \$num * \$str2 = " . ($num * $str2) . "<br>";
echo "Деление \$str1 / \$str2 = " . ($str1 / $str2) . "<br>";
echo "Конкатенация \$num . \$str1 = " . ($num . $str1) . "<br>";
?>
</body>
</html>
