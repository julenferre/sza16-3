<!DOCTYPE html>
<html>
	<head>
		<title>MAIN</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function produktuBerriaIgo(){
				window.location.href = "../HTML/produktuaIgo.html";
			}
			var timer;		
			timer = setInterval(produktuakIkusi, 5000);
			function produktuakIkusi(){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200 )){
						document.getElementById("produktuak").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","../PHP/produktuakIkusi.php?ikusi=erab", true);
				xhttp.send();
			}
		</script>
	</head>
	<body>
		<div id='burua'>
			<span class='esteka'><a href="signUp.html">Sign Up</a></span><br/>
			<span class='esteka'><a href="logIn.html">Log In</a></span>
			<h2>SalErosi</h2>
		</div>
		<div id='estekak'>
			<span><a href='../HTML/index.html'>Home</a></span><br/>
			<span><a href='../PHP/produktuak.php'>Produktuak</a></span>
		</div>
		<div id="edukia">
			<?PHP
				//DDBBra konektatu		
				include "connect.php";
				
				$erabiltzaileak = simplexml_load_file('../XML/erabiltzaileak.xml');
				foreach ($erabiltzaileak->xpath('//erabiltzailea') as $erabiltzailea)
				{
					if(strcmp($erabiltzailea->eposta,$_SESSION['user'])===0){
						$erantzuna = $conn->query("SELECT image FROM userpic WHERE id = '$erabiltzailea->argazkia'");
						echo "<img src='data:image/jpeg;base64,".base64_encode( $erantzuna->fetch_assoc()['image'] )."' width='100px' /><br>";
						echo ("$erabiltzailea->izena<br>$erabiltzailea->abizenak<br>$erabiltzailea->eposta<br>");			
					}
				}
				
				echo ("<br><input type='button' value='Produktua igo' onclick='produktuBerriaIgo()'");
				echo ("<br>");
			?>
			<br>
			<div id="produktuak">
				<?PHP 
					if (session_status() == PHP_SESSION_NONE) {
						session_start();
					}
					$_GET['ikusi'] = "batzuk";
					include ("../PHP/produktuakIkusi.php");
				?>
			</div>
		</div>		
		<div id='oina'>
			<p>&copy;Ekaitz Eizaguirre, &copy;Julen Ferrero - 2016</p>
			<p><a href='https://github.com/julenferre/sza16-3' target="_blank">GitHub-era esteka</a></p>
		</div>
	</body>
</html>