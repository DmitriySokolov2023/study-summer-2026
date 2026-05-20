<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Многомерный массив. Вариант 10</title>
</head>

<body>
  <?php
$A = [
    [5, 2, 3],
    [5, 7, 1],
    [5, 5, 2]
];

  $n = count($A);
  $product = 1;
  $hasNonZero = false;
  $maxDiagonal = $A[0][0];

  for ($i = 0; $i < $n; $i++) {
      if ($A[$i][$i] > $maxDiagonal) {
          $maxDiagonal = $A[$i][$i];
      }

      for ($j = 0; $j < $n; $j++) {
          if ($i > $j && $A[$i][$j] != 0) {
              $product *= $A[$i][$j];
              $hasNonZero = true;
          }
      }
  }

  echo "<h3>Вариант 10</h3>";
  echo "<b>Матрица:</b><br>";
  for ($i = 0; $i < $n; $i++) {
      echo implode(" ", $A[$i]) . "<br>";
  }

  echo "<br>Произведение ненулевых элементов ниже главной диагонали: ";
  echo $hasNonZero ? $product : 0;
  echo "<br>Максимальный элемент главной диагонали: $maxDiagonal<br>";
  ?>
</body>

</html>