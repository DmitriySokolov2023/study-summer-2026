<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-13</title>
</head>

<body>
  <?php
  echo("<pre>");
  $spisokStud = array("Иванов","Петров","Сидоров","Васин");
  $chisloStud = count($spisokStud);
  $spisokPredm = array("история","алгебра","физика");
  $chisloPredm = count($spisokPredm);

  $min = 2;
  $max = 5;
  echo "Число студентов = ",$chisloStud,", число предметов = ",$chisloPredm,"<br>";

  for ($vheshIndex = 0; $vheshIndex < $chisloStud; $vheshIndex++) {
      $i = $spisokStud [$vheshIndex];

      for ($vnutrIndex = 0; $vnutrIndex < $chisloPredm; $vnutrIndex++) {
          $j = $spisokPredm[$vnutrIndex];

          $ocenki [$i] [$j] = rand($min, $max);
      }
  }
  print_r($ocenki);

  foreach ($ocenki as $l => $odnomernMas) {
      foreach ($odnomernMas as $m => $otmetka) {
          echo "\$ocenki[$l][$m] = $otmetka <br>";
      }
  }

  ?>

</body>

</html>