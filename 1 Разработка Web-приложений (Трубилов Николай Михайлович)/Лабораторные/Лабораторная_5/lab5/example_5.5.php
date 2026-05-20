<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 5</title>
</head>
<body>
    <h2>Задание 5. Вывод содержимого каталога с помощью scandir()</h2>
    <?php
    $path = dirname(__FILE__) . "/catalog_demo";
    $items = scandir($path);

    echo "Каталог для просмотра: catalog_demo<br><br>";

    if ($items != false) {
        for ($i = 0; $i < count($items); $i = $i + 1) {
            echo $items[$i], "<br>";
        }
    }
    ?>
</body>
</html>
