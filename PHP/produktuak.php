<!DOCTYPE html>
<html>
  <head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Produktuak</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
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
			<?PHP 
				include ("../PHP/produktuakIkusi.php?denak=bai");
			?>
		</div>
		<div id='oina'>
			<p>&copy;Ekaitz Eizaguirre, &copy;Julen Ferrero - 2016</p>
			<p><a href='https://github.com/julenferre/sza16-3' target="_blank">GitHub-era esteka</a></p>
		</div>
	</body>
</html>
