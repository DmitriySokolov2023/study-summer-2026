<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-3</title>
</head>

<body>
  <?php
$arr = array("яблоки","апельсины", "бананы","груши");
  for ($i = 1; $i <= 3; $i++) {
      echo "Фрукт с индексом \$i = $i - $arr[$i] <br>";
  }

  foreach ($arr as $value) {
      echo "Текущий фрукт: $value <br>";
  }

  foreach ($arr as $i => $value) {
      echo "Фрукт с индексом \$i = $i - $arr[$i] <br>";
  }
  $photo = array("name" => "dog.jpg","size" => "130k","type" => "im-age/jpg");

  foreach ($photo as $value) {
      echo "Текущий элемент: $value <br>";
  }

  foreach ($photo as $j => $value) {
      echo "Элемент c индексом $j = $value <br>";
  }

  echo 'Использование функции  print_r()<br>';
  print_r($arr);
  echo'<br>';
  print_r($photo);
  echo'<br>';

  echo 'Использование функции  var_dump()<br>';
  var_dump($arr);
  echo'<br>';
  var_dump($photo);
  echo'<br>';

  ?>

</body>

</html>