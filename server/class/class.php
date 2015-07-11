<?php

/**
 * @author Cesar Cancino Z
 * @copyright 2012
 */

class Usuarios
{
    private $productos;
    public function __construct()
    {
        $this->productos=array();
    }

    public function con()
    {
        $con=mysql_connect("localhost","user","pass");
        mysql_query("SET NAMES 'utf8'");
        mysql_select_db("db");
        return $con;
    }
     public function comillas_inteligentes($valor)
    	{
    		// Retirar las barras
    		if (get_magic_quotes_gpc()) {
    			$valor = stripslashes($valor);
    		}

    		// Colocar comillas si no es entero
    		if (!is_numeric($valor)) {
    			$valor = "'" . mysql_real_escape_string($valor) . "'";
    		}
    		return $valor;
    	}
        public function ruta()
        {
            return "http://localhost:8080/webservices/client/";
        }
       public function get_productos()
       {
            $sql="select
                p.id_producto,p.producto,p.precio,c.categoria
                from
                productos as p,categorias as c
                where
                p.id_categoria=c.id_categoria
            ";
            $res=mysql_query($sql,self::con());
            while($reg=mysql_fetch_assoc($res))
            {
                $this->productos[]=$reg;
            }
                return $this->productos;
       }
    public function add_producto_server($pro,$precio,$cat)
    {

        self::con();
        $sql=sprintf
        (
            "insert into productos values (null,%s,%s,%s);",
            self::comillas_inteligentes($pro),self::comillas_inteligentes($precio),self::comillas_inteligentes($cat)
        );
        mysql_query($sql);
        return 1;
     }

}

?>
