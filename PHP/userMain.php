<!DOCTYPE html>
<html>
	<head>
		<title>MAIN</title>
		<script>
			function produktuBerriaIgo(){
				window.location.href = "../PHP/produktuaIgo.php?user=" + encodeURIComponent(<?PHP$_GET['user']?>);
			}
		</script>
	</head>
	<body>
		<div id="edukia">
			<?PHP
				//DDBBra konektatu		
				include "connect.php";
				
				$erabiltzaileak = simplexml_load_file('../XML/erabiltzaileak.xml');
				foreach ($erabiltzaileak->xpath('//erabiltzailea') as $erabiltzailea)
				{
					if(strcmp($erabiltzailea->eposta,$_GET['user'])===0){
						$erantzuna = $conn->query("SELECT image FROM userpic WHERE id = '$erabiltzailea->argazkia'");
						echo "<img src='data:image/jpeg;base64,".base64_encode( $erantzuna->fetch_assoc()['image'] )."' width='100px' /><br>";
						echo ("$erabiltzailea->izena<br>$erabiltzailea->abizenak<br>$erabiltzailea->eposta<br>");			
					}
				}
				
				echo ("<br><input type='button' value='Produktua igo' onclick='produktuBerriaIgo()'");
			?>
			
		</div>		
	</body>
</html>