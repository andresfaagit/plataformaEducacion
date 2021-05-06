<?php 
    //error_reporting(-1);
    class LoginController {
        
        public function defaultAction(){
            //require_once "modelo";

            $bodyToCharge = "login/bodyLogin.php";
            $navToCharge = 'base/navBars/unloggedNavBar.php';
            include VIEWS."base/basePage.php";
        }

        public function checkLogin(){
            require_once MODELS."login/loginModel.php";
            $loginModel = new LoginModel();
            
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            
            if(!($this -> emptyVars($userName, $password))){
                if($this -> canLogin($userName, $password)){
                    //login admin -> correcto 
                    session_start();
                    //datos de usuario por un objeto, serializarlo, ver
                    $_SESSION['userLogged'] = 'ADMIN';
                    $_SESSION['rolAccessUserLogged'] = 'ADMIN';
                    $_SESSION['levelAccess'] = 1; //ADMIN

                    include VIEWS."login/bodyFadeLogin.php";
                    header ('Refresh: 1.5 ; url= ../'.$GLOBALS['public'].'/index.php?c=login&a=accessLogin');              
                }else{ 
                    //login incorrecto
                    include VIEWS."login/bodyFadeLogin.php";
                    header ('Refresh: 1.5 ; url= ../'.$GLOBALS['public'].'/index.php?c=login');                    
                }
            }else{
                include VIEWS."login/login.php";
            } 
        }

        public function logout(){
            //require_once "modelo";

            session_start();
            session_destroy();
           
            //require_once "vista";
            include VIEWS."login/bodyFadeLogin.php";
            header ('Refresh: 1.5 ; url= ../'.$GLOBALS['public'].'/index.php?c=login');
        }

        public function accessLogin(){
            //cada metodo en las acciones hay que hacer el start y $actualUser para tenerlo en todas las acciones.
            //ESTO EN TODOS LOS MËTODOS:
            //--> session_start();  
            //--> $actualUser = $_SESSION['userLogged'];

            //La info de usuario logeado sea objeto o json, ver...
            //FALTA: Mantener el userlogged entre las ops del nav -> se hace trayendo los datos de la sesion.
            //Controles de login en los controladores -> si está logeado, si el nivel de acceso, etc: similar a defaultAction de solicitudDenuncia.php


            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            if (is_null($actualUser)){
                header ('location: ../'.$GLOBALS['public'].'/index.php?c=login');    
            }else{ 
                //Dependiendo el nivel del usuario, que nav mostrará -> $navToCharge = base/navBars/navAdmin.php
                switch ($levelAccessUser){
                    case 1:
                        $bodyToCharge = "login/bodyAccessLogin.php";
                        $navToCharge = 'base/navBars/adminNavBar.php';
                        include VIEWS."base/basePage.php";
                    
                    case 2:
                        $bodyToCharge = "";
                        $navToCharge = '';
                        //include VIEWS."";

                    default:
                        $bodyToCharge = "login/x.php";
                        $navToCharge = 'base/navBars/x.php';
                        //include VIEWS."base/x.php";
                }
            }
        }

        public function loginUnico(){
            echo("ENTRA");
            $var = $_POST['var'];

        }

        //----------------------------------------------------------------------------------//

        private function canLogin(string $userRec, string $passwordRec){
            //Si usuario y password coinciden
            $loginModel = new LoginModel();

            if($loginModel -> loginAD($userRec, $passwordRec)){
                echo("login Success");
                return true;
            }else{
                echo("login Error");
                return false;
            }
        }

        private function emptyVars($userRec, $passwordRec){
            if (!isset($userRec) && !isset($passwordRec)){
                return true;
            }else{
                return false;
            }
        }
    }

?>