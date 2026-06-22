<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Обход директории</title>
</head>

<body>
	<?php
function files_names($nach_dir)
{
    $directoriya = opendir($nach_dir);
    if (!$directoriya) {
        return;
    }

    while (($uroven = readdir($directoriya)) !== false) {
        if ($uroven == "." || $uroven == ".." || $uroven == "otchet_files.txt") {
            continue;
        }

        $path = $nach_dir . "/" . $uroven;

        if (is_dir($path)) {
            files_names($path);
        } else {

            $file_name = $path;
            $date_file = date('d.m.Y', filemtime($file_name));

            $file_name = str_replace(['////', '///', '//', '\\//', '\/'], '/', $file_name);

            $filename = dirname(__FILE__) . "/otchet_files.txt";
            $text = $file_name . ";" . $date_file . ";\n";

            $file = fopen($filename, 'a+');
            if ($file) {
                fwrite($file, $text);
                fclose($file);
            }
        }
    }
    closedir($directoriya);
}

	$filename = dirname(__FILE__) . "/otchet_files.txt";
	$file = fopen($filename, "w");
	fclose($file);

	$root = dirname(__FILE__);
	files_names($root);
	echo "Отчёт создан в файле otchet_files.txt";
	?>
</body>

</html>
