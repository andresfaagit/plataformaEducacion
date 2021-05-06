<?php 
    error_reporting (0);
    //Public to name -> name principal folder (url principal NAME --> localhost/project_name/principal_name/index.php)
    $public = 'inscripciones'; 
    $GLOBALS['public'] = $public;

    //Pagination items for the page on all paginations
    $GLOBALS['items_for_page'] = 15;

    //dirección host base
    define("HOST_BASE",$_SERVER['HTTP_HOST']);
    //dirección base
    define("URI_BASE", $_SERVER['REQUEST_URI']);
    //dirección de los modelos
    define("MODELS", '../app/models/');
    //dirección de las vistas
    define("VIEWS", '../resources/views/');
    //dirección de los controladores
    define("CONTROLLERS", '../app/controllers/');
    //Index -> front controller
    //Name principal folder in url
    define("INDEX",'../'.$public.'/index.php');
    //dirección de los controladores AJAXs
    define("AJAX",'../app/controllers/ajaxController/');

    //dirección de los idiomas
    define("LANGUAGE", '../resources/lang/');

    //librerías externas
    define("EXTERNAL_LIBRARIES", '../externalLibraries/');
    
    //Controlador y acción por default
    define("DEFAULT_CONTROLLER", 'coverPage');
    define("DEFAULT_ACTION", 'defaultAction');
    //Si la página está en mantenimiento se lececciona esta opción:
    //define("DEFAULT_ACTION", 'maintenance');
    
    //dirección de las BDs
    define("DBS", '../config/database/');

    //Entorno (BD) utilizado actualmente (se selecciona un entorno):
    define("ENVIRONMENT", 'PRODUCTION');
    //define("ENVIRONMENT", 'TESTING');
    //define("ENVIRONMENT", 'DEVELOPMENT');
    //define("ENVIRONMENT", 'LOCALHOST');

    switch (ENVIRONMENT){
        case 'PRODUCTION':
            define("DB_HOST", 'localhost');  
            define("DB_USER", 'platero');  
            define("DB_PASSWORD", 'Pr1maver4Zer0');  
            define("DB_DATABSE", 'plateduc');
        break;
        case 'TESTING':
            define("DB_HOST", '');  
            define("DB_USER", '');  
            define("DB_PASSWORD", '');  
            define("DB_DATABSE", '');
        break;
        case 'DEVELOPMENT':
            define("DB_HOST", '');  
            define("DB_USER", '');  
            define("DB_PASSWORD", '');  
            define("DB_DATABSE", '');
        break; 
        case 'LOCALHOST':
            define("DB_HOST", 'localhost');  
            define("DB_USER", 'root');  
            define("DB_PASSWORD", 'root');  
            define("DB_DATABSE", 'plataformaeducacion');
        break; 
    }
?>