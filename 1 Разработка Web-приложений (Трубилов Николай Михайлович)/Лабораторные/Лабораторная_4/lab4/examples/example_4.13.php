<?php

function kakaya_pogoda($temperatura, $osadki)
{
    echo "Температура = ", "$temperatura </br>";
    echo "Осадки -  ", "$osadki </br>";
    if (($temperatura > 10 && $temperatura < 25) && (($osadki <> "снег")
  and ($osadki <> "дождь"))) {
        return true;
    }
    return false;
}

$gradus = 20;
if (kakaya_pogoda($gradus, "Нет")) {
    echo "Поэтому: Хорошая погода </br>";
} else {
    echo "Поэтому: Плохая погода </br>";
}

$gradus = - 10;
if (kakaya_pogoda($gradus, "снег")) {
    echo "Поэтому: Хорошая погода </br>";
} else {
    echo "Поэтому: Плохая погода </br>";
}

$gradus = 22;
if (kakaya_pogoda($gradus, "дождь")) {
    echo "Поэтому: Хорошая погода </br>";
} else {
    echo "Поэтому: Плохая погода </br>";
}
