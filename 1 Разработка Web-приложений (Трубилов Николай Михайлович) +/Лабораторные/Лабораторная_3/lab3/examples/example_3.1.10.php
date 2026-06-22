<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-10</title>
</head>

<body>
  <?php
echo("<pre>");
  $ocenki ["Иванов"]["история"] = 4;
  $ocenki ["Иванов"]["алгебра"] = 3;
  $ocenki ["Иванов"]["физика"] = 3;
  $ocenki ["Петров"]["история"] = 3;
  $ocenki ["Петров"]["алгебра"] = 5;
  $ocenki["Петров"]["физика"] = 5;
  $ocenki ["Сидоров"]["история"] = 4;
  $ocenki ["Сидоров"]["алгебра"] = 3;
  $ocenki ["Сидоров"]["физика"] = 5;
  print_r($ocenki);

  ?>

</body>

</html>