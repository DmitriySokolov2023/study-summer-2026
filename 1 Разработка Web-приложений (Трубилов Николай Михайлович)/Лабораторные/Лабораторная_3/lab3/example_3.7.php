<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3.7</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        .placeholder {
            width: 180px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f0f0;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
$cities = [
    ["city" => "Москва", "file" => "moscow.jpg"],
    ["city" => "Санкт-Петербург", "file" => "spb.jpg"],
    ["city" => "Казань", "file" => "kazan.jpg"],
    ["city" => "Сочи", "file" => "sochi.jpg"],
    ["city" => "Екатеринбург", "file" => "ekb.jpg"],
    ["city" => "Самара", "file" => "samara.jpg"],
    ["city" => "Тула", "file" => "tula.jpg"],
    ["city" => "Владивосток", "file" => "vladivostok.jpg"],
    ["city" => "Калининград", "file" => "kaliningrad.jpg"],
    ["city" => "Нижний Новгород", "file" => "nnovgorod.jpg"]
];

shuffle($cities);
$selected = array_slice($cities, 0, 3);
?>

<h3>Случайные города для турфирмы</h3>
<table>
    <tr>
        <th>Город</th>
        <th>Вид города</th>
        <th>Имя файла</th>
    </tr>
    <?php foreach ($selected as $item) { ?>
        <tr>
            <td><?php echo $item["city"]; ?></td>
            <td><div class="placeholder"><?php echo $item["city"]; ?></div></td>
            <td><?php echo $item["file"]; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
