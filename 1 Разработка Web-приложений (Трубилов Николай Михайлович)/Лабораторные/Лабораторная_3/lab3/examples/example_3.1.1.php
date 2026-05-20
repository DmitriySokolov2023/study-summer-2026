<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-1</title>
</head>
<body>
<?php
//1
  $frukt[] = "яблоко";
  $frukt[] = "груша";
  $frukt[2] = "слива";
  $frukt[4] = "абрикос";
  $frukt[] = "персик";
  echo "Первый элемент массива \$frukt[0]= $frukt[0] <br>";
  echo "Второй элемент массива  \$frukt[1]= $frukt[1] <br>";
  echo "Третий элемент массива  \$frukt[2]= $frukt[2] <br>";
  echo "Пятый элемент массива  \$frukt[4]= $frukt[4] <br>";
  echo "Шестой элемент массива  \$frukt[5]= $frukt[5] <br>";

//2
// $klient[0]= "Иванов";
  $klient[1]= "Петров";
  $klient[2]= "Сатин";
  $klient[3]= "Кожедуб";
  echo "Первый элемент массива \$klient[0]  = $klient[0] <br>";
  echo "Второй  элемент массива \$klient[1]  = $klient[1] <br>";
  
  $a = is_null($klient[0]);//
  echo "\$a = $a <br>";
  $klient[0]= "Иванов";
  echo "Первый элемент массива \$klient[0] = $klient[0] <br>";
  $a = is_null($klient[0]);
  echo "\$a = $a <br>";
  $klient[]= "Федотов";
  $klient[]= "Сидоров";
  echo "Пятый элемент массива \$klient[4] = $klient[4] <br>";
  echo "Шестой элемент массива \$klient[5] = $klient[5] <br>";

//3
  $klient['Москва'] = "Москвин";
  $klient["Рязань"] = "Рязанов";
  echo "Седьмой элемент массива \$klient = $klient[Москва] <br>";
  echo "Восьмой элемент массива \$klient = $klient[Рязань] <br>";
  $klient[7] = "Сапожников";
  echo "Девятый элемент массива \$klient = $klient[7] <br>";
  $kolelem = count($klient);
  echo "В массиве \$klient $kolelem элементов <br>";
//4
  $klient[-1] = "Фирсов";
  $kolelem = count($klient);
  echo "В массиве \$klient $kolelem элементов <br>";
  echo "\$klient[-1] = ". $klient[-1]."<br>" ;
//5
  $klient[8] = 150;
  echo "Одиннадцатый элемент массива \$klient = $klient[8] <br>";
 
  $tip = is_string($klient["Рязань"]);
  if($tip)
     echo 'Тип восьмого элемента $klient - строковый', "<br>";
  $c = is_integer($klient[8]);
  if($tip)
  echo 'Тип одиннадцатого элемента $klient - целый', "<br>";
?>

</body>
</html>