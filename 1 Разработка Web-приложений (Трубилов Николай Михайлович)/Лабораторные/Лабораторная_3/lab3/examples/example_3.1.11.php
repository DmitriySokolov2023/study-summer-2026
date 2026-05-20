<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-11</title>
</head>

<body>
  <?php
  $ocenki1 ["Иванов"][] = 4;
  $ocenki1 ["Иванов"][] = 3;
  $ocenki1 ["Иванов"][] = 3;
  $ocenki1 ["Петров"][] = 3;
  $ocenki1["Петров"][] = 5;
  $ocenki1 ["Петров"][] = 5;
  $ocenki1 ["Сидоров"][] = 4;
  $ocenki1 ["Сидоров"][] = 3;
  $ocenki1 ["Сидоров"][] = 5;
  print_r($ocenki1);

  ?>

</body>

</html>