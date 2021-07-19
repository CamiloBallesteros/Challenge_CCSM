<?php
    class Estadistica extends Controlador{

        function __construct(){
            parent::__construct();
            $this->view->mensaje ="Panel de Estadisticas";
        }
        function render(){
            $this->view->render('estadistica/index');
        }
    }

?>