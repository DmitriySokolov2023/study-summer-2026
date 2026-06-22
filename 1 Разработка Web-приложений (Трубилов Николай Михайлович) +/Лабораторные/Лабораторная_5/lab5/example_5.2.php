<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 2</title>
</head>
<body>
    <h2>Задание 2. Таблица функций из раздела 5.3 и примеры</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Функция</th>
            <th>Синтаксис</th>
            <th>Функционал</th>
        </tr>
        <tr>
            <td>file_exists()</td>
            <td>file_exists($file)</td>
            <td>Проверяет существование файла.</td>
        </tr>
        <tr>
            <td>filesize()</td>
            <td>filesize($file)</td>
            <td>Возвращает размер файла в байтах.</td>
        </tr>
        <tr>
            <td>fclose()</td>
            <td>fclose($handle)</td>
            <td>Закрывает ранее открытый файл.</td>
        </tr>
        <tr>
            <td>fwrite()</td>
            <td>fwrite($handle, $string)</td>
            <td>Записывает строку в открытый файл.</td>
        </tr>
        <tr>
            <td>fputs()</td>
            <td>fputs($handle, $string)</td>
            <td>Записывает строку в файл. Является аналогом fwrite().</td>
        </tr>
        <tr>
            <td>file_put_contents()</td>
            <td>file_put_contents($file, $string)</td>
            <td>Записывает строку в файл целиком.</td>
        </tr>
        <tr>
            <td>fread()</td>
            <td>fread($handle, $length)</td>
            <td>Читает из файла указанное число байтов.</td>
        </tr>
        <tr>
            <td>fgets()</td>
            <td>fgets($handle)</td>
            <td>Читает одну строку текста из файла.</td>
        </tr>
        <tr>
            <td>fgetss()</td>
            <td>fgetss($handle)</td>
            <td>Читает строку и удаляет из неё HTML-теги. В PHP 8 функция недоступна.</td>
        </tr>
        <tr>
            <td>fgetc()</td>
            <td>fgetc($handle)</td>
            <td>Читает из файла один символ.</td>
        </tr>
        <tr>
            <td>file()</td>
            <td>file($file)</td>
            <td>Считывает файл в массив строк.</td>
        </tr>
        <tr>
            <td>file_get_contents()</td>
            <td>file_get_contents($file)</td>
            <td>Считывает файл целиком в строку.</td>
        </tr>
        <tr>
            <td>fscanf()</td>
            <td>fscanf($handle, $format)</td>
            <td>Читает данные из файла по заданному формату.</td>
        </tr>
        <tr>
            <td>feof()</td>
            <td>feof($handle)</td>
            <td>Проверяет, достигнут ли конец файла.</td>
        </tr>
    </table>

    <h3>Собственные примеры</h3>

    <?php
    $basePath = dirname(__FILE__) . "/data";
    $sampleFile = $basePath . "/sample.txt";
    $multilineFile = $basePath . "/multiline.txt";
    $htmlFile = $basePath . "/html_text.txt";
    $asciiFile = $basePath . "/ascii.txt";
    $peopleFile = $basePath . "/people.txt";
    $writeFile = $basePath . "/write_example.txt";
    $putsFile = $basePath . "/fputs_example.txt";
    $wholeFile = $basePath . "/whole_file.txt";

    echo "<h4>1. file_exists()</h4>";
    if (file_exists($sampleFile)) {
        echo "Файл data/sample.txt существует.<br>";
    } else {
        echo "Файл data/sample.txt не найден.<br>";
    }

    echo "<h4>2. filesize()</h4>";
    echo "Размер файла data/sample.txt: ", filesize($sampleFile), " байт.<br>";

    echo "<h4>3. fclose()</h4>";
    $handle = fopen($sampleFile, "r");
    fclose($handle);
    echo "Файл data/sample.txt был открыт и затем закрыт функцией fclose().<br>";

    echo "<h4>4. fwrite()</h4>";
    $handle = fopen($writeFile, "w");
    fwrite($handle, "Первая строка, записанная fwrite().\n");
    fwrite($handle, "Вторая строка, записанная fwrite().\n");
    fclose($handle);
    echo "<pre>", file_get_contents($writeFile), "</pre>";

    echo "<h4>5. fputs()</h4>";
    $handle = fopen($putsFile, "w");
    fputs($handle, "Строка, записанная fputs().\n");
    fputs($handle, "Ещё одна строка.\n");
    fclose($handle);
    echo "<pre>", file_get_contents($putsFile), "</pre>";

    echo "<h4>6. file_put_contents()</h4>";
    file_put_contents($wholeFile, "Весь текст сразу записан функцией file_put_contents().");
    echo "<pre>", file_get_contents($wholeFile), "</pre>";

    echo "<h4>7. fread()</h4>";
    $handle = fopen($sampleFile, "r");
    $text = fread($handle, filesize($sampleFile));
    fclose($handle);
    echo "<pre>", $text, "</pre>";

    echo "<h4>8. fgets()</h4>";
    $handle = fopen($multilineFile, "r");
    $line = fgets($handle);
    fclose($handle);
    echo "<pre>", $line, "</pre>";

    echo "<h4>9. fgetss()</h4>";
    if (function_exists("fgetss")) {
        $handle = fopen($htmlFile, "r");
        $line = fgetss($handle);
        fclose($handle);
        echo "<pre>", $line, "</pre>";
    } else {
        echo "В установленной версии PHP 8.0 функция fgetss() отсутствует.<br>";
    }

    echo "<h4>10. fgetc()</h4>";
    $handle = fopen($asciiFile, "r");
    echo "Посимвольное чтение файла: ";
    while (!feof($handle)) {
        $symbol = fgetc($handle);
        if ($symbol !== false) {
            echo $symbol, " ";
        }
    }
    fclose($handle);
    echo "<br>";

    echo "<h4>11. file()</h4>";
    $lines = file($multilineFile);
    echo "<pre>";
    for ($i = 0; $i < count($lines); $i = $i + 1) {
        echo "Строка ", $i + 1, ": ", $lines[$i];
    }
    echo "</pre>";

    echo "<h4>12. file_get_contents()</h4>";
    echo "<pre>", file_get_contents($sampleFile), "</pre>";

    echo "<h4>13. fscanf()</h4>";
    $handle = fopen($peopleFile, "r");
    $row = fscanf($handle, "%u-%u-%u %s %s");
    fclose($handle);
    if ($row != false) {
        echo "Месяц: ", $row[0], "<br>";
        echo "День: ", $row[1], "<br>";
        echo "Год: ", $row[2], "<br>";
        echo "Имя: ", $row[3], "<br>";
        echo "Фамилия: ", $row[4], "<br>";
    }

    echo "<h4>14. feof()</h4>";
    $handle = fopen($multilineFile, "r");
    echo "<pre>";
    while (!feof($handle)) {
        $line = fgets($handle);
        if ($line !== false) {
            echo $line;
        }
    }
    echo "</pre>";
    fclose($handle);
    ?>
</body>
</html>
