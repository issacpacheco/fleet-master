<?php
namespace nsregistros;
use conexionbd\mysqlconsultas;

class registros extends mysqlconsultas{
    public function obtener_registros_gasolina(){
        $qry = "SELECT * FROM registro_gasolina";
        $res = $this->consulta($qry);
        return $res;
    }
}


?>