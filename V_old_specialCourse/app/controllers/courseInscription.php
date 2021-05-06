<?php 
    //error_reporting(-1);
    class CourseInscriptionController {
        
        public function defaultAction(){
            //require_once "modelo";

            //require_once "vista";
            //SIEMPRE: qué body quiero que muestre (construye toda la página en Base)

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            if(isset($_GET['courseId'])){
                $courseId = $_GET['courseId'];
            }

            if(empty($actualUser)){                
                $bodyToCharge = "courseInscription/bodyCourseInscription.php";
                $navToCharge = 'base/navBars/unloggedNavBar.php';
                include VIEWS."base/basePage.php";
            }else{
                $bodyToCharge = "login/bodyAccessLogin.php";
                $navToCharge = 'base/navBars/adminNavBar.php';
                include VIEWS."base/basePage.php";
            }        
        }

        public function createInscriptionToCourse(){
            //include MODELO
            require_once MODELS."courseInscription/courseInscriptionModel.php";
            $courseInscriptionModel = new CourseInscriptionModel();

            //LOGICA 
            $firstName = ucwords(strtolower($_POST['firstName']));
            $secondName = ucwords(strtolower($_POST['secondName']));
            $personalId = $_POST['personalId'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $addressCity = $_POST['addressCity'];
            $occupation = $_POST['occupation'];
            $company = $_POST['company'];
            $courseId = $_POST['courseType'];
            $dateInscription = date('20'.'y-m-j'); //dateToday

            $dataArray[] = "('$firstName', '$secondName', '$personalId', '$email', '$telephone', '$addressCity', '$occupation', '$company', '$dateInscription','$courseId')";

            if($this -> existInscriptionToCourse($personalId, $email, $courseId)){
                //Si ya se encuentra inscripta la persona para ese curso (para un curso -> por dni e imail)
                header ('Location: ../'.$GLOBALS['public'].'/index.php?c=courseInscription&a=defaultAction&msj=rejectInscription');
            }else{
                if($this -> courseIsFull($courseId)){
                    //Si el curso se llenó mientras completaba el formulario
                    header ('Location: ../'.$GLOBALS['public'].'/index.php?c=courseInscription&a=defaultAction&msj=courseIsFull');
                }else{    
                //Si no posee inscripción, se inscribe
                $courseInscriptionModel -> createInscription($dataArray, $courseId);
            
                $inscriptionCreated = TRUE;
                $_GET['msj']= "inscriptionCreated";

                //redirecciono la VISTA
                    
                $bodyToCharge = "courseInscription/bodyCourseInscription.php";
                $navToCharge = 'base/navBars/unloggedNavBar.php';
                include VIEWS."base/basePage.php";
                }
            }
        }

        private function existInscriptionToCourse($personalId, $email, $courseId){
            //include MODELO
            require_once MODELS."courseInscription/courseInscriptionModel.php";
            $courseInscriptionModel = new CourseInscriptionModel();

            $result = ($courseInscriptionModel -> getInscriptionPerson($personalId, $email, $courseId));

            if($result == 'null'){
                return false;
            }else{
                return true;
            }
        }

        private function courseIsFull($courseId){
            //include MODELO
            require_once MODELS."courseInscription/courseInscriptionModel.php";
            $courseInscriptionModel = new CourseInscriptionModel();

            $result = ($courseInscriptionModel -> courseFull($courseId));

            return $result;
        }
      
    }

?>