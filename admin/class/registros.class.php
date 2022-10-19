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
    public function obtener_grafica_desague(){
        $qry = "SELECT d.id, SUM(d.registro) AS total, d.id_tracker, d.fch_registro FROM notificaciones_desague d GROUP BY d.id_tracker,d.fch_registro";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_categorias_desague(){
        $qry = "SELECT d.id, d.fch_registro FROM notificaciones_desague d GROUP BY d.fch_registro";
        $res = $this->consulta($qry);
        return $res;
    }
}


?>