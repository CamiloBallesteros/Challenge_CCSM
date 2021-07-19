<?php
    class Ayuda extends Controlador{

        function __construct(){
            parent::__construct();
            $this->view->mensaje="Seccion de ayuda";
        }
        function render(){
            $this->view->render('ayuda/index');
        }
    }

?>