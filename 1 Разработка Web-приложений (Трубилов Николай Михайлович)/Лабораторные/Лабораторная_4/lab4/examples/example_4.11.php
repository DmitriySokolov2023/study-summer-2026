<?php

echo "Работа функциии dobavlenie_teksta1 <br>";
function dobavlenie_teksta1($text)
{
    $text .= "прекрасна";
    echo $text,"<br>";
}
$stroka = "Жизнь ";
dobavlenie_teksta1($stroka);
echo $stroka,"<br>";
echo "Работа функции dobavlenie_teksta2 <br>";
function dobavlenie_teksta2(&$text)
{
    $text .= "прекрасна";
    echo $text,"<br>";
}
$stroka = "Жизнь ";
dobavlenie_teksta2($stroka);
echo $stroka,"<br>";
