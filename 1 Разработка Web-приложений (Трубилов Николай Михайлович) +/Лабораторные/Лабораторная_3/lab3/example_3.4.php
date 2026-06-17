<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Задание 3.4</title>
</head>

<body>
  <?php
$photo = [
    "name" => "dog.jpg",
    "size" => "130k",
    "type" => "image/jpeg",
    "description" => "Фотография моей собаки"
];

  echo "<h3>Анализ скрипта</h3>";
  echo "Старый скрипт выводит все пары ключ - значение ассоциативного массива photo.<br>";
  echo "Функция each() использовалась для перебора массива, но в современных версиях PHP она удалена.<br><br>";

  echo "<b>Результат работы эквивалентного скрипта:</b><br>";
  foreach ($photo as $key => $value) {
      echo $key . " - " . $value . "<br>";
  }
  ?>
</body>

</html>