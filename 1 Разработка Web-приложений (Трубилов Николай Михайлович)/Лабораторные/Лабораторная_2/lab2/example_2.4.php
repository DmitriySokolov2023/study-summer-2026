<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Задание 2.4</title>
</head>

<body>
  <?php

$withData = true;

  if ($withData) {
      $surname = "Соколов";
      $name = "Дмитрий";
      $patronymic = "Александрович";
  }

  echo "<h3>Проверка ФИО (оператор ИЛИ)</h3>";

  if (
      !isset($name) || !isset($surname) || !isset($patronymic) ||
      $name === "" || $surname === "" || $patronymic === ""
  ) {
      echo "Данные не определены. Пожалуйста, введите имя, фамилию и отчество.";
  } else {
      echo "Все данные записаны: $surname $name $patronymic.<br>";
      echo "Спасибо!";
  }
  ?>
</body>

</html>