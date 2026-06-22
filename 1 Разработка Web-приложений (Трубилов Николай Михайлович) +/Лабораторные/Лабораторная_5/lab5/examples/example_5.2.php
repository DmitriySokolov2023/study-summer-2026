<?php
phpinfo();
echo '<h2>Печать значений массива $_SERVER подряд:</h2>';
print_r($_SERVER);
echo "<br><br>";
echo '<h2>Печать значений массива $_SERVER по строкам:</h2>';
foreach ($_SERVER as $key => $value) {
    echo "индекс = $key, &nbsp;&nbsp;&nbsp; значение = $value, <br>";
}
?>
