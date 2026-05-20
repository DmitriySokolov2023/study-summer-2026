<?php

function page_navigation($text1, $text2)
{
    echo '<hr>';
    echo '<center>';
    echo "<a href='homePage.php'>Домой</a>&nbsp;&nbsp;&nbsp;";
    echo "<a href='mapPage.php'>Карта сайта</a>&nbsp;&nbsp;&nbsp;";
    echo "<a href='helpPage.php'>Помощь</a>";
    echo '<hr>';
    echo"<font size = '3'>$text1</i></font>";
    echo"<br><font size = '3'>$text2</i></font>";
    echo '<center>';
}
