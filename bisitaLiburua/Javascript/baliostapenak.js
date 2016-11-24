var izena;
var eposta;
var postapubli;
var mezua;

/*Flag-ak*/
var iz = false;
var ep = false;
var me = false;

function checkIzena(){
	izena = document.getElementById("izena");
	
	if(izena.value===""){
		alert("Ezin da izena hutsik laga");
		itzalGorriaIpini(izena);
		iz = false;
	}
	else
	{
		itzalGorriaKendu(izena);
		iz = true;
	}
}
function checkEposta(){
	eposta = document.getElementById("eposta");	
	postapubli = document.getElementById("postapubli");
	
	if(eposta.value!==""){
		postapubli.style="display:inline";
		if(eposta.value.indexOf("@")===-1 || 
				eposta.value.substring(0,eposta.value.indexOf("@")).length===0 ||
				eposta.value.substring(eposta.value.indexOf("@"),eposta.value.length).indexOf(".")===-1 ||
				eposta.value.substring(eposta.value.indexOf("."),eposta.value.length).length<3){
			alert("Epostaren formatua okerra da");
			itzalGorriaIpini(eposta);
			ep = false;
		}
		else
		{
			itzalGorriaKendu(eposta);
			ep = true;
		}
	}
	else{
		postapubli.style="display:none";
		itzalGorriaKendu(eposta);
		ep = true;
	}
}
function checkMezua(){
	mezua = document.getElementById("mezua");
	if(mezua.value===""){
		alert("Ezin da mezua hutsik laga");
		itzalGorriaIpini(mezua);
		me = false;
	}
	else
	{
		itzalGorriaKendu(mezua);
		me = true;
	}
}
function checkAll(){
	checkIzena();
	checkEposta();
	checkMezua();
	if(iz && ep && me){
		var msg = "Datuak ondo daude:\n";
		msg+="  Izena: "+izena.value+"\n";
		msg+="  Eposta: "+eposta.value+"\n";
		msg+="  Publikoa: ";
		if(document.getElementById("epostaCB").checked===true){
			msg+=" BAI\n";
		}
		else{
			msg+=" EZ\n";
		}
		msg+="  Mezua: "+ mezua.value+"\n";
		msg+="\nDatuak zerbitzarira bidali dira.";
		alert(msg);
		return true;
	}
	else{
		alert("Datuak ez daude ondo.");
		return false;
	}
}
function checkAll2(){
	eposta = document.getElementById("eposta");
	if(eposta.value.indexOf("@")===-1 || 
			eposta.value.substring(0,eposta.value.indexOf("@")).length===0 ||
			eposta.value.substring(eposta.value.indexOf("@"),eposta.value.length).indexOf(".")===-1 ||
			eposta.value.substring(eposta.value.indexOf("."),eposta.value.length).length<3){
		alert("Epostaren formatua okerra da");
		itzalGorriaIpini(eposta);
		ep = false;
	}
	else
	{
		itzalGorriaKendu(eposta);
		ep = true;
	}
	return ep;
}
function itzalGorriaIpini(input){
	input.style="box-shadow: 3px 3px 2px 0 rgba(255, 0, 0, 1),-3px -3px 2px 0 rgba(255, 0, 0, 1);";
}
function itzalGorriaKendu(input){
	input.style="box-shadow: 0 0 0 0;";
}