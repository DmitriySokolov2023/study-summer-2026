<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пример 3-2</title>
</head>

<body>
  <?php
  $zoopark = array('волк', 'тигр',"медведь","страус");
  echo $zoopark[0],"<br>";
  echo $zoopark[2],"<br>";
  echo $zoopark[3],"<br>";

  $goroda = array(3 => "Москва",4 => "Самара",5 => "Арзамас");

  echo $goroda[2],"<br>";
  echo $goroda[3],"<br>";
  echo $goroda[5],"<br>";

  $photo = array("name" => "dog.jpg", "size" => "130k","type" => "imajpg");
  echo $photo['name'],"<br>";
  echo $photo["size"],"<br>";
  echo $photo["size"],"<br>";
  echo $photo['size'],"<br>";
  echo $photo['NamE'],"<br>";
  echo "Конец работы";

  ?>

</body>

</html>