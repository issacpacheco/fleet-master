<?php
namespace nsusuarios;
use conexionbd\mysqlconsultas;

class usuarios extends mysqlconsultas{
    public function obtener_usuarios(){
        $qry = "SELECT *, CONCAT(nombre, ' ', paterno, ' ', materno) AS nombre_usuario FROM usuarios";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_usuario($id){
        $qry = "SELECT * FROM usuarios WHERE id = '$id'";
        $res = $this->consulta($qry);
        return $res;
    }
}


?>