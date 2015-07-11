<?php
require_once("class/class.php");
$u=new Usuarios();
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $u->add_producto();
    exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taller 14 - Ingresar</title>
</head>

<body>


<ul>
<li><a href="ingresar.php">Ingregar Nuevo Producto</a></li>
<li><a href="ver.php">Ver Productos</a></li>
</ul>
<a href="index.php">Volver Atrás</a>
<h1>Ingresar Producto Nuevo</h1>
<?php
if(isset($_GET["m"]))
{
    switch($_GET["m"])
    {
        case '1':
            ?>
            <h3 style="color: green;">Se ingresó el nuevo producto exitosamente</h3>
            <?php
        break;
    }
}
?>
<form name="form" action="" method="post">
Producto :  <input type="text" name="pro">
<br>
Precio : <input type="text" name="precio">
<br>
Categoría : 
<select name="cat">
<option value="0">Seleccione.....</option>
<?php
$cat=$u->get_categoria();
for($i=0;$i<sizeof($cat);$i++)
{
    ?>
    <option value="<?php echo $cat[$i]["id_categoria"];?>" title="<?php echo $cat[$i]["categoria"];?>"><?php echo $cat[$i]["categoria"];?></option>
    <?php
}
?>
</select>
<hr>
<input type="hidden" name="grabar" value="si">
<input type="submit" value="Crear">
</form>

</body>
</html>