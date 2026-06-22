<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-4</title>
</head>

<body>
  <?php
    $a = "Жизнь";
  echo "\$a = " , $a,  "<br>";
  echo "\$b = \$a . \"прекрасна \" <br>";
  $b = $a . " прекрасна";
  echo "Теперь \$b = ", $b , "<br>";
  $b .= " и удивительна";
  echo "Теперь \$b = ", $b , "<br>";
  ?>

</body>

</html>