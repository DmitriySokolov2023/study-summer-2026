<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-15</title>
</head>

<body>
  <?php
    $i = 2;
  for (; ;) {
      if ($i >= 10) {
          break;
      }
      if ($i % 2 == 0) {
          echo "\$i = $i <br>";
      }
      $i++;
  }

  ?>
</body>

</html>