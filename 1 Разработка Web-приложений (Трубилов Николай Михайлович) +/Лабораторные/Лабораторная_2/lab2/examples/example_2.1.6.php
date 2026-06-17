<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-6</title>
</head>

<body>
  <?php
    $min = 4;
  if ($min > 3) {
      echo 'Ваше время истекло! <br>';
      echo 'Пожалуйста, положите трубку. <br>';
  }
  $temperatura = 25;
  if ($temperatura < 30) {
      echo "Отличный денёк <br>";
  }
  $temperatura = 30;
  if ($temperatura >= 25) {
      if ($temperatura <= 30) {
          echo 'Ещё не очень жарко <br>';
      }
  }
  if (($temperatura >= 25) && ($temperatura <= 28)) {
      echo 'Комфортная температура, <br>';
  } else {
      echo 'Температура некомфортна, <br>';
  }

  ?>
</body>

</html>