<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 4-21</title>
</head>
<body>
    <h2>Вложенные функции и файлы</h2>
    <?php
    function vkl_func()
    {
        echo "Это напечатала включающая функция при её вызове!<br><br>";

        function vlog_func()
        {
            echo "Наша вложенная функция делает единственное:<br>";
            echo "печатает данный текст!<br><br>";
        }
    }

    vkl_func();
    vlog_func();

    echo "Переход ко второму примеру - использованию вложенных файлов.<br><br>";

    $R = 10.00;

    include("constanta_Pi.inc");

    /*
    function S_KRUGA($R)
    {
        $S = 2 * Pi * $R;
        return $S;
    }
    */

    include("func_S_Kruga.php");

    echo "Площадь круга с радиусом ", $R, " равна ", S_KRUGA($R), "<br>";
    ?>
</body>
</html>
