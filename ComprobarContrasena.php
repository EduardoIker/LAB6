<?php
//incluimos la clase nusoap.php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
//creamos el objeto de tipo soap_server
$ns="http://eisw.hol.es/LAB-6/HTML4/samples";
$server = new soap_server;
$server->configureWSDL('ComprobarContrasena',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//registramos la función que vamos a implementar
//se podría registrar mas de una función
$server->register('ComprobarContrasena', array('x'=>'xsd:string'), array('z'=>'xsd:string'), $ns);
//implementamos la función
function ComprobarContrasena ($x){
	$file = fopen("toppasswords.txt", "r");
	while(!feof($file)) {
       $linea = trim(fgets($file));
	   if(strcmp($linea, $x)==0){
		  fclose($file);
		  return "INVALIDA";
	   }         
    }
	fclose($file);
	return "VALIDA";
}
//llamamos al método service de la clase nusoap
$rawPostData = file_get_contents("php://input");
$server->service($rawPostData);
?>