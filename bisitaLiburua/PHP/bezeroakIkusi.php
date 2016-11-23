<?php
	$bezeroak = simplexml_load_file('../XML/bezeroak.dtd');
	echo ("<table>");
	echo ("<tr><td><b>Galdera</b></td><td><b>Konplexutasuna</b></td><td><b>Gaia</b></td></tr>");
	foreach ($bezeroak->xpath('//assessmentItem') as $galdera)
	{				
		foreach ($galdera->itemBody as $enuntziatua)
		{ 
			echo ("<tr><td>$enuntziatua->p</td><td>$galdera[complexity]</td><td>$galdera[subject]</td></tr>");
		}
	}
	echo ("</table>");	
?>