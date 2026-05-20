<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.5</title>
</head>
<body>
<?php
$count = rand(1, 19); 

if ($count <= 19) {
    
    if ($count % 2 == 0) {
        $symbol = "*";
    } else {
        $symbol = "?";
    }

    echo "Случайное число: $count<br>";
    echo "Вывод символов: ";
    for ($i = 1; $i <= $count; $i++) {
        echo $symbol;
    }
} else {
    echo "Число больше 19, вывод не выполняется.";
}
?>
</body>
</html>
