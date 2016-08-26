function valida() {
	var nome = document.querySelector("#nome").value;
 	var email = document.querySelector("#email").value;
 	
 	if((nome=="") || (email=="")){
		alert("Existem campos em branco"); 	
		return false;
 	}
}