<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.5</title>
</head>
<body>
    <?php
    $novpath = dirname(__FILE__) . "/files_for_php/file3.txt";

    if (is_readable($novpath)) {
        $fd = fopen($novpath, "r");
        echo "Файл $fd открыт! <br>";
    } else {
        exit("$novpath не может быть прочитан! <br>");
    }

    $file = fread($fd, filesize($novpath));
    echo 'Размер файла (' . $novpath . ') равен ' . filesize($novpath) . ' байт', "<br>";
    echo 'Содержимое считанного файла = ' . $file;

    fclose($fd);
    ?>
</body>
</html>
