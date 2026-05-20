<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.13</title>
</head>
<body>
<?php
date_default_timezone_set("Europe/Moscow");

$currentDate = date("d.m.Y");
$currentTime = date("h:i:s");

echo "Текущая дата: " . $currentDate . " года<br>";
echo "Текущее время: " . $currentTime . ".";
?>
</body>
</html>
