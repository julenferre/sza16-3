<?php
	$bisitak = simplexml_load_file('../XML/bisita_liburua.xml');
	echo ("<table>");
	echo ("<tr><th><b>Izen abizenak</b></th><th><b>Eposta</b></th><th><b>Mezua</b></th><th><b>Data</b></th></tr>");
	foreach ($bisitak->xpath('//bisita') as $bisita)
	{
		echo("<tr><td>$bisita->izena</td>");
		if($bisita->eposta['erakutsi']=="bai"){
			echo("<td>$bisita->eposta</td>");
		}
		else{
			echo("<td> - </td>");
		}
		echo("<td>$bisita->iruzkina</td>");		
		echo("<td>$bisita->data</td></tr>");
	}
	echo ("</table>");
?>