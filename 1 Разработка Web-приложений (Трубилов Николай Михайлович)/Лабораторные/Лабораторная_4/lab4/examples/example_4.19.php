<body>
	<H1>
		Пример использования переменной, ссылающейся на функцию
	</H1>
	<?php
       $func_peremen1 = "pokupka";
	$func_peremen2 = "oplata";
	$func_peremen3 = "remont";
	function pokupka($chto_to)
	{
	    echo "В этом хозяйственном магазине много ",$chto_to, "<br>";
	    echo " и мы его купим. <br><br>";
	}
	function oplata($massa, $summa)
	{
	    echo "За ", $massa, " кг цемента <br>";
	    echo "мы заплатили ", $summa, " рублей. <br><br>";
	}
	function remont($argument)
	{
	    echo "$argument <br>" ;
	}
	$func_peremen1("цемента");
	$func_peremen2(50, 400);
	$func_peremen3("Мы начали ремонт");
	$func_peremen3("Мы продолжаем ремонт");
	$func_peremen3("Мы закончили ремонт");
	?>
</body>