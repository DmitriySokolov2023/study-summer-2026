<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-11</title>
</head>

<body>
  <?php
    for ($i = 0; $i < 3; $i++) {
        echo "$i, Привет  ";
    }
  echo "<br>";
  for ($i = 1; $i < 1 + 2; $i++) {
      echo "$i, Привет  ";
  }
  echo "<br>";
  $j = 1;
  $k = 2;
  $l = 2;
  for ($i = $l; $i < $j + $k; $i++) {
      echo "$i,  Привет  ";
  }
  echo "<br>";
  for ($i = 3; $i > 0; $i--) {
      echo "$i, Привет  ";
  }

  ?>
</body>

</html>