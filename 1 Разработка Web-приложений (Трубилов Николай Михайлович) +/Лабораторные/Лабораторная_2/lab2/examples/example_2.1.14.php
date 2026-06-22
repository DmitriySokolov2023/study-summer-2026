<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-14</title>
</head>

<body>
  <?php
    for ($i = 0; ; $i++) {
        if ($i >= 10) {
            break;
        }
        if ($i % 2 == 0) {
            echo "\$i = $i <br>";
        }

    }
  echo "Выход из цикла по оператору break";
  $x = 5;
  echo " Начальное значение \$x перед входом в цикл равно $x  <br>";
  for (; ; $x += 2) {
      echo "\$x = $x  <br>";
      if ($x == 15) {
          break;
      }
  }
  echo "Выход из цикла по оператору break <br>";


  $x = 7;
  echo " Начальное значение \$x перед входом в цикл равно $x  <br>";
  for (; ; $x += 2) :
      echo "\$x = $x  <br>";
      if ($x == 17) :
          break;
      endif;
  endfor;
  echo "Выход из цикла по оператору break <br>"

  ?>
</body>

</html>