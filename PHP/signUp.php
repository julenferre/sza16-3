<?php
	
	// Datuak bidali
	$izena = $_POST['izena'];
	$abizenak = $_POST['abizenak'];
	$eposta = $_POST['eposta'];
	$pasahitza = $_POST['pasahitza'];
	if(!empty($_FILES['argazkia']['tmp_name'])){
		$argazkia = addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));
	}
	else {
		$argazkia = addslashes(file_get_contents("../IMG/UserIcon.png"));
	}
	
	//Pasahitza enkriptatu
	$pass_sha = sha1($pasahitza);
	
	$xml = simplexml_load_file("../XML/erabiltzaileak.xml");
	
	$ID=$xml['azkenid'];
	$ID = substr($ID, 1, strlen($ID));
	$ID = "b".strval(intval($ID)+1);
	
	$xml['azkenid']=$ID;
	
	$semea = $xml->addChild('erabiltzailea');
	$semea->addAttribute('id',$ID);
	$semea->addChild('izena',$izena);
	$semea->addChild('abizenak',$abizenak);
	$semea->addChild('eposta',$eposta);
	$semea->addChild('pasahitza',$pasahitza);
	$semea->addChild('argazkia',$argazkia);	
	
	if($xml->asXML("../XML/erabiltzaileak.xml") === FALSE) {
		echo "<font color='red'>Mezua ez da XML-an gorde: </font>". $xml . "</h2><br>";
	}

	echo "<font color='green'>Datuak ondo sartu dira</font><br><a href='../PHP/iruzkinakIkusi.php' target='_blank'>Iruzkinak ikusi</a>";

?>