/**
* Copyright (C) 2015 QualtivaWebAPP <http://www.qualtivacr.com>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
**/

// Función para recoger los datos de PHP según el navegador,(Google Chrome, Firefox, Safari).
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
 
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

//Función para recoger los datos del formulario y enviarlos por post
function enviarDatosEmpleado(){

	//div donde se mostrará lo resultados
	divResultado = document.getElementById('resultado');
	//recogemos los valores de los inputs
	num1=document.caja_temporal.numero1.value;
	num2=document.caja_temporal.numero2.value;
	num3=document.caja_temporal.numero3.value;
	num4=document.caja_temporal.numero4.value;
	num5=document.caja_temporal.numero5.value;
	can1=document.caja_temporal.cantidad1.value;
	can2=document.caja_temporal.cantidad2.value;
	can3=document.caja_temporal.cantidad3.value;
	can4=document.caja_temporal.cantidad4.value;
	can5=document.caja_temporal.cantidad5.value;
	tip=document.caja_temporal.tipo.value;

	//instanciamos el objetoAjax
	ajax=objetoAjax();

	//uso del medotod POST
	//archivo que realizará la operacion
	//registro.php
	ajax.open("POST", "registro.php",true);
	//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
			//llamar a funcion para limpiar los inputs
			LimpiarCampos();
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("numero1="+num1+"&cantidad1="+can1+"&numero2="+num2+"&cantidad2="+can2+"&numero3="+num3+"&cantidad3="+can3+"&numero4="+num4+"&cantidad4="+can4+"&numero5="+num5+"&cantidad5="+can5+"&tipo="+tip)
}
 
//función para limpiar los campos
function LimpiarCampos(){
	document.caja_temporal.numero1.value="";
	document.caja_temporal.numero2.value="";
	document.caja_temporal.numero3.value="";
	document.caja_temporal.numero4.value="";
	document.caja_temporal.numero5.value="";
	document.caja_temporal.cantidad1.value="";
	document.caja_temporal.cantidad2.value="";
	document.caja_temporal.cantidad3.value="";
	document.caja_temporal.cantidad4.value="";
	document.caja_temporal.cantidad5.value="";
	document.caja_temporal.tipo.value="";
	document.caja_temporal.numero1.focus();
}
