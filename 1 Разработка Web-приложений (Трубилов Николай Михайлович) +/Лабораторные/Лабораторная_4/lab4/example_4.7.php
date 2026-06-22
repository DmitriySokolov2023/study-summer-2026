<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Задание 4.7</title>
</head>

<body>
  <?php
function gcdRecursive($a, $b, &$steps)
{
    $steps++;

    if ($b == 0) {
        return $a;
    }

    return gcdRecursive($b, $a % $b, $steps);
}

  $a = 252;
  $b = 105;
  $steps = 0;
  $gcd = gcdRecursive($a, $b, $steps);

  echo "<h3>Рекурсивная функция с неизвестным числом повторений</h3>";
  echo "Находим НОД чисел $a и $b алгоритмом Евклида.<br>";
  echo "Количество рекурсивных вызовов: $steps<br>";
  echo "НОД = $gcd<br>";
  ?>
</body>

</html>