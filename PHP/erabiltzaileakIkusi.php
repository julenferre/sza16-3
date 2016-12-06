<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
	</head>
	<body>
		<table>
			<tr><td><b>ID</b></td><td><b>Izena</b></td><td><b>Abizenak</b></td><td><b>Eposta</b></td><td><b>Pasahitza</b></td><td><b>Argazkia</b></td></tr>
			<?php
				//DDBBra konektatu		
				include "connect.php";
				$erabiltzaileak = simplexml_load_file('../XML/erabiltzaileak.xml');
				foreach ($erabiltzaileak->xpath('//erabiltzailea') as $erabiltzailea)
				{ 
					echo ("<tr>");
					echo ("<td>$erabiltzailea[id]</td><td>$erabiltzailea->izena</td><td>$erabiltzailea->abizenak</td><td>$erabiltzailea->eposta</td><td>$erabiltzailea->pasahitza</td>");			
					
					$query = "SELECT image FROM userpic WHERE id = '$erabiltzailea->argazkia'";
						
					$erantzuna = $conn->query($query);
					echo "<td><img src='data:image/jpeg;base64,".base64_encode( $erantzuna->fetch_assoc()['image'] )."' width='100px' /></td>";
					
					echo ("</tr>");
				}
				echo ("<br><a href='../HTML/index.html'> Orrialde nagusira bueltatu </a>");
			?>
		</table>
	</body>
</html>