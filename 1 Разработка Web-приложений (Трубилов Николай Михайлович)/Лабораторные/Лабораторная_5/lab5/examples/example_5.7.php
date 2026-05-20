<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.7</title>
</head>
<body>
    <?php
    $novpath = dirname(__FILE__) . "/files_for_php/file4.txt";
    $handle = fopen($novpath, "r");
    $format = "%u-%u-%u %s %s";

    while (!feof($handle)) {
        $row = fscanf($handle, $format);
        if ($row != false) {
            $month = $row[0];
            $day = $row[1];
            $year = $row[2];
            $first = $row[3];
            $last = $row[4];

            echo "Имя: $first<br>";
            echo "Фамилия: $last<br>";
            echo "Дата рождения: $month/$day/$year<br><br>";
        }
    }

    fclose($handle);
    ?>
</body>
</html>
