<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-9</title>
</head>

<body>
  <?php
echo("<pre>");
  echo("Использование функции list() <//Применение функции list
br>");
  $ovochi = array('картошка','морковь','свёкла');
  echo("Исходный массив \$ovochi : <br>");
  print_r($ovochi);
  list($first, $second) = $ovochi;
  echo(" Результат применения функции  list(\$first,\$second) = \$ovochi: <br>");
  echo "\$first = $first,  ",  "\$second = $second" , "<br>";
  echo "<br>";

  echo("Использование функции extract()");
  $fruct["good"] = "яблоко";
  $fruct["better"] = "груша";
  $fruct["best"] = "персик";
  echo "<br>";
  echo("Исходный массив \$fruct : <br>");
  print_r($fruct);
  extract($fruct);
  echo "Новые переменные: <br>";
  echo "\$good = $good <br>";
  echo "\$better= $better <br>";
  echo "\$best= $best <br>";
  echo '<br>';

  echo("Использование функции array_list <br>");
  echo 'Пример №1 - Подмассив, выделенный из $fruct <br>';
  $podmassiv = array_slice($fruct, 1, 2);
  print_r($podmassiv);
  echo("Пример №2 на использование функции array_list <br>");
  $directors = array( "Alfred Hitchcock", "Stanley Kubrick", "Martin Scorsese", "Fritz Lang");
  echo("Исходный массив: <br>");
  print_r($directors);

  echo("Результат №1 - извлечение без сохранения индексов <br>");
  print_r(array_slice($directors, 1, 2));

  echo("Результат №2 - извлечение с сохранением индексов <br>");
  //print_r( array_slice( $directors, 1, 2, true ) );
  print_r(array_slice($directors, 1, 2, true));

  echo '<br>';

  echo("Использование функции array_merge <br>");
  echo 'Пример №1 слияния массивов',"<br>";
  $fruct1 = array("абрикос","нектарин","лимон");
  echo 'Первый исходный массив $fruct, второй исходный массив $fruct1:<br>';
  print_r($fruct1);
  $novmassivsl = array_merge($fruct, $fruct1);
  echo 'Результат слияния массивов $fruct и $fruct1:',"<br>";
  foreach ($novmassivsl as $el) {
      echo "Элемент массива: $el <br>";
  }
  echo '<br>';

  echo 'Пример №2 слияния массивов',"<br>";
  $array1 = array("color" => "red", 2, 4);
  $array2 = array("a", "b", "color" => "green", "shape" => "trape-zoid", 4);
  echo 'Первый исходный массив $array1:<br>';
  print_r($array1);
  echo '<br>';
  echo 'Второй исходный массив $array2:<br>';
  print_r($array2);
  echo '<br>';
  echo 'Пример №2 слияния массивов, результат:',"<br>";
  $result = array_merge($array1, $array2);
  print_r($result);
  echo '<br>';
  echo 'Пример №3 слияния массивов',"<br>";
  $array2 = array(1 => "data");
  echo 'Первый исходный массив - $array1; Второй исходный мас-сив $array2:<br>';
  print_r($arr2);
  echo 'Результат слияния массивов:',"<br>";
  $result = array_merge($array1, $array2);
  print_r($result);

  echo("Использование функции сравнения массивов: array_diff - нахождение различающихся по значениям элементов <br>");
  $arr1 = array("a" => "green", "red", "blue", "red");
  $arr2 = array("b" => "green", "yellow", "red");
  echo 'Первый исходный массив $arr1:<br>';
  print_r($arr1);
  echo 'Второй исходный массив $arr2:<br>';
  print_r($arr2);
  $result = array_diff($arr1, $arr2);
  echo 'Результат сравнения -  массив $rezult:',"<br>";
  print_r($result);
  echo("Использование функции сравнения массивов: array_diff_assoc - нахождение элементов, различающихся и значения-ми, и индексами <br>");
  echo 'Пример №1,<br>';
  $arr1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
  echo 'Первый исходный массив $arr1:<br>';
  print_r($arr1);
  $arr2 = array("a" => "green", "yellow", "red");
  echo 'Второй исходный массив $arr2:<br>';
  print_r($arr2);
  $result1 = array_diff_assoc($arr1, $arr2);
  echo 'Результат сравнения -  массив $rezult1:',"<br>";
  print_r($result1);
  echo 'Пример №2,<br>';
  $array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
  $array2 = array("a" => "green", "yellow", "red");
  echo 'Первый исходный массив $arr2:<br>';
  print_r($arr2);
  echo 'Второй исходный массив $array1:<br>';
  print_r($array1);
  $result2 = array_diff_assoc($arr2, $array1);
  echo 'Результат сравнения -  массив $rezult2:',"<br>";
  print_r($result2);

  ?>

</body>

</html>