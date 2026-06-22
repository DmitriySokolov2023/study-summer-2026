<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 7</title>
</head>
<body>
    <h2>Задание 7. Подсчёт числа файлов в каталоге</h2>
    <?php
    $path = dirname(__FILE__) . "/";
    $handle = opendir($path);
    $count = 0;

    echo "Каталог: корень<br><br>";

    while (($item = readdir($handle)) !== false) {
        if ($item != "." && $item != "..") {
            $fullName = $path . "/" . $item;
            if (!is_dir($fullName)) {
                $count = $count + 1;
                echo "Файл: ", $item, "<br>";
            }
        }
    }

    closedir($handle);

    echo "<br>Количество файлов в каталоге: ", $count, "<br>";
    ?>
</body>
</html>
