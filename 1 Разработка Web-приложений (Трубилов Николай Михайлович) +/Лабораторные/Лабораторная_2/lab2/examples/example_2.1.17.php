<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 2-17</title>
</head>

<body>
  <?php
    $arr = array("яблоки","апельсины", "бананы");
  foreach ($arr as $value) {
      echo "Текущий фрукт: $value <br>";
  }
  $menu = array("pasta", "steak", "potatoes", "fish", "fries");
  foreach ($menu as $item) {
      echo "Текущий продукт: $item <br>";
  }

  ?>
</body>

</html>