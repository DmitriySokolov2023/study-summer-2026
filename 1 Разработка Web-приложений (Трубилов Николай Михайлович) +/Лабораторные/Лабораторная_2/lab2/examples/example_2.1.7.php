<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-7</title>
</head>

<body>
  <?php
    $score = 4;
  if ($score == 5) {
      echo "Отлично";
  } else {
      if ($score == 4) {
          echo "Хорошо";
      } else {
          if ($score == 3) {
              echo "Удовлетворительно";
          } else {
              echo "Неудовлетворительно";
          }
      }
  }
  echo "<br>";
  $score = 2;
  if ($score == 5) {
      echo "Отлично";
  } elseif ($score == 4) {
      echo "Хорошо";
  } elseif ($score == 3) {
      echo "Удовлетворительно";
  } else {
      echo "Неудовлетворительно";
  }

  ?>
</body>

</html>