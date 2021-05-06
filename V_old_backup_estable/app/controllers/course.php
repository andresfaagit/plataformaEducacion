<?php 
    //error_reporting(-1);
    class CourseController {
        
        public function defaultAction(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            if(empty($actualUser)){
                $bodyToCharge = "login/bodyLogin.php";
                $navToCharge = 'base/navBars/unloggedNavBar.php';
                include VIEWS."base/basePage.php";
            }else{
                $countCourses = $courseModel -> getCountCourses(); //Model --> count(allItems_type)
                $countCourses = json_decode($countCourses, true);

                //---------Pagination
                //Number of items to display per page
                $items_for_page = $GLOBALS['items_for_page'];
                //total number of items
                $total_items = $countCourses;
                //Number of rounded pages -> ceil(4.6) = 5
                $pages = $total_items/$items_for_page;
                $pages = ceil($pages);

                //Defaul page
                if (!isset($_GET['page']) || empty($_GET['page']) || !is_numeric($_GET['page'])){
                    $_GET['page']=1;
                }

                $start = ($_GET['page'] -1) * $items_for_page;
                //---------End Pagination

                $courses = $courseModel -> getAllCoursesWithLimit($start, $items_for_page);

                $bodyToCharge = "course/bodyCourseList.php";
                $navToCharge = 'base/navBars/adminNavBar.php';
                include VIEWS."base/basePage.php";
            } 
        }

        public function createCourse(){
            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            if(empty($actualUser)){
                $bodyToCharge = "login/bodyLogin.php";
                $navToCharge = 'base/navBars/unloggedNavBar.php';
                include VIEWS."base/basePage.php";
            }else{
                $bodyToCharge = "course/bodyCreateCourse.php";
                $navToCharge = 'base/navBars/adminNavBar.php';
                include VIEWS."base/basePage.php";
            } 
        }

        public function requestInsertCourse(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            $name = $_POST['name'];
            $firstDate = $_POST['firstDate'];
            $lastDate = $_POST['lastDate'];
            $placesAvailable = $_POST['placesAvailable'];
            $numberOfRegistered = '0';
            $remainingPlaces = $_POST['placesAvailable'];
            $aboutCourse = $_POST['aboutCourse'];
            $deadline = $_POST['deadline'];
            $dataArray[] = "('$name', '$firstDate', '$lastDate', '$placesAvailable', '$numberOfRegistered', '$remainingPlaces', '$aboutCourse', '$deadline')";

            $courseModel -> create($dataArray);

            //Evitar redirección de formularios con POSt +f5
            //$bodyToCharge = "solicitudDenuncia/bodyDenunciaDemo.php";
            //include VIEWS."base/basePage.php";
            header('Location: '.INDEX.'?c=course&a=createCourse&msj=courseCreated');
        }

        public function requestEditCourse(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            $courseId = $_POST['courseId'];

            $name = $_POST['name'];
            $deadline = $_POST['deadline'];
            $firstDate = $_POST['firstDate'];
            $lastDate = $_POST['lastDate'];
            $placesAvailable = $_POST['placesAvailable'];
            $aboutCourse = $_POST['aboutCourse'];
            
            $actualCourseDB = $courseModel -> getCourse($courseId);
            
            $actualCourseDB = json_decode($actualCourseDB, true);
            $actualPlacesDB = $actualCourseDB[0]['cantidad_cupos'];
            $actualPlacesAvailableDB = $actualCourseDB[0]['cantidad_cupos_restantes'];
            $actualEnrolled = $actualCourseDB[0]['cantidad_inscriptos'];

            $dataArray = ['name' => $name, 'deadline' => $deadline, 
                      'firstDate' => $firstDate, 'lastDate' => $lastDate, 
                      'placesAvailable' => $actualPlacesDB, 'aboutCourse' => $aboutCourse];
            
            if($this -> isModified($placesAvailable, $actualPlacesDB) ){ 
                //Si se modificó la cantidad de cupos , hay que recalcular los cupos restantes --->>          
                if(($placesAvailable >= $actualEnrolled)){
                    //Si la modificación no es inferior a la cantidad de inscriptos que tenga --->>
                    //newPlacesAvailable es el cálculo de los cupos que hay, luego de modificar la cantidad
                    $newPlacesAvailable = ($placesAvailable - $actualCourseDB[0]['cantidad_inscriptos']);              
                    $dataArray['newPlacesAvailable'] = $newPlacesAvailable;
                    $dataArray['placesAvailable'] = $placesAvailable;
                }                            
            }

            $courseModel -> edit($courseId, $dataArray);

            setcookie('courseEdited', true, time() + (1), "/"); // 86400 = 1 day

            header('Location: '.INDEX.'?c=course&a=courseEdit&courseId='.$courseId);
        }

        private function isModified($placesAvailable, $actualPlacesDB){
            //requiere_once necesario para que no crashee al llamar dos veces una funcion de un modelo
            if($placesAvailable != $actualPlacesDB){
                return true;
            }else{
                return false; 
            }
        }

        public function courseList(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            if(empty($actualUser)){
                $bodyToCharge = "login/bodyLogin.php";
                $navToCharge = 'base/navBars/unloggedNavBar.php';
                include VIEWS."base/basePage.php";
            }else{          
                $countCourses = $courseModel -> getCountCourses(); //Model --> count(allItems_type)
                $countCourses = json_decode($countCourses, true);

                //---------Pagination
                //Number of items to display per page
                $items_for_page = $GLOBALS['items_for_page'];
                //total number of items
                $total_items = $countCourses;
                //Number of rounded pages -> ceil(4.6) = 5
                $pages = $total_items/$items_for_page;
                $pages = ceil($pages);

                //Defaul page
                if (!isset($_GET['page']) || empty($_GET['page']) || !is_numeric($_GET['page'])){
                    $_GET['page']=1;
                }

                $start = ($_GET['page'] -1) * $items_for_page;
                //---------End Pagination

                $courses = $courseModel -> getAllCoursesWithLimit($start, $items_for_page);

                $bodyToCharge = "course/bodyCourseList.php";
                $navToCharge = 'base/navBars/adminNavBar.php';
                include VIEWS."base/basePage.php";
            } 
        }

        public function courseInfo(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            if(isset ($_POST['courseId'])){
                $courseId = $_POST['courseId'];
            }else{
                $courseId = $_GET['courseId'];
            }
            $courseData = $courseModel -> getCourse($courseId);
            $courseData = json_decode($courseData, true);
            $inscriptions = $courseModel -> getInscriptions($courseId);

            $bodyToCharge = "course/bodyCourseInfo.php";
            $navToCharge = 'base/navBars/adminNavBar.php';
            include VIEWS."base/basePage.php";
        }

        public function courseEdit(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];
            //elimino la cookie (usada para saber si se modificó algo, previo al HeaderLocation)
            setcookie('courseEdited', null, -1, '/');

            if(isset ($_POST['courseId'])){
                $courseId = $_POST['courseId'];
            }else{
                $courseId = $_GET['courseId'];
            }
            $course = $courseModel -> getCourse($courseId);

            $course = json_decode($course, true);
           
            $bodyToCharge = "course/bodyCourseEdit.php";
            $navToCharge = 'base/navBars/adminNavBar.php';
            include VIEWS."base/basePage.php";
        }

        public function dowloadInscriptionsTxt(){

            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  

            $courseId = $_POST['courseId'];
            $inscriptions = $courseModel -> getInscriptions($courseId);

            // Create filename
            $filename = 'Curso_' . $courseId . '_Inscripciones_' . date( 'Y-m-d' );

            // Force download .json file with JSON in it
            header("Content-type: application/vnd.ms-excel");
            header("Content-Type: application/force-download");
            header("Content-Type: application/download");
            header("Content-disposition: " . $filename . ".txt");
            header("Content-disposition: filename=" . $filename . ".txt");

            print $inscriptions;
            exit;
        }

        public function dowloadInscriptionsExcel(){
            //Force dowload excel file

            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  

            $courseId = $_POST['courseId'];
            $inscriptions = $courseModel -> getInscriptions($courseId);

            // Create filename
            $filename = 'Curso_' . $courseId . '_Inscripciones_' . date( 'Y-m-d' );

            header("Content-type: application/vnd.ms-excel");
            header("Content-Type: application/force-download");
            header("Content-Type: application/download");
            header("Content-disposition: " . $filename . ".xls");
            header("Content-disposition: filename=" . $filename . ".xls");

            //Decode -> print in file -> dowload    (table structure)

            $inscriptions = json_decode($inscriptions, true);
            
            echo ('<table>');
            echo('
                <thead>
                    <tr>
                        <th>N&uacute;mero de inscripci&oacute;n</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Tel&eacute;fono</th>
                        <th>Direcci&oacute;n</th>
                        <th>Cargo</th>
                        <th>Dependencia</th>
                        <th>Fecha de inscripci&oacute;n</th>
                    </tr>
                </thead>
            ');
            echo('
                <tbody>
            ');
                foreach($inscriptions as $inscription){ 
                echo('
                    <tr>
                        <th> '.$inscription['id'].' </th>
                        <td> '.utf8_decode($inscription['nombre']).' </td>
                        <td> '.utf8_decode($inscription['apellido']).' </td>
                        <td> '.$inscription['dni'].' </td>
                        <td> '.$inscription['email'].' </td>
                        <td> '.$inscription['telefono'].' </td>
                        <td> '.utf8_decode($inscription['direccion']).' </td>
                        <td> '.utf8_decode($inscription['ocupacion']).' </td>
                        <td> '.utf8_decode($inscription['empresa']).' </td>
                        <td> '.$inscription['fecha_inscripcion'].' </td>
                    </tr>
                '); } 

            echo('               
                </tbody>
            ');               

            exit;
            echo('</table>');
        }

        public function dowloadInscriptionsPdf(){
            //Force dowload pdf file

            require_once EXTERNAL_LIBRARIES."fpdf/generacion_pdf.php";
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  

            $courseId = $_POST['courseId'];
            $inscriptions = $courseModel -> getInscriptions($courseId);

            $inscriptions = json_decode($inscriptions, true);
            
            // Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',22);
            $pdf->SetTitle('Inscriptos al curso '.$courseId , True);
            $pdf->Cell(190,10,'Inscripciones curso '.$courseId,10,10,'C');
            $pdf->Ln(10);

            $pdf->SetFont('Times','',12);
            foreach ($inscriptions as $inscription){             
                $pdf->Cell(20,10,utf8_decode('N° '.$inscription['id']),0,0,'C');         
                $pdf->MultiCell(0, 5, 
                                utf8_decode('Nombre:'. $inscription['nombre']).'   '.
                                utf8_decode('Apellido:'. $inscription['apellido']).'   '.
                                'DNI:'. $inscription['dni'].'   '.
                                'Email:'. $inscription['email'].'   '.
                                'Tel:'. $inscription['telefono'].'   '.
                                utf8_decode('Calle:'. $inscription['direccion']).'   '.
                                utf8_decode('Cargo:'. $inscription['ocupacion']).'   '.
                                utf8_decode('Dependencia:'. $inscription['empresa']).'   '.
                                'Fecha:'. $inscription['fecha_inscripcion']
                                , 0 , 'J' , false);
                $pdf->Ln(8);
            }

            $pdf->Output('Inscriptos_Curso_'.$courseId.'.pdf', 'D'); 
            //$pdf->Output('Inscriptos_Curso_'.$courseId.'.pdf', 'I'); //Verlo en el browser          
        }
        
        



        // Método para realizar pruebas
        public function prueba(){
            require_once MODELS."course/courseModel.php";
            $courseModel = new CourseModel();

            session_start();  
            $actualUser = $_SESSION['userLogged'];
            $levelAccessUser = $_SESSION['levelAccess'];

            $courseId = $_GET['courseId'];
            $inscriptions = $courseModel -> getInscriptions($courseId);

            echo ('{  "data": '.$inscriptions.' }');


            $bodyToCharge = "prueba/bodyCourseInfoPrueba.php";
            $navToCharge = 'base/navBars/adminNavBar.php';
            include VIEWS."base/basePage.php";
        }

    }

?>