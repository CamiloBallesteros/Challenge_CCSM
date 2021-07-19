<?php
require_once 'controllers/errors.php';
class App{
    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url']:null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        //Ingreso sin definir controlador
        if(empty($url[0])){
            $file_controller = 'controllers/main.php';
            require_once $file_controller;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }
        $file_controller = 'controllers/'.$url[0].'.php';
        
        
        if(file_exists($file_controller)){
            require_once $file_controller;
            //Inicializa controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            $nparam= sizeof($url);
            if($nparam>1){
                if($nparam>2){
                    $param = [];
                    for($i=2;$i<$nparam;$i++){
                        array_push($param,$url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }  
        }else{
            $controller = new Errors();
        }
        

    }
}
?>

</html>