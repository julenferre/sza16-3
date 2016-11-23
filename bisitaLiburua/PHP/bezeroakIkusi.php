<?php
	$bezeroak = simplexml_load_file('../XML/bezeroak.dtd');
	echo ("<table>");
	echo ("<tr><td><b>Izen abizenak</b></td><td><b>Eposta</b></td><td><b>Mezua</b></td><td><b>Data</b></td></tr>");
	foreach ($bezeroak->xpath('//bezeroa') as $bezeroa)
	{
		echo("<tr><td>$bezeroa->izena</td>");
		if($bezeroa->epostaErakutsi==='bai'){
			echo("<td>$bezeroa->eposta</td>");
		}
		else{
			echo("<td> - </td>");
		}
		echo("<td>$bezeroa->mezua</td></tr>");		
		echo("<td>$bezeroa->data</td></tr>");
	}
	echo ("</table>");
?>