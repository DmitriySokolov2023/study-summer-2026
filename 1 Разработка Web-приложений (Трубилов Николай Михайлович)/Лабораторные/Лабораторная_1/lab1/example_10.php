<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.10</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Интервалы возможных значений переменных в PHP</h2>
    <table>
        <tr>
            <th>Тип данных</th>
            <th>Интервал / возможные значения</th>
        </tr>
        <tr>
            <td>integer (int)</td>
            <td>
                32-бит: от -2 147 483 648 до 2 147 483 647<br>
                64-бит: от -9 223 372 036 854 775 808 до 9 223 372 036 854 775 807
            </td>
        </tr>
        <tr>
            <td>float (double)</td>
            <td>Примерно от 2.3E-308 до 1.7E+308 (по модулю)</td>
        </tr>
        <tr>
            <td>boolean (bool)</td>
            <td>true или false</td>
        </tr>
        <tr>
            <td>string</td>
            <td>Последовательность символов</td>
        </tr>
        <tr>
            <td>null</td>
            <td>Только значение NULL</td>
        </tr>
        <tr>
            <td>array</td>
            <td>Набор элементов (ключ => значение)</td>
        </tr>
        <tr>
            <td>object</td>
            <td>Экземпляр класса</td>
        </tr>
    </table>
</body>
</html>
