<?php
include_once 'models/evento.php';
include_once 'models/asistente.php';
include_once 'models/asist_event.php';
class AdministradorModel extends Modelo{
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

    public function deleteAsist($cedula){
        try{
            $query = $this->db->connect()->prepare('delete from asistente where cedula = :cedula');
            $query->execute(['cedula' => $cedula]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function deleteEvent($id){
        try{
            $query = $this->db->connect()->prepare('delete from evento where id = :id');
            $query->execute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getByCC($PK){
        $item = new Asistente();
        $query = $this->db->connect()->prepare("select * from asistente where cedula=:PK");
        try{
            $query->execute(['PK' => $PK]);
            $row = $query->fetch();
            $item->cedula      = $row['cedula'];
            $item->nombre      = $row['nombre'];
            $item->correo      = $row['correo'];
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
    public function getById($PK){
        $item = new Evento();
        $query = $this->db->connect()->prepare("select * from evento where id=:PK");
        try{
            $query->execute(['PK' => $PK]);
            $row = $query->fetch();
            $item->id           = $row['id'];
            $item->nombre       = $row['nombre'];
            $item->cap_max      = $row['capacidad_max'];
            $item->fecha_inicio = $row['fecha_inicio'];
            $item->fecha_fin    = $row['fecha_fin'];
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
    public function updateAsist($item){
        try{
            $query = $this->db->connect()->prepare('update asistente set nombre = :nombre ,correo = :correo where cedula = :cedula');
            $query->execute(['nombre' => $item["nombre"],'correo' => $item["correo"],'cedula' => $item["cedula"]]);
            return $item;
        }catch(PDOException $e){
            return $item;
        }
    }
    public function updateEvent($item){
        try{
            $query = $this->db->connect()->prepare('update evento set nombre = :nombre ,fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, capacidad_max = :cap_max where id = :id');
            $query->execute(['nombre' => $item["nombre"],'fecha_inicio' => $item["fecha_inicio"],'fecha_fin' => $item["fecha_fin"], 'cap_max' => $item["cap_max"], 'id' => $item["id"]]);
            return $item;
        }catch(PDOException $e){
            return $item;
        }
    }

    public function insertAsist($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO asistente(cedula,nombre,correo) value(:cedula,:nombre,:correo)');
            $query->execute(['cedula'=>$datos['cedula'],'nombre'=>$datos['nombre'],'correo'=>$datos['correo']]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function insertEvent($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO evento(id,nombre,capacidad_max,fecha_inicio,fecha_fin) value(:id,:nombre,:capacidad_max,:fecha_inicio,:fecha_fin)');
            $query->execute(['id'=>$datos['id'],'nombre'=>$datos['nombre'],'capacidad_max'=>$datos['cap_max'],'fecha_inicio'=>$datos['fecha_inicio'],'fecha_fin'=>$datos['fecha_fin']]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>