<?php 
    //Contiene los textos "fijos" que se muestran en la web
    
    class GeneralPageTexts {
        //Textos principales de toda la web (título, header, footer y navs)
        private $lang ="es";
        private $title = "OPDS - Autoridad Ambiental";
        private $subTitle = "";
        private $nav1 = "Inicio"; 
        private $nav2 = "Ingresar"; 
        private $nav3 = "Salir";
        private $nav4 = "Inscripción a cursos";
        private $footerText1 ="Redes Sociales OPDS";

        private $nav10 = "Crear curso";
        private $nav11 = "Info cursos";  
        private $nav12 = "Administrar cursos";

        //Setters and Getters
        public function setLang($textRec){
            $this->lang = $textRec;
        }

        public function getLang(){
            return ($this->lang);
        }

        public function setTitle($textRec){
            $this->title = $textRec;
        }

        public function getTitle(){
            return ($this->title);
        }

        public function setSubTitle($textRec){
            $this->subTitle = $textRec;
        }

        public function getSubTitle(){
            return ($this->subTitle);
        }

        public function setNav1($textRec){
            $this->nav1 = $textRec;
        }

        public function getNav1(){
            return ($this->nav1);
        }

        public function setNav2($textRec){
            $this->nav2 = $textRec;
        }

        public function getNav2(){
            return ($this->nav2);
        }

        public function setNav3($textRec){
            $this->nav3 = $textRec;
        }

        public function getNav3(){
            return ($this->nav3);
        }

        public function setNav4($textRec){
            $this->nav4 = $textRec;
        }

        public function getNav4(){
            return ($this->nav4);
        }

        public function setFooterText1($textRec){
            $this->footerText1 = $textRec;
        }

        public function getFooterText1(){
            return ($this->footerText1);
        }

        public function setNav10($textRec){
            $this->nav10 = $textRec;
        }

        public function getNav10(){
            return ($this->nav10);
        }

        public function setNav11($textRec){
            $this->nav11 = $textRec;
        }

        public function getNav11(){
            return ($this->nav11);
        }
        public function setNav12($textRec){
            $this->nav12 = $textRec;
        }

        public function getNav12(){
            return ($this->nav12);
        }
    }

    class CoverPageTexts{
        //Texts of cover Page
        private $text1 = "Información sobre los cursos";
        private $text2 = "Educación Ambiental OPDS";

        //Setters and Getters       
        public function setText1($textRec){
            $this->text1 = $textRec;
        }
        
        public function getText1(){
            return ($this->text1);
        } 

        public function setText2($textRec){
            $this->text2 = $textRec;
        }
        
        public function getText2(){
            return ($this->text2);
        }
    }

    class CourseInscriptionTexts{
        //Texts of course inscription
        private $text1 = "Inscripción a cursos";
        private $text2 = "Educación Ambiental OPDS";
        private $text3 = "Los interesados en inscribirse a un curso, deberán completar el formulario con los datos solicitados";
        private $text4 = "Formulario de inscripción";
        private $buttonInscription = "Inscribirme";

        //Setters and Getters       
        public function setText1($textRec){
            $this->text1 = $textRec;
        }

        public function getText1(){
            return ($this->text1);
        } 

        public function setText2($textRec){
            $this->text2 = $textRec;
        }

        public function getText2(){
            return ($this->text2);
        } 

        public function setText3($textRec){
            $this->text3 = $textRec;
        }

        public function getText3(){
            return ($this->text3);
        } 

        public function setText4($textRec){
            $this->text4 = $textRec;
        }

        public function getText4(){
            return ($this->text4);
        } 

        public function setButtonInscription($textRec){
            $this->buttonInscription = $textRec;
        }

        public function getButtonInscription(){
            return ($this->buttonInscription);
        } 
    }

    class CourseInformationTexts{
        //Texts of course information
        private $text1 = "Información de los cursos";
        private $text2 = "Tabla con los cursos y su respectiva información";
        private $text3 = "Información del curso ";
        private $text4 = "Inscriptos ";

        //Setters and Getters       
        public function setText1($textRec){
            $this->text1 = $textRec;
        }

        public function getText1(){
            return ($this->text1);
        } 

        public function setText2($textRec){
            $this->text2 = $textRec;
        }

        public function getText2(){
            return ($this->text2);
        }

        public function setText3($textRec){
            $this->text3 = $textRec;
        }

        public function getText3(){
            return ($this->text3);
        } 

        public function setText4($textRec){
            $this->text4 = $textRec;
        }

        public function getText4(){
            return ($this->text4);
        } 
    }

    class CourseTexts{
        //Textos de la creación de un curso
        private $body = "";
        private $text1 = "Creación de un curso";
        private $text2 = "Formulario de creación del curso";
        private $buttonCourse = "CREAR CURSO";
        
        //Setters and Getters       
        public function setBody($textRec){
            $this->title = $textRec;
        }

        public function getBody(){
            return ($this->body);
        } 
        
        public function setText1($textRec){
            $this->text1 = $textRec;
        }

        public function getText1(){
            return ($this->text1);
        } 

        public function setText2($textRec){
            $this->text2 = $textRec;
        }

        public function getText2(){
            return ($this->text2);
        }  
        
        public function setButtonCourse($textRec){
            $this->buttonCourse = $textRec;
        }

        public function getbuttonCourse(){
            return ($this->buttonCourse);
        } 
    }

    class CourseEditTexts{
        //Textos de la edición de un curso
        private $text1 = "Editar/Modificar curso";
        private $text2 = "Formulario de edición del curso";
        private $buttonCourse = "EDITAR CURSO";
        
        //Setters and Getters             
        public function setText1($textRec){
            $this->text1 = $textRec;
        }

        public function getText1(){
            return ($this->text1);
        } 

        public function setText2($textRec){
            $this->text2 = $textRec;
        }

        public function getText2(){
            return ($this->text2);
        }  
        
        public function setButtonCourse($textRec){
            $this->buttonCourse = $textRec;
        }

        public function getbuttonCourse(){
            return ($this->buttonCourse);
        } 
    }

    class LoginTexts{
        private $loginTitle = "Ingreso";
        private $userText = "Usuario";  
        private $passwordText = "Contraseña"; 
        private $buttonLogin = "Ingresar";

        public function setLoginTitle($textRec){
            $this->loginTitle = $textRec;
        }

        public function getLoginTitle(){
            return ($this->loginTitle);
        } 

        public function setUserText($textRec){
            $this->userText = $textRec;
        }

        public function getUserText(){
            return ($this->userText);
        } 

        public function setPasswordText($textRec){
            $this->passwordText = $textRec;
        }

        public function getPasswordText(){
            return ($this->passwordText);
        }

        public function setButtonLogin($textRec){
            $this->buttonLogin = $textRec;
        }

        public function getButtonLogin(){
            return ($this->buttonLogin);
        }
    }       
?>
 