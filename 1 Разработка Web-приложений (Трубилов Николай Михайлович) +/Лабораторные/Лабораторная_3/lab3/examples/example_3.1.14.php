<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-14</title>
</head>

<body>
  <?php
echo("<pre>");
  $frukt ["яблоко"] = 40;
  $frukt ["апельсины"] = 45;
  $frukt ["груши"] = 70;
  $ovochi ["картошка"] = 30;
  $ovochi ["морковь"] = 35;
  echo "массив \$frukt,<br>";
  print_r($frukt);
  echo "массив \$ovochi,<br>";
  print_r($ovochi);
  $obchMassiv = $frukt + $ovochi;
  echo "массив \$obchMassiv,<br>";
  print_r($obchMassiv);
  if ($frukt == $ovochi) {
      echo "Массив \$frukt равен массиву \$ovochi <br>";
  } else {
      echo "Массив \$frukt не равен массиву \$ovochi <br>";
  }

  ?>

</body>

</html>