<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.4</title>
</head>
<body>
    <?php
    $novpath = dirname(__FILE__) . "/files_for_php/file3.txt";
    $text = "Просто строка";

    if (file_put_contents($novpath, $text) == false) {
        echo "ошибка записи в файл file3.txt<br>";
    } else {
        echo "Создан файл file3.txt и записан в files_for_php<br>";
    }

    $text = "Просто вторая строка";
    if (file_put_contents($novpath, $text) == false) {
        echo "ошибка записи в файл file3.txt<br>";
    } else {
        echo "Заново создан файл file3.txt и записан в files_for_php<br>";
    }

    $novpath1 = dirname(__FILE__) . "/files_for_php/file4.doc";
    $text1 = "Просто другая строка";
    if (file_put_contents($novpath1, $text1) == false) {
        echo "ошибка записи в файл file4.doc<br>";
    } else {
        echo "Создан файл file4.doc и записан в files_for_php<br>";
    }

    $text2 = ", Добавлено немного текста";
    $novpath3 = dirname(__FILE__) . "/files_for_php/file3.txt";
    if (file_put_contents($novpath3, $text2, FILE_APPEND) == false) {
        echo "ошибка записи в файл file3.txt<br>";
    } else {
        echo "Файл file3.txt дописан в files_for_php<br>";
    }
    ?>
</body>
</html>
