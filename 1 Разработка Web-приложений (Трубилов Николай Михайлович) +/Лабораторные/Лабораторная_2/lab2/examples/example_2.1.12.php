<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-12</title>
</head>

<body>
  <?php
    for ($i = 1; $i <= 9; $i++) {
        echo("<br> Умножение на $i <br>");
        for ($j = 1; $j <= 9; $j++) {
            $result = $i * $j;
            echo "$i X $j= $result <br>";
        }
    }

  ?>
</body>

</html>