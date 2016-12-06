<?php
	//DDBBra konektatu		
	include "connect.php";
	
	$izena = $_POST['izena'];
	$jabea = $_SESSION['user'];
	$deskribapena = $_POST['deskribapena'];
	$salneurria = $_POST['salneurria'];
	if(!empty($_FILES['argazkia']['tmp_name'])){
		$argazkia = addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));
	}
	else {
		$argazkia = addslashes(file_get_contents("../IMG/default.jpg"));
	}
	
	//argazkiaren id-a kalkulatu
	$argazki_id = strval(time());
	
	//Erabiltzailearen datuak XML-an gorde
	$xml = simplexml_load_file("../XML/produktuak.xml");
	
	$ID=$xml['azkenid'];
	$ID = substr($ID, 1, strlen($ID));
	$ID = "b".strval(intval($ID)+1);
	
	$xml['azkenid']=$ID;
	
	$semea = $xml->addChild('produktua');
	$semea->addAttribute('id',$ID);
	$semea->addChild('izena',$izena);
	$semea->addChild('jabea',$jabea);
	$semea->addChild('deskribapena',$deskribapena);
	$semea->addChild('salneurria',$salneurria);
	$semea->addChild('argazkia',$argazki_id);
	
	if($xml->asXML("../XML/produktuak.xml") === FALSE) {
		echo "<font color='red'>Mezua ez da XML-an gorde: </font>". $xml . "</h2><br>";
	}
	else{	
		echo "<font color='green'>Datuak ondo sartu dira (XML)</font><br>";
	}
	
	//Argazkia DBan gorde
	$query = "INSERT INTO productimg VALUES ('$argazki_id','$argazkia');";

	if($conn->query($query) === TRUE) {
		echo "<font color='green'>Datuak ondo sartu dira (MySQL)</font><br><a href='../PHP/userMain.php'> Atzera bueltatu </a>";
	}
	else{
		echo "<font color='red'>Datuak ez dira sartu: " . $query . "</font><br>" . $conn->error;
	}
?>