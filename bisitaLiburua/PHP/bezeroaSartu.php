<?php
	//GET-etik balioak hartu
	$izena = $_GET['izena'];
	$eposta = $_GET['eposta'];
	$epostapublikoa = $_GET['epostaCB'];
	if($epostapublikoa!=='bai') $epostapublikoa = 'ez';	
	$mezua = $_GET['zailtasuna'];
	
	//Data hartu
	$data = date('Y/m/d h:i:s', time());;
	
	//XML fitxategia ireki
	$xml = simplexml_load_file("../XML/bezeroak.dtd");
	
	//ID-a kalkulatu
	$bezeroa = new SimpleXMLElement($xml);		
	if($bezeroa->count()===0){
		$ID="b1";
	}
	else{
		$azkenID = ('//bezeroa[last()][id]');
		$ID = substr($azkenID, 1, strlen($azkenID));
		$ID = "b".strval(intval($ID)+1);
	}
	
	//Informazioa duten semeak sortu
	$semea = $xml->addChild('bezeroa');
	$semea->addAttribute('id',$ID);
	$semea->addChild('data',$data);
	$semea->addChild('izena',$izena);	
	$semea->addChild('iruzkina',$mezua);
	$semea->addChild('eposta',$eposta);
	$semea->addChild('epostaErakutsi',$epostapublikoa);
	
	//Fitxategia gorde
	if($xml->asXML("../XML/bezeroak.dtd") === FALSE) {
		echo "<font color='red'>Mezua ez da XML-an gorde: </font>". $xml . "</h2><br>";
	}

	echo "<font color='green'>Datuak ondo sartu dira</font><br><a href='../XML/bezeroak.dtd' target='_blank'>bezeroak.dtd ikusi</a>";
?>