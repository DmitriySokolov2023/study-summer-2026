<?php

function &vozvrat_ssilki(&$argument)
{
    return $argument;
}
$value_star = 5;
echo "Старое значение: ", $value_star,"<br>";
$value_nov = &vozvrat_ssilki($value_star);
$value_nov++;
echo "Новое значение: ", $value_nov,"<br>";
