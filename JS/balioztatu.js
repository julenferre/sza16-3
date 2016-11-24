var emailOndo = false;
var pasahitzaOndo = false;
function epostaCheck() {
    var em = document.getElementById("eposta").value;
    var emailRE = /[a-zA-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/;
    emailOndo = emailRE.test(em);
	if(!emailOndo){
		alert("Epostaren formatu zuzenaren adibidea: aurrutia123@ikasle.ehu.eus");
	}
}
function pasahitzaCheck() {
    var pa = document.getElementById("pasahitza").value;
	pasahitzaOndo = (pa.length >= 6);
	if(!pasahitzaOndo){
		alert("Pasahitza 6 karaktere edo gehiagoko luzeera izan behar du");
	}
}
function checkAll(){
	epostaCheck();
	pasahitzaCheck();
	if(!emailOndo || !pasahitzaOndo){
		return false;
	}
	else{
		return true;
	}
}
