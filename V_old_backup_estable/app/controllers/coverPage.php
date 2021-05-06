<?php 
    class CoverPageController {
        
        public function defaultAction(){
            //require_once "modelo";

            //require_once "vista";

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];
            if(empty($actualUser)){
                require_once MODELS."coverPage/coverPageModel.php";
                $courseModel = new CoverPageModel();

                $courses = $courseModel -> getAllCoursesOrderByDate();

                $inscriptionCreated = $_SERVER['inscriptionCreated'];

                $bodyToCharge = "coverPage/bodyCoverPage.php";
                $navToCharge = 'base/navBars/unloggedNavBar.php';
                include VIEWS."base/basePage.php";
            }else{
                $bodyToCharge = "login/bodyAccessLogin.php";
                $navToCharge = 'base/navBars/adminNavBar.php';
                include VIEWS."base/basePage.php";
            }   
        }
        
        public function maintenance(){
            //Página en mantenimiento
            $bodyToCharge = "coverPage/bodyMaintenance.php";
            include VIEWS."base/basePage.php";   
        }

    }

?>