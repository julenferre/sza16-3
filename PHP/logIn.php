<?PHP
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$encpas = sha1($pass);
	
	$correctUser = FALSE;
	
	$users = simplexml_load_file('../XML/erabiltzaileak.xml');
	foreach ($users->xpath('//erabiltzailea') as $erabiltzailea)
	{
		if(!$correctUser){
			if(strcmp($erabiltzailea->eposta,$user) === 0 && strcmp($erabiltzailea->pasahitza,$encpas) === 0){
				$correctUser = TRUE;
				echo ("zuzena");
			}
		}
	}

	if(!$correctUser){
		echo ("okerra");
	}	
	
?>