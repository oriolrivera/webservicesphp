<?php
require_once("class/class.php");
$u=new Usuarios();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taller 14 - ver productos</title>
</head>

<body>
<?php
$usuarios=new SoapClient("http://127.0.0.1:8080/webservice/server/service.wsdl");
$datos=$usuarios->get_productos();
//print_r($datos);

?>
<ul>
<li><a href="ingresar.php">Ingregar Nuevo Producto</a></li>
<li><a href="ver.php">Ver Productos</a></li>
</ul>
<a href="index.php">Volver Atrás</a>
<h1>Productos</h1>
<ul>
<?php
for($i=0;$i<sizeof($datos);$i++)
{
?>
<li>
Producto : <?php echo $datos[$i]["producto"];?>
<br>
Precio : <?php echo number_format($datos[$i]["precio"],0,"",".");?>
<br>
Categoría : <?php echo $datos[$i]["categoria"];?>
<hr>
</li>
<?php
}
?>
</ul>

</body>
</html>
