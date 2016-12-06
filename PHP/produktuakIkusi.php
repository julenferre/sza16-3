<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
	</head>
	<body>
		<table>
			<?php
				//DDBBra konektatu		
				include "connect.php";
				$produktuak = simplexml_load_file('../XML/produktuak.xml');
				if(strcmp($_SESSION['prod'],"denak")===0){
					echo ("<tr><td><b>Izena</b></td><td><b>Jabea</b></td><td><b>Deskribapena</b></td><td><b>Salneurria</b></td><td><b>Argazkia</b></td></tr>");
					foreach ($produktuak->xpath('//produktua') as $produktua)
					{ 
						echo ("<tr>");
						echo ("<td>$produktua->izena</td><td>$produktua->jabea</td><td>$produktua->deskribapena</td><td>$produktua->salneurria</td>");			
						
						$query = "SELECT image FROM productimg WHERE id = '$produktua->argazkia'";
							
						$erantzuna = $conn->query($query);
						echo "<td><img src='data:image/jpeg;base64,".base64_encode( $erantzuna->fetch_assoc()['image'] )."' width='100px' /></td>";
						
						echo ("</tr>");
					}
				}
				else if(strcmp($_SESSION['prod'],"erab")===0){
					echo ("<tr><td><b>Izena</b></td><td><b>Deskribapena</b></td><td><b>Salneurria</b></td><td><b>Argazkia</b></td></tr>");
					foreach ($produktuak->xpath('//produktua') as $produktua)
					{ 
						if(strcmp($_SESSION['user'],$produktua->jabea)===0){
							echo ("<tr>");
							echo ("<td>$produktua->izena</td><td>$produktua->deskribapena</td><td>$produktua->salneurria &euro;</td>");			
							
							$query = "SELECT image FROM productimg WHERE id = '$produktua->argazkia'";
								
							$erantzuna = $conn->query($query);
							echo "<td><img src='data:image/jpeg;base64,".base64_encode( $erantzuna->fetch_assoc()['image'] )."' width='100px' /></td>";
							
							echo ("</tr>");
						}
					}
				}
			?>
		</table>
	</body>
</html>