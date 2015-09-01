function CapitalizarDatoGeneralAjax(){
	var xmlhttp=false;
	try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
			try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(E){
					xmlhttp = false;
			}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			xmlhttp = new XMLHttpRequest();
	}

	return xmlhttp;
}

function CapitalizarDatoGeneral(){

	resul = document.getElementById('resultado');

	TI=document.frmbusqueda.TiempoInicio.value;     //esta se agrego
	TF=document.frmbusqueda.TiempoFin.value;     //esta se agrego

	ajax=CapitalizarDatoGeneralAjax();
	ajax.open("POST", "capitalizacion.total.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("&tiempoi=" + TI + "&tiempof=" + TF);
}

function CapitalizarDatoUsuarioAjax(){
	var xmlhttp=false;
	try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
			try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(E){
					xmlhttp = false;
			}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			xmlhttp = new XMLHttpRequest();
	}

	return xmlhttp;
}

function CapitalizarDatoUsuario(){

	resulUsuario = document.getElementById('resultadoUsuario');

	US=document.frmbusquedaUsuario.UsuarioACapitalizar.value;     //esta se agrego
	TI=document.frmbusquedaUsuario.TiempoInicioUsuario.value;     //esta se agrego
	TF=document.frmbusquedaUsuario.TiempoFinUsuario.value;     //esta se agrego

	ajax=CapitalizarDatoUsuarioAjax();
	ajax.open("POST", "capitalizacion.usuario.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resulUsuario.innerHTML = ajax.responseText
		}
	}
	
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("&tiempoi=" + TI + "&tiempof=" + TF + "&usuario1=" + US);
}
