<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-10</title>
</head>
<body>  
  <?php
  $i = 1;
  while ($i < 10) {
      if ($i % 2 == 0) {
          echo "$i <br>";
      }
      $i++;
  }
  echo "<br>";
  $n = 1;
  while ($n < 10) {
      echo 'Значение $n = ' , $n, "<br>";
      $n *= 2;
  }
  $i = 1;
  $p = 2;
  while ($i < 32) {
      echo $p, " ";
      $p *= 2;
      $i++;
  }
  ?>
</body>
</html>