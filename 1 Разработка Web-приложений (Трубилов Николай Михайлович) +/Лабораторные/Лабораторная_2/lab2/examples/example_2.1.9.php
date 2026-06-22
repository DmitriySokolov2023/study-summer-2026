<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-9</title>
</head>

<body>
  <?php
  $value = 25;
  $value1 = 2;
  $tempr = 25;
  switch ($tempr) {
      case $value:
          echo "Температура = $tempr градусов по Цельсию. По-года приятная. <br>";
          break;
      case $value + $value1:
          echo 'Всё ещё приятная погода',"<br>";
          break;
      case 28:
          echo  'Становится теплее',"<br>";
          break;
      default:
          echo 'Температура вне заданных пределов',"<br>";
          break;
  }
  $tempr = 31;
  switch ($tempr) {
      case 24:
      case 25:
      case 26:
          echo 'Приятная погода',"<br>";
          break;
      case 27:
      case 28:
      case 29:
          echo 'Всё ещё приятная погода',"<br>";
          break;
      case 30:
      case 31:
      case 32:
          echo "Температура = $tempr градусов по Цельсию. Ста-новится жарковато. <br>";
          break;
      default:
          echo 'Температура вне заданных пределов!',"<br>";
          break;
  }

  ?>
</body>

</html>