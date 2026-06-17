<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-5</title>
</head>

<body>
  <?php
$arr = array("яблоки","апельсины", "бананы",абрикосы);
  $kolelem = count($arr);
  echo "Исходное число элементов = $kolelem <br>";
  unset($arr[0]);
  $kolelem = count($arr);
  echo "Число элементов после удаления одного элемента = $kolelem <br>";
  for ($index = 0; $index <= $kolelem; $index++) {
      echo "Индекс = $index,Текущий фрукт: $arr[$index] <br>";
  }

  $arr[2] = "";
  // $kolelem = count($arr);

  $kolelem = sizeof($arr);
  echo "Число элементов после вставки пустой строки = $kolelem <br>";
  //echo "$kolelem <br>";
  for ($index = 0; $index <= $kolelem; $index++) {
      echo "Индекс = $index,Текущий фрукт: $arr[$index] <br>";
  }

  foreach ($arr as $value) {
      echo "Текущий фрукт: $value <br>";
  }

  ?>

</body>

</html>