<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-16</title>
</head>

<body>
  <?php
  echo 'Использование оператора continue',"<br>";
  $value = 1;
  for ($value = -2; $value < 3; $value++) {
      if ($value == 0) {
          continue;
      }
      echo "1 / $value = ", 1 / $value, "<br>";
  }

  ?>
</body>

</html>