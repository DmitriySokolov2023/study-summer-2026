<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 8</title>
</head>
<body>
    <h2>Задание 8. Копирование каталога с вложенными каталогами</h2>
    <?php
    function copy_catalog($source, $target)
    {
        if (!is_dir($target)) {
            mkdir($target);
            echo "Создан каталог: ", $target, "<br>";
        }

        $handle = opendir($source);

        while (($item = readdir($handle)) !== false) {
            if ($item != "." && $item != "..") {
                $from = $source . "/" . $item;
                $to = $target . "/" . $item;

                if (is_dir($from)) {
                    copy_catalog($from, $to);
                } else {
                    copy($from, $to);
                    echo "Скопирован файл: ", $from, " -> ", $to, "<br>";
                }
            }
        }

        closedir($handle);
    }

    $source = dirname(__FILE__) . "/source_catalog";
    $target = dirname(__FILE__) . "/target_catalog";

    echo "Исходный каталог: ", $source, "<br>";
    echo "Целевой каталог: ", $target, "<br><br>";

    copy_catalog($source, $target);

    echo "<br>Копирование завершено.<br>";
    ?>
</body>
</html>
