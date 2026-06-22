<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Задание 3</title>
</head>
<body>
    <h2>Задание 3. Классификатор функций PHP по работе с файловой системой</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Группа функций</th>
            <th>Функции</th>
            <th>Назначение</th>
        </tr>
        <tr>
            <td>Открытие и закрытие файлов</td>
            <td>fopen(), fclose()</td>
            <td>Открывают файл для работы и закрывают его после завершения работы.</td>
        </tr>
        <tr>
            <td>Проверка существования и свойств файла</td>
            <td>file_exists(), filesize(), is_file(), is_dir(), filemtime()</td>
            <td>Позволяют узнать, существует ли файл, каков его размер, тип и дата изменения.</td>
        </tr>
        <tr>
            <td>Чтение из файла</td>
            <td>fread(), fgets(), fgetss(), fgetc(), file(), file_get_contents(), fscanf(), feof()</td>
            <td>Используются для чтения файла целиком, построчно, посимвольно или по формату.</td>
        </tr>
        <tr>
            <td>Запись в файл</td>
            <td>fwrite(), fputs(), file_put_contents()</td>
            <td>Записывают данные в файл частями или полностью.</td>
        </tr>
        <tr>
            <td>Копирование, переименование, удаление файлов</td>
            <td>copy(), rename(), unlink()</td>
            <td>Копируют, переименовывают и удаляют файлы.</td>
        </tr>
        <tr>
            <td>Работа с каталогами</td>
            <td>opendir(), readdir(), rewinddir(), closedir(), scandir(), mkdir(), rmdir(), chdir(), getcwd()</td>
            <td>Открывают каталоги, читают их содержимое, создают, удаляют и меняют текущий каталог.</td>
        </tr>
        <tr>
            <td>Работа с путями</td>
            <td>dirname(), basename(), pathinfo()</td>
            <td>Выделяют имя каталога, имя файла и сведения о пути.</td>
        </tr>
    </table>
</body>
</html>
