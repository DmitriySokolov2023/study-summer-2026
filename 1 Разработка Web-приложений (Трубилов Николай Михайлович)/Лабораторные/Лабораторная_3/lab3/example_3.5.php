<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3.5</title>
</head>
<body>
<?php
$album = [
    [
        "name" => "mom.jpg",
        "person" => "Мама",
        "place" => "Москва",
        "year" => 2022
    ],
    [
        "name" => "dad.jpg",
        "person" => "Папа",
        "place" => "Сочи",
        "year" => 2021
    ],
    [
        "name" => "sister.jpg",
        "person" => "Сестра",
        "place" => "Казань",
        "year" => 2023
    ],
    [
        "name" => "grandma.jpg",
        "person" => "Бабушка",
        "place" => "Нижний Новгород",
        "year" => 2020
    ],
    [
        "name" => "brother.jpg",
        "person" => "Брат",
        "place" => "Санкт-Петербург",
        "year" => 2024
    ]
];

echo "<h3>Цифровой семейный фотоальбом</h3>";
foreach ($album as $photo) {
    echo "Файл: " . $photo["name"] . "<br>";
    echo "Кто на фото: " . $photo["person"] . "<br>";
    echo "Место: " . $photo["place"] . "<br>";
    echo "Год: " . $photo["year"] . "<br><br>";
}
?>
</body>
</html>
