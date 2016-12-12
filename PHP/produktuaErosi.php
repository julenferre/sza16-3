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
			if(strcmp($jabea->nodeValue,$_SESSION['user'])===0){
				echo "Produktu hau zurea da jada; ezin duzu erosi";
			}
			else{			
				$jabea->nodeValue=$_SESSION['user'];
				echo "Produktua ondo erosi duzu";
			}
		}
		
		$fitx->save('../XML/produktuak.xml');
	}
?>