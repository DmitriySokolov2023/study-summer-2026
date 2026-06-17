<?php

$c = 10;
$d = 20;
function Test4()
{
    $GLOBALS["d"] = $GLOBALS["c"] + $GLOBALS["d"];
}
Test4();
echo $d, "<br>";
