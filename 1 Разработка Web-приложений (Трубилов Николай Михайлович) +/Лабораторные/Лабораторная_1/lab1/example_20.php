<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.20</title>
</head>
<body>
<?php
$text = "  Hello PHP world  ";

echo "<h3>Исходный текст</h3>";
echo "Строка: '" . $text . "'<br><br>";

echo "<h3>Функции обработки текста</h3>";
echo "1) strlen: " . strlen($text) . "<br>";
echo "2) trim: '" . trim($text) . "'<br>";
echo "3) strtoupper: " . strtoupper(trim($text)) . "<br>";
echo "4) strtolower: " . strtolower(trim($text)) . "<br>";
echo "5) strpos('PHP'): " . strpos($text, "PHP") . "<br>";
echo "6) substr(2, 5): " . substr($text, 2, 5) . "<br>";
echo "7) str_replace('world', 'student'): " . str_replace("world", "student", trim($text)) . "<br>";

$words = explode(" ", trim($text)); // Разбиваем строку на слова
echo "8) explode: ";
print_r($words);
echo "<br>";

$newText = implode(" ", $words); // Собираем обратно через разделитель
echo "9) implode: " . $newText . "<br>";
?>
</body>
</html>
