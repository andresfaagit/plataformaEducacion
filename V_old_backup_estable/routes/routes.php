<?php
    class Routes {
        private function loadController($controller){
            //Nombre del controlador
            $nameController = ucwords($controller."Controller");
            //Archivo donde encontrar el controlador
            $controllerToCharge = CONTROLLERS.$controller.'.php';
 
            //$controllerToCharge Controler que carga
            if(!is_file($controllerToCharge)){
                //Si no existe el controlador solicitado; se carga el por defecto
                $controllerToCharge = CONTROLLERS.DEFAULT_CONTROLLER.'.php';       
                $nameController = ucwords(DEFAULT_CONTROLLER."Controller");
            }
            //Sino cargo el controlador solicitado
            require_once($controllerToCharge);    
            return $nameController;   
        }

        private function executeAccion($controller, $action){
            $controller = new $controller();
            $controller -> $action();
        }

        public function invoke($controller, $action){
            //Si no hay una acción definida para este controller, ejecuta la acción por Default
            //Si hay un controller y una acción a ejecutar, se ejecuta. Si el método no existe ejecuta la por Default
            $controllerCharged = $this -> loadController($controller);
            if (isset ($controller)){
                //$controllerCharged = $this -> loadController($controller);
                if (method_exists($controllerCharged,$action)){
                    $this -> executeAccion($controllerCharged, $action);             
                }else{
                    $this -> executeAccion($controllerCharged, DEFAULT_ACTION);               
                }
            }else{
                $this -> executeAccion($controllerCharged, DEFAULT_ACTION);
            }
        }
    }
    
/*
    SIN OBJETOS HUBIESE SIDO:
    function loadController($controller){
        //Nombre del controlador
        $nameController = ucwords($controller."Controller");
        //Archivo donde encontrar el controlador
        $controllerToCharge = '../app/controllers/'.$controller.'.php';

        echo($controllerToCharge);
        if(!is_file($controllerToCharge)){
            //Si no existe el controlador solicitado; se carga el por defecto
            $controllerToCharge = '../app/controllers/'.CONTROLLER_DEFAULT.'.php';       
            $nameController = ucwords(CONTROLLER_DEFAULT."Controller");
        }
        //Sino cargo el controlador solicitado
        require_once($controllerToCharge);    
        return $nameController;       
    }

    function executeAccion($controller, $action){
        $controller = new $controller();
        $controller -> $action();
    }

    function invoke($controller, $action){
        $controllerCharged = loadController($controller);
        executeAccion($controllerCharged, $action);
    }
*/   
?>