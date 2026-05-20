<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php

  function factorial($n){
    if ($n==0) return 1;
    else return $n * factorial($n - 1);
  }

  echo "Результат вызова рекурсивной функции factorial с n = 10: " . factorial(10)
  ?>
</body>
</html>