<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-12</title>
</head>

<body>
  <?php
  $desserts = array(
    "FruitCup" => array("calories" => "low",
      "served" => "cold",
      "preparation" => "10 minutes"),
    "Brownies" => array("calories" => "high",
      "served" => "piping hot",
      "preparation" => "45 minutes")
    );
  print_r($desserts);

  ?>

</body>

</html>