<?php
    class Administrador extends Controlador{

        function __construct(){
            parent::__construct();
            $this->view->mensaje ="Panel de Administracion";
            $this->view->result = [];
            $this->view->colNames = [];
            $this->view->table = "";
            $this->view->info ="";

        }

        function render(){
            $this->view->render('administrador/index');
        }

        function consultarTabla(){
            $tabla = $_POST['tabla'];
            $evento = $_POST['evento'];
            $asistente = $_POST['asistente'];
            
            $result = $this->model->select(['tabla'=>$tabla,'evento'=>$evento,'asistente'=>$asistente]);
            $colNames = $this->model->colNames(['tabla'=>$tabla]);
            $this->view->result = $result;
            $this->view->colNames = $colNames;
            $this->view->table =$tabla;
            $this->render();
        }

        function verAsistente($param=null){
            $PK = $param[0];
            $item = $this->model->getByCC($PK);

            session_start();
            $_SESSION['CC_verAsistente'] =  $item->cedula;
            $this->view->item = $item;
            $this->view->render('administrador/detalleAs');
        }
        function eliminarAsistente($param = null){
            $cedula = $param[0];

            if($this->view->info = $this->model->deleteAsist($cedula)){
                $this->view->info = "Asistente eliminado correctamente";
            }else{
                $this->view->info = "Error, no fue posible eliminar";
            }
            $this->render();
        }
        function actualizarAsistente(){
            session_start();
            $cedula = $_SESSION['CC_verAsistente'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo']; 

            unset($_SESSION['CC_verAsistente']);

            if($this->view->info = $this->model->updateAsist(['cedula' => $cedula,'nombre' => $nombre,'correo' => $correo])){
                $this->view->info = "Asistente actualizado correctamente";
            }else{
                $this->view->info = "Error, no fue posible actualizar";
            }
            $this->render();
        }

        function verEvento($param=null){
            $PK = $param[0];
            $item = $this->model->getByID($PK);

            session_start();
            $_SESSION['CC_verEvento'] =  $item->id;
            $this->view->item = $item;
            $this->view->render('administrador/detalleEv');
        }

        function eliminarEvento($param = null){
            $id = $param[0];

            if($this->view->info = $this->model->deleteEvent($id)){
                $this->view->info = "Evento eliminado correctamente";
            }else{
                $this->view->info = "Error, no fue posible eliminar";
            }
            $this->render();
        }

        function actualizarEvento(){
            session_start();
            $id             = $_SESSION['CC_verEvento'];
            $nombre         = $_POST['nombre'];
            $cap_max        = $_POST['cap_max'];
            $fecha_inicio   = $_POST['fecha_inicio']; 
            $fecha_fin      = $_POST['fecha_fin'];  

            unset($_SESSION['CC_verEvento']);

            if($this->view->info = $this->model->updateEvent(['id' => $id,'nombre' => $nombre,'cap_max' => $cap_max,'fecha_inicio' => $fecha_inicio,'fecha_fin' => $fecha_fin])){
                $this->view->info = "Asistente actualizado correctamente";
            }else{
                $this->view->info = "Error, no fue posible actualizar";
            }
            $this->render();
        }
        function createAsist(){
            $this->view->render('administrador/createAsist');
        }
        function createEvent(){
            $this->view->render('administrador/createEvent');
        }
        function crearEvento(){
            $id             = $_POST['id'];
            $nombre         = $_POST['nombre'];
            $cap_max        = $_POST['cap_max'];
            $fecha_inicio   = $_POST['fecha_inicio'];
            $fecha_fin      = $_POST['fecha_fin'];
            
            $info="";
            if($this->model->insertEvent(['id'=>$id,'nombre'=>$nombre,'cap_max'=>$cap_max,'fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin])){
                $info = "Evento creado satisfactoriamente";
            }else{
                $info = "Error: El evento no pudo ser creado";
            }
            $this->view->info = $info;
            $this->render();
        }
        function crearAsistente(){
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            
            $info="";
            if($this->model->insertAsist(['cedula'=>$cedula,'nombre'=>$nombre,'correo'=>$correo])){
                $info = "Asistente creado satisfactoriamente";
            }else{
                $info = "Error: El asistente no pudo ser creado";
            }
            $this->view->info = $info;
            $this->render();
        }
    }

?>