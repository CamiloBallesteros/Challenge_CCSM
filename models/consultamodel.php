<?php
include_once 'models/evento.php';
include_once 'models/asistente.php';
include_once 'models/asist_event.php';
class ConsultaModel extends Modelo{
    public function __construct(){
        parent::__construct();
    }

    public function select($datos){
        $tabla = $datos['tabla'];
        $items = [];

        try{
            $query = $this->db->connect()->query('Select * From '.$tabla);
            while($row = $query->fetch()){
                if(strcmp($tabla,"asistente")==0){
                    $item = new Asistente();
                    $item->cedula   = $row['cedula'];
                    $item->nombre   = $row['nombre'];
                    $item->correo   = $row['correo'];
                }
                if(strcmp($tabla,"evento")==0){
                    $item = new Evento();
                    $item->nombre       = $row['nombre'];
                    $item->id           = $row['id'];
                    $item->fecha_inicio = $row['fecha_inicio'];
                    $item->fecha_fin    = $row['fecha_fin'];
                    $item->cap_max      = $row['capacidad_max'];
                }
                if(strcmp($tabla,"asistentes_del_evento")==0){
                    $item = new Asist_event();
                    $item->id       = $row['evento_id'];
                    $item->cedula   = $row['asistente_cedula'];
                    $item->hora     = $row['hora_llegada'];
                }
                
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function colNames($datos){
        $tabla = $datos['tabla'];
        $items = [];

        try{
            $query = $this->db->connect()->query('select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = "'.$tabla.'" order by COLUMN_NAME desc');
            while($row = $query->fetch()){
                array_push($items,$row['COLUMN_NAME']);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

}
?>