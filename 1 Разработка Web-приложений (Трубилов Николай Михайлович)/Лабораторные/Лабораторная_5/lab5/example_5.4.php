<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 4</title>
</head>
<body>
    <h2>Задание 4. Разбор функций по работе с каталогами из таблицы 5.2</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Функция</th>
            <th>Синтаксис</th>
            <th>Семантика</th>
        </tr>
        <tr>
            <td>chdir()</td>
            <td>chdir($directory)</td>
            <td>Сменяет текущий рабочий каталог.</td>
        </tr>
        <tr>
            <td>chroot()</td>
            <td>chroot($directory)</td>
            <td>Меняет корневой каталог процесса. Обычно требует специальных прав.</td>
        </tr>
        <tr>
            <td>closedir()</td>
            <td>closedir($handle)</td>
            <td>Закрывает открытый каталог и освобождает его дескриптор.</td>
        </tr>
        <tr>
            <td>dir()</td>
            <td>dir($directory)</td>
            <td>Объектный способ работы с каталогом. В методичке отмечено, что он не рассматривается подробно.</td>
        </tr>
        <tr>
            <td>getcwd()</td>
            <td>getcwd()</td>
            <td>Возвращает путь до текущего рабочего каталога.</td>
        </tr>
        <tr>
            <td>opendir()</td>
            <td>opendir($path)</td>
            <td>Открывает каталог и устанавливает указатель на первый элемент.</td>
        </tr>
        <tr>
            <td>readdir()</td>
            <td>readdir($handle)</td>
            <td>Возвращает имя текущего элемента каталога и переводит указатель к следующему.</td>
        </tr>
        <tr>
            <td>rewinddir()</td>
            <td>rewinddir($handle)</td>
            <td>Возвращает внутренний указатель каталога в начало.</td>
        </tr>
        <tr>
            <td>scandir()</td>
            <td>scandir($path[, $order])</td>
            <td>Возвращает массив с именами файлов и каталогов, расположенных по указанному пути.</td>
        </tr>
        <tr>
            <td>is_dir()</td>
            <td>is_dir($filename)</td>
            <td>Проверяет, является ли указанный путь каталогом.</td>
        </tr>
        <tr>
            <td>dirname()</td>
            <td>dirname($path)</td>
            <td>Возвращает имя каталога из указанного пути.</td>
        </tr>
        <tr>
            <td>mkdir()</td>
            <td>mkdir($path)</td>
            <td>Создаёт новый каталог.</td>
        </tr>
        <tr>
            <td>rmdir()</td>
            <td>rmdir($path)</td>
            <td>Удаляет пустой каталог.</td>
        </tr>
    </table>
</body>
</html>
