<?php
require_once("class/class.php");
$server=new SoapServer("service.wsdl");
$server->setClass("Usuarios");
$server->handle();



?>