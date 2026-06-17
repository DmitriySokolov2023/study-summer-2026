<?php

$a = 1;
function Test1()
{
    echo $a;
}
Test1();

$a = 100;
function Test2()
{
    $a = 70;
    echo "<h4>$a</h4>";
}
Test2();
echo "<h2>$a</h2>";

$a = 1;
$b = 2;
function Test3()
{
    global $a, $b;
    $b = $a + $b;
}
Test3();
echo $b, "<br>";
