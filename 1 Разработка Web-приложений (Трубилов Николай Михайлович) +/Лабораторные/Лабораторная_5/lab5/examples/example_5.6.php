<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.6</title>
</head>
<body>
    <?php
    $novpath = dirname(__FILE__) . "/files_for_php/file1.txt";
    $handle = fopen($novpath, "rb");

    if (!$handle) {
        exit("Ошибка при открытии файла file1.txt");
    }

    while (($char = fgetc($handle)) !== false) {
        echo $char;
    }

    fclose($handle);
    echo "<br>";

    $handle = fopen($novpath, "rb");

    while (($char = fgetc($handle)) !== false) {
        if ($char == "\n") {
            $char = "<br>";
        }
        echo $char;
    }

    fclose($handle);
    ?>
</body>
</html>
