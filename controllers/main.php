<?php
    class Main extends Controlador{

        function __construct(){
            parent::__construct();
            $this->view->mensaje ="Inicio";
        }

        function render(){
            $this->view->render('main/index');
        }
    }

?>