<?php
function externalFactorialIterative($n)
{
    if (!is_int($n) || $n < 0) {
        return false;
    }

    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}
