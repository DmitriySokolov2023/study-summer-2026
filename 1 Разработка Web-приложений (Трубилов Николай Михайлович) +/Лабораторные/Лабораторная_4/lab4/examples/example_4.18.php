<body>
	<H1>
		Использование статических переменных в PHP
	</H1>
	<?php

        function nerabSchetchik()
        {
            $ichislo = 0;
            $ichislo++;
            return $ichislo;
        }
	function rabSchetchik()
	{
	    static $ichislo = 0;
	    $ichislo++;
	    return $ichislo;
	}
	?>
	<H2>
		Результат работы счётчика без использования статической пе-ременной
	</H2>
	<?php
	 echo "Значение счётчика = ", nerabSchetchik(), "<br>";
	echo "Значение счётчика = ", nerabSchetchik(), "<br>";
	echo "Значение счётчика = ", nerabSchetchik(), "<br>";
	?>
	<H2>
		Результат работы счётчика c использованием статической пе-ременной
	</H2>
	<?php
	 echo "Значение счётчика = ", rabSchetchik(), "<br>";
	echo "Значение счётчика = ", rabSchetchik(), "<br>";
	echo "Значение счётчика = ", rabSchetchik(), "<br>";
	?>
</body>