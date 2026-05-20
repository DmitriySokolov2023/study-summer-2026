<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3.2</title>
</head>
<body>
<?php
$numbers = [7, 3, 12, 5, 9];

echo "<h3>Основные алгоритмы работы с массивами</h3>";

echo "<b>1. Создание и вывод элементов массива</b><br>";
echo "Массив: ";
print_r($numbers);
echo "<br><br>";

echo "<b>2. Суммирование элементов массива</b><br>";
$sum = array_sum($numbers);
echo "Сумма элементов = $sum<br><br>";

echo "<b>3. Поиск максимального и минимального элементов</b><br>";
$max = max($numbers);
$min = min($numbers);
$maxIndex = array_search($max, $numbers);
$minIndex = array_search($min, $numbers);
echo "Максимальный элемент = $max, индекс = $maxIndex<br>";
echo "Минимальный элемент = $min, индекс = $minIndex<br><br>";

echo "<b>4. Сортировка элементов массива</b><br>";
$sorted = $numbers;
sort($sorted);
echo "Отсортированный массив: ";
print_r($sorted);
echo "<br><br>";

echo "<b>5. Работа с двумя массивами</b><br>";
$arr1 = [1, 2, 3, 4, 5];
$arr2 = [4, 5, 6, 7, 8];

echo "Первый массив: ";
print_r($arr1);
echo "<br>";
echo "Второй массив: ";
print_r($arr2);
echo "<br><br>";

$common = array_values(array_intersect($arr1, $arr2));
$onlyFirst = array_values(array_diff($arr1, $arr2));
$onlySecond = array_values(array_diff($arr2, $arr1));
$union = array_values(array_unique(array_merge($arr1, $arr2)));

echo "Есть и в первом, и во втором: ";
print_r($common);
echo "<br>";
echo "Есть в первом, но отсутствуют во втором: ";
print_r($onlyFirst);
echo "<br>";
echo "Есть во втором, но отсутствуют в первом: ";
print_r($onlySecond);
echo "<br>";
echo "Есть или в первом, или во втором: ";
print_r($union);
?>
</body>
</html>
