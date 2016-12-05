<?php

	//DDBBra konektatu		
	include "connect.php";
	
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
	
	//argazkiaren id-a kalkulatu
	$id = strval(time());
	
	//Pasahitza enkriptatu
	$pass_sha = sha1($pasahitza);
	
	//Erabiltzailearen datuak XML-an gorde
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
	$semea->addChild('pasahitza',$pass_sha);
	$semea->addChild('argazkia',$id);
	
	if($xml->asXML("../XML/erabiltzaileak.xml") === FALSE) {
		echo "<font color='red'>Mezua ez da XML-an gorde: </font>". $xml . "</h2><br>";
	}
	else{	
		echo "<font color='green'>Datuak ondo sartu dira (XML)</font><br>";
	}
	
	//Argazkia DBan gorde
	$query = "INSERT INTO userpic VALUES ('$id','$argazkia');";

	if($conn->query($query) === TRUE) {
		echo "<font color='green'>Datuak ondo sartu dira (MySQL)</font><br><a href='erabiltzaileakIkusi.php'>Erabiltzaileak ikusi</a><br><a href='../HTML/index.html'> Orrialde nagusira bueltatu </a>";
	}
	else{
		echo "<font color='red'>Datuak ez dira sartu: " . $query . "</font><br>" . $conn->error;
	}
?>