<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Пример 5.9</title>
</head>
<body>
    <?php
    function PechatDerevaCatalogov($otstup = 1)
    {
        $d = @opendir(".");
        if (!$d) {
            return;
        }

        while (($e = readdir($d)) !== false) {
            if ($e == "." || $e == "..") {
                continue;
            }

            if (!@is_dir($e)) {
                continue;
            }

            for ($i = 0; $i < $otstup; $i++) {
                echo " ";
            }

            echo "$e,<br>";

            if (!chdir($e)) {
                continue;
            }

            PechatDerevaCatalogov($otstup + 1);
            chdir("..");
            flush();
        }

        closedir($d);
    }

    echo "<pre>";
    $putNovKataloga = dirname(__FILE__) . "/catalog_demo";
    $path = $putNovKataloga;
    chdir($path);
    PechatDerevaCatalogov();
    echo "</pre>";
    ?>
</body>
</html>
