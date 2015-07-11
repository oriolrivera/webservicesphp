<?php
 ini_set("soap.wsdl_cache_enabled", "0");
/**
 * @author Cesar Cancino Z
 * @copyright 2012
 */

class Usuarios
{
    private $cat;
    public function __construct()
    {
        $this->cat=array();
    }
    public function con()
    {
        $con=mysql_connect("localhost","user","pass");
        mysql_query("SET NAMES 'utf8'");
        mysql_select_db("db");
        return $con;
    }
    public function get_categoria()
    {
        $sql="select * from categorias";
        $res=mysql_query($sql,self::con());
        while($reg=mysql_fetch_assoc($res))
        {
            $this->cat[]=$reg;
        }
            return $this->cat;
    }
     public function ruta()
        {
            return "http://localhost:8080/webservice/client/";
        }
    public function add_producto()
    {

        $usuarios=new SoapClient("http://127.0.0.1:8080/webservice/server/service.wsdl");
       // print_r($_POST);
      $res= $usuarios->add_producto_server($_POST["pro"],$_POST["precio"],$_POST["cat"]);
      if($res==1)
      {
        header("Location: ".self::ruta()."ingresar.php?m=1");
      }
    }

}

?>
