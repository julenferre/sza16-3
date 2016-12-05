<?PHP
	//DDBBra konektatu		
	include "connect.php";
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$encpas = sha1($pass);
	
	$correctUser = FALSE;
	
	$users = simplexml_load_file('../XML/erabiltzaileak.xml');
	foreach ($users->xpath('//erabiltzailea') as $erabiltzailea)
	{
		if(!$correctUser){
			if($erabiltzailea->izena == $user && $erabiltzailea->pasahitza == $encpas){
				$correctUser = TRUE;
				echo ("zuzena");
			}
		}
	}

	if(!$correctUser){
		echo ("okerra");
	}	
	
?>