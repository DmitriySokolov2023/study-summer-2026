<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.6</title>
</head>
<body>
<?php
$l1 = true;
$l2 = false;
$l3 = true;

echo "<h3>Логические переменные</h3>";
echo "\$l1 = " . ($l1 ? "true" : "false") . "<br>";
echo "\$l2 = " . ($l2 ? "true" : "false") . "<br>";
echo "\$l3 = " . ($l3 ? "true" : "false") . "<br><br>";

$expr1 = $l1 && $l2;
$expr2 = $l1 || $l2;
$expr3 = !$l2 && $l3;
$expr4 = ($l1 && $l3) || $l2;
$expr5 = !($l1 || $l3);

echo "1) \$l1 && \$l2: " . ($expr1 ? "истина" : "ложь") . "<br>";
echo "2) \$l1 || \$l2: " . ($expr2 ? "истина" : "ложь") . "<br>";
echo "3) !\$l2 && \$l3: " . ($expr3 ? "истина" : "ложь") . "<br>";
echo "4) (\$l1 && \$l3) || \$l2: " . ($expr4 ? "истина" : "ложь") . "<br>";
echo "5) !(\$l1 || \$l3): " . ($expr5 ? "истина" : "ложь") . "<br>";
?>
</body>
</html>
