<?php
include_once 'models/evento.php';
class AsistenteModel extends Modelo{
    public function __construct(){
        parent::__construct();
    } 

    public function insert($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO asistente(cedula,nombre,correo) value(:cedula,:nombre,:correo)');
            $query->execute(['cedula'=>$datos['cedula'],'nombre'=>$datos['nombre'],'correo'=>$datos['correo']]);
        }catch(PDOException $e){
        }
        try{
            $query = $this->db->connect()->prepare('INSERT INTO asistentes_del_evento(evento_id,asistente_cedula) value(:evento,:cedula)');
            $query->execute(['evento'=>$datos['evento'],'cedula'=>$datos['cedula']]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function activeEvents(){
        $items = [];

        try{
            $query = $this->db->connect()->query('Select id,nombre,capacidad_max as cap_max,fecha_inicio,fecha_fin From evento where fecha_inicio < now() && fecha_fin > now()');
            while($row = $query->fetch()){
                $item = new Evento();
                $item->id      = $row['id'];
                $item->nombre  = $row['nombre'];
                $item->cap_max = $row['cap_max'];
                $item->fecha_inicio = $row['fecha_inicio'];
                $item->fecha_fin = $row['fecha_fin'];
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function asistentesEventos($datos){
        $cant_asist = [];
        foreach($datos as $row){
            $evento = new Evento();
            $evento = $row;
            try{
                $query = $this->db->connect()->query('Select count(*) as cant From asistentes_del_evento where evento_id = ' . $evento->id);
                $row = $query->fetch();
                $cant_asist[$evento->id] = $row['cant'];
            }catch(PDOException $e){
                return [];
            }
        }
        return $cant_asist;
    }
}
?>