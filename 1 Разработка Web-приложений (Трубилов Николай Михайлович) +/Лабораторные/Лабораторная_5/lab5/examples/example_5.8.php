<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.8</title>
</head>
<body>
    <?php
    chdir(dirname(__FILE__));

    echo "Печать пути до текущего каталога (каталога выполняемого скрипта):<br>";
    $putTekKataloga = getcwd();
    print_r($putTekKataloga);
    echo "<br>";

    $handle = opendir(".");
    echo "Указатель текущего каталога (каталога скрипта) = ", $handle, "<br>";
    echo "<br>";
    closedir($handle);

    $putNovKataloga = dirname(__FILE__) . "/catalog_demo";
    echo "Начало работы с новым каталогом $putNovKataloga<br>";

    $path = $putNovKataloga;
    $handle = opendir($path);
    echo "Указатель нового каталога = ", $handle, "<br>";
    echo "Печать установленного пути до нового текущего каталога:<br>";
    print_r($path);
    echo "<br>";

    chdir($path);
    $putTekKataloga = getcwd();
    echo "Печать пути до вновь установленного текущего каталога:<br>";
    print_r($putTekKataloga);
    echo "<br>";

    echo "Проверка правильности пути до каталога: функция is_dir(\$path) возвращает ", is_dir($path), "<br>";
    echo "Начало опробования различных вариантов распечатки элементов каталога $putNovKataloga<br>";

    if (!is_dir($path)) {
        echo "Дорожка до файла была неверной";
    } else {
        $kolElementovKataloga = 0;
        $i = 0;
        echo "Распечатка элементов каталога простым перебором<br>";
        echo "Это не вполне верное решение!!<br>";
        while ($imElementa = readdir($handle)) {
            $i++;
            echo "Номер элемента каталога = $i; Элемент = $imElementa<br>";
        }
        $kolElementovKataloga = $i;
        echo "Число элементов в каталоге $putNovKataloga равно $kolElementovKataloga<br>";
    }

    echo "<br>";
    rewinddir($handle);

    echo 'Распечатка элементов каталога "правильным" способом', "<br>";
    $kolElementovKataloga = 0;
    while (($imElementa = readdir($handle)) !== false) {
        echo "$imElementa <br>";
        $kolElementovKataloga = $kolElementovKataloga + 1;
    }
    echo "Количество элементов в каталоге $path равно $kolElementovKataloga<br>";
    echo "<br>";

    rewinddir($handle);
    echo 'Распечатка каталога без двух элементов: "." и ".."', "<br>";
    $i = 0;
    $kolElementovKataloga = 0;
    while (($imElementa = readdir($handle)) !== false) {
        if ($imElementa != "." && $imElementa != "..") {
            $i++;
            $kolElementovKataloga = $kolElementovKataloga + 1;
            echo "Номер элемента каталога = $i; Элемент = $imElementa<br>";
        }
    }
    echo "Количество элементов в каталоге $path без двух первых равно $kolElementovKataloga<br>";

    closedir($handle);
    ?>
</body>
</html>
