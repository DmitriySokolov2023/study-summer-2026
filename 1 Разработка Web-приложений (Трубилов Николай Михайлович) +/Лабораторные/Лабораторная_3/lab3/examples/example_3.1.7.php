<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-7</title>
</head>

<body>
  <?php
$ovochi[0] = "картофель";
  $ovochi[1] = "капуста";
  $ovochi[2] = "морковь";
  echo 'Строка из массива и обратно <br>';
  $text = implode(",", $ovochi);
  echo "Строки, полученные из массива: ","<br>";
  echo $text,"<br>";
  $text = implode(",! ", $ovochi);
  echo $text,"<br>";
  echo "Обратное преобразование <br>";
  $строка = "картофель,Федяморковь,Федяогурцы";
  echo 'Исходная строка:   ',$строка,"<br>";
  $ovochi = explode(",Федя", $строка);
  echo "Итоговый массив <br>";
  print_r($ovochi);

  ?>

</body>

</html>