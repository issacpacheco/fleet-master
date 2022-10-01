<?php
namespace nsregistros;
use conexionbd\mysqlconsultas;

class registros extends mysqlconsultas{
    public function obtener_registros_gasolina(){
        $qry = "SELECT * FROM registro_gasolina";
        $res = $this->consulta($qry);
        return $res;
    }
    public function obtener_ultima_carga($id){
        $qry = "SELECT * FROM registro_gasolina WHERE id_tracker = $id ORDER BY id DESC LIMIT 1";
        $res = $this->consulta($qry);
        return $res;
    }
}


?>