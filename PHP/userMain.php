<!DOCTYPE html>
<html>
	<head>
		<title>MAIN</title>
		<script>
			function produktuBerriaIgo(erab){
				window.location.href = "../HTML/produktuaIgo.html?user=" + encodeURIComponent(erab);
			}
			
			function produktuakIkusi(){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200 )){
						document.getElementById("produktuak").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","../PHP/produktuakIkusi.php?denak=ez", true);
				xhttp.send();
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
				
				echo ("<br><input type='button' value='Produktua igo' onclick='produktuBerriaIgo(".$_GET[user].")'");
				echo ("<br>");
			?>
			<br>
			<div id="produktuak"></div>
		</div>		
	</body>
</html>