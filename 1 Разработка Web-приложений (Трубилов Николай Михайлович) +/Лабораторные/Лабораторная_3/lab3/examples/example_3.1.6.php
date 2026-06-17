<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-6</title>
</head>

<body>
  <?php
$arr = array("яблоки","апельсины", "бананы",абрикосы);
  echo "Исходный массив <br>";
  print_r($arr);
  echo "<br>";
  sort($arr);
  echo "Отсортированный по возрастанию значений массив <br>";
  print_r($arr);
  echo "<br>";
  echo "Отсортированный по убыванию ключа массив <br>";
  krsort($arr);
  print_r($arr);
  echo "<br>";
  echo "Работаем с ассоциированным массивом";
  echo "<br>";
  $cvetfrukt ["красный"] = "яблоко";
  $cvetfrukt ["зелёный"] = "груша";
  $cvetfrukt ["оранжевый"] = "апельсин";
  $cvetfrukt ["жёлтый"] = "абрикос";
  echo "Исходный массив <br>";
  print_r($cvetfrukt);
  echo "<br>";
  asort($cvetfrukt);
  echo "Отсортированный по возрастанию значений массив <br>";
  print_r($cvetfrukt);
  echo "<br>";
  ksort($cvetfrukt);
  echo "Отсортированный по возрастанию ключа массив <br>";
  print_r($cvetfrukt);
  echo "<br>";

  ?>

</body>

</html>