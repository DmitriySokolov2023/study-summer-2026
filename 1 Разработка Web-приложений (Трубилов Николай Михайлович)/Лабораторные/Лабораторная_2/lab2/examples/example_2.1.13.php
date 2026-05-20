<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-13</title>
</head>

<body>
  <?php
    echo "Начинает работать пример №1 <br>";
  $t = 0;
  for ($i = 0,$j = 1; $t <= 4; $i++, $j++) {
      $t = $i + $j;
      echo "\$t= $t, <br>";
  }
  echo "\$i = $i, \$j = $j, \$t = $t, <br>";
  echo "Начинает работать пример №2 <br>";
  for ($i = 0, $j = 0, $k = "Test" . ": = "; $i < 10;$i++) {
      $k = $k . ".";
  }
  echo $k;
  echo "<br>";
  echo 'Далее - результаты работы программы с телом кода в { } <br>';
  for ($i = 0, $j = 0, $k = "Test" . ": = "; $i < 10;$i++) {
      $k = $k . ".";
      echo "\$k равно $k <br>";
  }
  echo $k;

  ?>
</body>

</html>