<?php
function externalFactorialRecursive($n)
{
    if (!is_int($n) || $n < 0) {
        return false;
    }

    if ($n === 0 || $n === 1) {
        return 1;
    }

    return $n * externalFactorialRecursive($n - 1);
}
