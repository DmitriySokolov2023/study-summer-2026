<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вариант 2</title>
</head>
<body>
<?php
$a = [2, -1, 3];
$B = [5, 4, 1];
$A = [];

for ($i = 0; $i < count($a); $i++) {
    $A[$i] = $B[$i] - $a[$i];
}

echo "<h3>Вариант 2</h3>";
echo "Вектор a = {" . implode(", ", $a) . "}<br>";
echo "Точка B = (" . implode(", ", $B) . ")<br>";
echo "Точка A = (" . implode(", ", $A) . ")<br>";
?>
</body>
</html>
