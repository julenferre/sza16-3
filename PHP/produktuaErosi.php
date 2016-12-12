<?PHP
	session_start();
	if (!isset($_SESSION['user'])) {
		echo "Logeatu zaitez produktua erosteko";
	}
	else{
		$produktuID = $_GET['prodId'];
		
		$fitx = new DOMDocument;
		
		$fitx->validateOnParse = true;
		$fitx->load("../XML/produktuak.xml");
		
		$jabeak = $fitx->getElementById($produktuID)->getElementsByTagName("jabea");
		
		foreach($jabeak as $jabea){
			$jabea->nodeValue=$_GET['user'];
		}
		
		$fitx->save('../XML/produktuak.xml');
		
		echo "Produktua ondo erosi duzu";
	}
?>