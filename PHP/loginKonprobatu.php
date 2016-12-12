<?PHP
	session_start();
	if (!isset($_SESSION['user'])) {
		echo "logingabe";
	}
	else{
		echo "loginarekin";
	}
?>