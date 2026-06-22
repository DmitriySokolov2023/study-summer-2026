<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 6</title>
</head>
<body>
    <h2>Задание 6. Список файлов и подкаталогов текущего каталога</h2>
    <?php
    $path = dirname(__FILE__);
    $handle = opendir($path);

    while (($item = readdir($handle)) !== false) {
        if ($item != "." && $item != "..") {
            if (is_dir($path . "/" . $item)) {
                echo "Каталог: ", $item, "<br>";
            } else {
                echo "Файл: ", $item, "<br>";
            }
        }
    }

    closedir($handle);
    ?>
</body>
</html>
