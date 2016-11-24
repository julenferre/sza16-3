var emailOndo = false;
var ticketaOndo = false;
var pasahitzaOndo = false;
function irudiAurrekarga(irudia){
	document.getElementById('argazkiAurrekarga').style.display = 'inline';
	document.getElementById('argazkiAurrekarga').src = window.URL.createObjectURL(irudia);
}
function checkEposta(eposta){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){
			if(xhttp.responseText == "BAI"){
				emailOndo = true;
				document.getElementById("matrikulatuErantzuna").style = "display:none";
			}
			else if(xhttp.responseText == "EZ"){
				emailOndo = false;
				document.getElementById("matrikulatuErantzuna").style = "display:inline";
			}
		}
	};
	xhttp.open("GET","../PHP/emailaMatrikulatuta.php?eposta=" + eposta, true);
	xhttp.send();
}
function checkTicketa(ticketa){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){
			if(xhttp.responseText == "ERABILTZAILE BAIMENDUA"){
				ticketaOndo = true;
				document.getElementById("ticketOnaErantzuna").style = "display:none";
			}
			else if(xhttp.responseText == "BAIMENIK GABEKO ERABILTZAILEA"){
				ticketaOndo = false;
				document.getElementById("ticketOnaErantzuna").style = "display:inline";
			}
		}
	};
	xhttp.open("GET","../PHP/egiaztatuTicketaBezeroa.php?ticketa=" + ticketa, true);
	xhttp.send();
}
function checkPasahitza(pasahitza){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){
			if(xhttp.responseText == "BALIOZKOA"){
				pasahitzaOndo = true;
				document.getElementById("pasahitzaOnaErantzuna").style = "display:none";
			}
			else if(xhttp.responseText == "BALIOGABEA"){
				pasahitzaOndo = false;
				document.getElementById("pasahitzaOnaErantzuna").style = "display:inline";
			}
		}
	};
	xhttp.open("GET","../PHP/egiaztatuPasahitzaBezeroa.php?pasahitza=" + pasahitza, true);
	xhttp.send();
}		
function checkAll(){
	if(!checkNagusia() || !emailOndo || !ticketaOndo || !pasahitzaOndo){
		return false;
	}
	else{
		return true;
	}
}
