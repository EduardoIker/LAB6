<?php
	//Incluimos la clase nusoap.php
	require_once('lib/nusoap.php');
	require_once('lib/class.wsdlcache.php');
	//Creamos el objeto de tipo soapclient donde se encuentra el servicio SOAP que vamos a utilizar.
	$soapclient = new nusoap_client('http://eisw.hol.es/LAB-6/HTML4/ComprobarContrasena.php?wsdl',true);
	//Llamamos la función que habíamos implementado en el Web Service e imprimimos lo que nos devuelve
	//Le enviamos como parametro la contraña que hemos recibido como parametro en la URL
	$contra=$_GET['var'];
	$result = $soapclient->call('ComprobarContrasena', array('x'=>$contra));
	echo $result;
?>