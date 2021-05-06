<?php 
    include_once('../config/app.php');
    include_once('../routes/routes.php');

    if(isset($_POST['c']) && isset($_POST['a'])){
        //Acciones "más privilegiadas"
        $controller = $_POST['c'];
        $action = $_POST['a'];    
    }else{
        //Recontrucción de las URLs "amigables" index.php/login
        //$uri = $_SERVER['REQUEST_URI'];
        //$splited_uri = explode("/", $uri);

        //$controller = $splited_uri[4];
        //$action = $splited_uri[5];
        //echo($_SERVER['HTTP_HOST']);
        //echo($_SERVER['REQUEST_URI']);

        $controller = $_GET['c']; 
        $action = $_GET['a']; 
    }

    $routes = new Routes();   
    //Recibo el controller a cargar (usar) y su acción a invocar
    $routes -> invoke($controller, $action);
?>


