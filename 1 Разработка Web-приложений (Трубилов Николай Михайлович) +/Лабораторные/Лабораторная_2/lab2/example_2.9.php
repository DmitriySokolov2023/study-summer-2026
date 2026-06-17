<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.9</title>
</head>
<body>
<?php
$count = 5;

echo "<h3>Открывание матрешек</h3>";

while ($count > 0) {
    echo "Открываем матрешку номер $count.<br>";
    $count--;

    if ($count > 0) {
        echo "Осталось открыть матрешек: $count<br><br>";
    } else {
        echo "Все матрешки раскрыты.<br>";
    }
}
?>
</body>
</html>
