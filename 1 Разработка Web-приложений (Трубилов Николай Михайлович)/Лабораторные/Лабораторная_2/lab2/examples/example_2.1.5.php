<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-5</title>
</head>

<body>
  <?php
    $c = 1 & 5;
  echo $c, "<br>";
  $a = 1;
  $b = 5;
  $c = $a & $b;
  echo $c, "<br>";
  $c = $a | $b;
  echo $c, "<br>";
  $c = $a ^ $b;
  echo $c, "<br>";
  $c = ~ $a;
  echo $c, "<br>";
  $c = $a << $b;
  echo $c, "<br>";
  $c = $a >> $b;
  echo $c, "<br>";
  echo "12" ^ "9";
  echo "hallo" ^ "hello";

  ?>
</body>

</html>