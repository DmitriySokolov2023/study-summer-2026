<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-4</title>
</head>

<body>
  <?php
  $ovochi[0] = "картофель";
  $ovochi[1] = "капуста";
  $ovochi[2] = "морковь";
  print_r($ovochi);
  echo "<br>";
  echo "Текущий овощ: " , current($ovochi),"<br>";
  echo "Следующий овощ: " , next($ovochi),"<br>";
  echo "Предыдущий овощ: ", prev($ovochi),"<br>";
  echo "Последний овощ: ", end($ovochi),"<br>";
  echo "Сброс указателя.<br>";
  reset($ovochi);
  echo "Текущий овощ: ", current($ovochi),"<br>";

  echo "<br>";
  $denrozden = array("Иванов" => "1970-03-11",
                     "Петров" => "1990-05-20",
                     "Сидоров" => "1975-06-29");

  for (reset($denrozden);($k = key($denrozden));next($denrozden)) {
      echo "$k родился {$denrozden[$k]}<br>";
  }

  for (end($denrozden);($k = key($denrozden));prev($denrozden)) {
      echo "$k родился {$denrozden[$k]}<br>";
  }

  ?>

</body>

</html>