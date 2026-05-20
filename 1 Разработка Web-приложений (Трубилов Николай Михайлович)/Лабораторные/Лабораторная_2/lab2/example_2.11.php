<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.11</title>
</head>
<body>
<?php
$way = "налево";

echo "<h3>Богатырь на распутье</h3>";
echo "Выбор богатыря: $way<br><br>";

if ($way == "налево") {
    echo "Пойдешь налево - получишь полцарства.";
} elseif ($way == "направо") {
    echo "Пойдешь направо - получишь коня.";
} elseif ($way == "прямо") {
    echo "Пойдешь прямо - найдешь принцессу.";
} else {
    echo "Трусливым ничего не светит!";
}
?>
</body>
</html>
