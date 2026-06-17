<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Многомерный массив. Вариант 16</title>
</head>

<body>
  <?php
$A = [
    [2, -3, 0, 4],
    [-1, 5, -6, 7],
    [0, -2, 8, -9],
    [3, 0, -4, 1]
];

  $rowsToChange = [1, 3];
  $m = count($A);

  echo "<h3>Вариант 16</h3>";

  echo "<b>Исходная матрица:</b><br>";
  for ($i = 0; $i < count($A); $i++) {
      echo implode(" ", $A[$i]) . "<br>";
  }

  foreach ($rowsToChange as $rowNumber) {
      $rowIndex = $rowNumber - 1;
      if ($rowIndex >= 0 && $rowIndex < $m) {
          for ($j = 0; $j < count($A[$rowIndex]); $j++) {
              if ($A[$rowIndex][$j] < 0) {
                  $A[$rowIndex][$j] = -1;
              } elseif ($A[$rowIndex][$j] > 0) {
                  $A[$rowIndex][$j] = 1;
              }
          }
      }
  }

  echo "Преобразуем строки: " . implode(", ", $rowsToChange) . "<br><br>";
  echo "<b>Полученная матрица:</b><br>";
  for ($i = 0; $i < count($A); $i++) {
      echo implode(" ", $A[$i]) . "<br>";
  }
  ?>
</body>

</html>