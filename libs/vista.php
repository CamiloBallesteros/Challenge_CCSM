<?php
    class Vista{
        function __construct(){
        }

        function render($nombre){
            require 'views/' . $nombre . '.php';
        }
    }
?>