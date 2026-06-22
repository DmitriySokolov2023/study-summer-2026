<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    echo "<h3>Пример 1-14</h3>";
    $large_number =  2147483647;
    var_dump($large_number);

    $large_number =  2147483648;
    var_dump($large_number);


    var_dump(0x80000000);

    $million = 1000000;
    $large_number =  50000 * $million;
    var_dump($large_number);

    echo "<h3>Пример 1-15</h3>";
    $foo = "5bar"; 
    if(gettype($foo)=="string")
      echo 'Сейчас тип $foo - строковый и $foo='."$foo";
      echo "<br>";
      settype($foo, "integer"); 
    if(gettype($foo)=="integer")
      echo 'После преобразования тип $foo - целый и $foo ='."$foo";
      echo "<br>";
      echo 'Работа с переменной $bar';
    $bar = true; 
    echo "<br>";
    if(gettype($bar)=="boolean")
      echo 'Сейчас тип $bar - логический и $bar='."$bar".'-то есть ИСТИНА';
      echo "<br>";
      settype($bar, "float");
      echo 'После преобразования тип $bar= ';
      echo(gettype($bar).", то есть вещественный".' и $bar= '."$bar");
      echo "<br>";
      settype($bar, "double");
      echo 'После преобразования тип $bar= ';
      echo(gettype($bar).",то есть тоже вещественный".' и $bar= '."$bar");
      echo "<br>";
      settype($bar, "string"); 
      echo 'После преобразования тип $bar= ';
      echo(gettype($bar).", то есть строковый".' и $bar= '."$bar");
      echo "<br>";
      settype($bar, "integer");
      echo 'После преобразования тип $bar= ';
      echo(gettype($bar).",то есть целый".' и $bar= '."$bar");
      echo "<br>";

    echo "<h3>Пример 1-16</h3>";

    $email = "mailname@mail.ru";
    $domain = strstr($email, "@");
    // $domain = strstr($email, ord("@"));
    echo "Значение " . $domain;

    echo "<h3>Пример 1-17</h3>";
    $str1 = "Привет!";
    $str2 = "привет!";
    if(!strcasecmp($str1, $str2))
      echo "$str1 == $str2 при сравнении строк без учета регистра";

    echo "<h3>Пример 1-18</h3>";
    $string = "Hello, world!!!";
    $string_len = strlen($string);
    echo ($string_len);
 


?>

</body>
</html>