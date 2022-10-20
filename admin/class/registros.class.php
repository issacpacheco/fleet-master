<?php
namespace nsregistros;
use conexionbd\mysqlconsultas;
use nsfunciones\funciones;

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
    public function obtener_grafica_desague($id_tracker,$fch_registro){
        $qry = "SELECT d.id, SUM(d.registro) AS total, d.id_tracker, d.fch_registro FROM notificaciones_desague d WHERE d.id_tracker = $id_tracker AND d.fch_registro = '$fch_registro' GROUP BY d.id_tracker,d.fch_registro ORDER BY d.fch_registro";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_lista_desague(){
        $qry = "SELECT d.id, d.id_tracker FROM notificaciones_desague d GROUP BY d.id_tracker";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_categorias_desague(){
        $qry = "SELECT d.id, d.fch_registro FROM notificaciones_desague d GROUP BY d.fch_registro";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_carga_descarga(){
        $qry = "SELECT * FROM carga_descarga_gasolina";
        $res = $this->consulta($qry);
        return $res;
    }
}
?>