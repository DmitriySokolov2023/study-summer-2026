<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.3</title>
</head>
<body>
    <?php
    chdir(dirname(__FILE__));

    echo "Путь до корневой папки веб-сервера = ";
    echo $_SERVER['DOCUMENT_ROOT'], "<br>";

    $a = __FILE__;
    echo "a = ", $a, "<br>";

    $absolutePath = dirname(__FILE__) . "/files_for_php/file1.txt";
    $descript1 = fopen($absolutePath, "ab");
    if (!$descript1) {
        exit("Ошибка 1-го открытия файла");
    }
    echo "descript1 = ", $descript1, "<br>";

    $relativePath = "files_for_php/file1.txt";
    $descript2 = fopen($relativePath, "ab");
    if (!$descript2) {
        exit("Ошибка 2-го открытия файла");
    }
    echo "descript2 = ", $descript2, "<br>";

    $primerstring = "Stroka";
    echo "строка = ", $primerstring, "<br>";

    $kolbyte = fwrite($descript1, $primerstring);
    echo "kolbyte = ", $kolbyte, "<br>";

    fclose($descript1);
    fclose($descript2);

    $file2Path = dirname(__FILE__) . "/files_for_php/file2.txt";
    $descript3 = fopen($file2Path, "ab");
    if (!$descript3) {
        exit("Ошибка 3-го открытия файла");
    }
    echo "descript3 = ", $descript3, "<br>";

    fclose($descript3);
    ?>
</body>
</html>
