<!DOCTYPE html>
<html>
<head>
	<script src="../JS/balioztatu.js"></script>
</head>
<body>
	<p><b>AUTENTIFIKATU ZAITEZ:</b></p>
	<form id="login" name="login" onSubmit='logIn.php' method="POST">
			<br />
			<b>Erabiltzailea: </b>
			<input type="text" id="user" name="user" />
			<br />
			<b>Pasahitza :</b>
			<input type="password" id="pass" name="pass" />
			<br />
			<input type="submit" id="submit" value="Sartu" />
	</form>
	<br/><br/>
	<p> <a href='../layout.html'> -=HOME=-</a> </p>
</body>
</html>


<?php
		session_start();
		if(isset($_POST['user'],$_POST['pass']) && strlen($_POST['user'])!=0 && strlen($_POST['pass'])!=0){
			echo"<p><font size='40'>TO JAKEROOOO !</font></p>";
		}
?>