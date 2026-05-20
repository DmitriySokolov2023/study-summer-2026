<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    echo "<h3>Пример 1-7</h3>";
    $apples = 4;
    $fruitname = "apples";
    echo "Число яблок равно ", $$fruitname;
    echo "<br>";
    $oranges = 3;
    $fruitname = "oranges"; 
    echo "Число апельсинов равно ${$fruitname}";

    echo "<h3>Пример 1-8</h3>";
    define("pi",3.14159265350);
    echo " <br>",pi;
    echo "<br>";
    define("CONSTANT", "Hello world.");
    echo CONSTANT; 
    echo "<br>";
    echo Constant; 
    echo "<br>"
  ?>

</body>
</html>