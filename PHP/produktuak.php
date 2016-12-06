<!DOCTYPE html>
<html>
  <head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Produktuak</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			var timer;		
			timer = setInterval(produktuakIkusi, 5000);
						
			function produktuakIkusi(){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200 )){
						document.getElementById("produktuak").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","../PHP/produktuakIkusi.php", true);
				xhttp.send();
			}
		</script>
  </head>
  <body>
		<div id='burua'>
			<span class='esteka'><a href="../HTML/signUp.html">Sign Up</a></span><br/>
			<span class='esteka'><a href="../HTML/logIn.html">Log In</a></span><br/>
			<h2>Produktuak</h2>
		</div>
		<div id='estekak'>
			<span><a href='../HTML/index.html'>Home</a></span>
			<span><a href='../PHP/produktuakIkusi.php'>Produktuak</a></span>
		</div>
		<div id="edukia">	
			<div id="produktuak">
				<?PHP 
					session_start();
					$_SESSION['prod'] = "denak";
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
