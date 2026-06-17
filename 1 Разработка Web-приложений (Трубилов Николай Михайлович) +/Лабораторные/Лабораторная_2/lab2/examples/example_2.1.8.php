<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-8</title>
</head>

<body>
  <?php
    $score = 86;
  if ($score > 92) {
      $grade = "A";
      $message = "Отлично";
  } elseif ($score <= 92 and $score > 83) {
      $grade = "B";
      $message = "Хорошо";
  } elseif ($score <= 92 and $score > 83) {
      $grade = "B";
      $message = "Хорошо";
  } elseif ($score <= 83 and $score > 74) {
      $grade = "C";
      $message = "Удовлетворительно";
  } elseif ($score <= 74 and $score > 62) {
      $grade = "D";
      $message = "неудовлетворительно";
  } else {
      $grade = "F";
      $message = "Хуже некуда!";
  }
  echo "Оценка =  $message,  Уровень= $grade";

  ?>
</body>

</html>