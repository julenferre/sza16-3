<?php
	//GET-etik balioak hartu
	$izena = $_GET['izena'];
	$eposta = $_GET['eposta'];
	$epostapublikoa = $_GET['postapubli'];
	if($epostapublikoa!=='bai') $epostapublikoa = 'ez';	
	$mezua = $_GET['mezua'];
	
	//Data hartu
	$data = date('Y/m/d h:i:s', time());;
	
	//XML fitxategia ireki
	$xml = simplexml_load_file("../XML/bisita_liburua.xml");
	
	//IDa birkalkulatu
	$ID=$xml['azkenid'];
	$ID = substr($ID, 1, strlen($ID));
	$ID = "b".strval(intval($ID)+1);
	
	$xml['azkenid']=$ID;
	
	//Informazioa duten semeak sortu
	$semea = $xml->addChild('bisita');
	$semea->addAttribute('id',$ID);
	$semea->addChild('data',$data);
	$semea->addChild('izena',$izena);	
	$semea->addChild('iruzkina',$mezua);
	$semea->addChild('eposta',$eposta)->addAttribute('erakutsi',$epostapublikoa);
	
	//Fitxategia gorde
	if($xml->asXML("../XML/bisita_liburua.xml") === FALSE) {
		echo "<font color='red'>Mezua ez da XML-an gorde: </font>". $xml . "</h2><br>";
	}

	echo "<font color='green'>Datuak ondo sartu dira</font><br><a href='../PHP/iruzkinakIkusi.php' target='_blank'>Iruzkinak ikusi</a>";
?>