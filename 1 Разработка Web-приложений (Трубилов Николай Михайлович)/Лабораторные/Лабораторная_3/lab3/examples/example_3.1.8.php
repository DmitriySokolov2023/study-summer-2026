<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-8</title>
</head>

<body>
  <?php
  $beginning = 'foo';
  $end = array(1 => 'bar');
  $result = array_merge((array)$beginning, (array)$end);
  print_r($result);

  ?>

</body>

</html>