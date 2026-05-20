<?php

function func1()
{
    echo "Тестирование функции func1 <br>";
    $num_args = func_num_args();
    echo "Число аргументов =  $num_args <br>";
}
func1(1, 2, 3);

function func2()
{
    echo "Тестирование функции func2 <br>";
    $num_args = func_num_args();
    echo "Число аргументов = $num_args <br>";
    if ($num_args > 4) {
        echo "$num_args","-й аргумент равен: ", func_get_arg(3), "<br>";
    }
}
func2("a", 2, 3, "мир");

function func3()
{
    echo "Тестирование функции func3 <br>";
    $num_args = func_num_args();
    $arg_list = func_get_args();
    for ($i = 0; $i < $num_args; $i++) {
        echo "Аргумент $i равен: " . $arg_list[$i] . "<br>";
    }
}
func3(1, 2, 3, 7, 9);

function soedinenie()
{
    echo "Тестирование функции soedinenie <br>";
    $text = "";

    $list_arg = func_get_args();

    $kol_arg = func_num_args();

    for ($k = 0; $k < $kol_arg; $k++) {
        $text .= $list_arg[$k]."  ";
    }
    return $text;
}
echo soedinenie("Маша", "+"),"<br>";
echo soedinenie("Маша", "+", "Вася"),"<br>";
echo soedinenie("Маша", "+", "Вася", " = любовь"),"<br>";
