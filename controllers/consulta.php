<?php
    class Consulta extends Controlador{

        function __construct(){
            parent::__construct();
            $this->view->mensaje ="Panel de Consultas";
            $this->view->result = [];
            $this->view->colNames = [];

        }
        function render(){
            $this->view->render('consulta/index');
        }

        function consultarTabla(){
            $tabla = $_POST['tabla'];
            $evento = $_POST['evento'];
            $asistente = $_POST['asistente'];
            
            $result = $this->model->select(['tabla'=>$tabla,'evento'=>$evento,'asistente'=>$asistente]);
            $colNames = $this->model->colNames(['tabla'=>$tabla]);
            $this->view->result = $result;
            $this->view->colNames = $colNames;
            $this->render();
        }
    }

?>