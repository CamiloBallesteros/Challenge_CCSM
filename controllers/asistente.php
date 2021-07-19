<?php
    class Asistente extends Controlador{

        function __construct(){
            parent::__construct();
            $this->view->mensaje ="Panel de registro de asistentes";
            $this->view->info_reg="";
            $this->view->eventos = [];
        }

        function render(){
            $eventos = $this->model->activeEvents();
            $this->view->eventos = $eventos;
            $cantAsistentes = $this->model->asistentesEventos($eventos);
            $this->view->cantAsistentes = $cantAsistentes;
            $this->view->render('asistente/index');
        }

        function registrarAsistente(){
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $evento = $_POST['evento'];
            
            $info_reg="";
            if($this->model->insert(['cedula'=>$cedula,'nombre'=>$nombre,'correo'=>$correo,'evento'=>$evento])){
                $info_reg = "Asistente registrado correctamente";
            }else{
                $info_reg = "Error: El asistente ya se encontraba registrado al evento";
            }
            $this->view->info_reg = $info_reg;
            $this->render();
        }
    }

?>