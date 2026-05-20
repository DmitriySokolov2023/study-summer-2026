<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 4-23</title>
</head>

<body>
    <h2>Итеративная и рекурсивная функции</h2>
    <?php
    function reverse_i($stroka)
    {
        $dlinaStroki = strlen($stroka);
        $obrStroka = "";

        for ($i = 1; $i <= $dlinaStroki; $i = $i + 1) {
            $obrStroka = $obrStroka . substr($stroka, -$i, 1);
        }

        return $obrStroka;
    }

    $ishodnStroka = "kot";
    echo "Исходная строка для обращения: $ishodnStroka <br>";

    echo "Результат обращения исходной строки с использованием итеративной функции: ";
    echo reverse_i($ishodnStroka), "<br>";

    function reverse_r($stroka)
    {
        $dlinaStroki = strlen($stroka);
        $obrStroka = "";

        if ($dlinaStroki > 0) {
            $obrStroka = reverse_r(substr($stroka, 1)) . substr($stroka, 0, 1);
        }

        return $obrStroka;
    }


    echo "Результат обращения исходной строки с использованием рекурсивной функции: ";
    echo reverse_r($ishodnStroka);
    ?>
</body>

</html>