<?php 
    class CourseModel {   
        public function create($dataArray){
            include DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "INSERT INTO curso (nombre, fecha_inicio, fecha_fin, cantidad_cupos, cantidad_inscriptos, cantidad_cupos_restantes, infoCurso, fecha_limite) 
                    VALUES ";
            $sql .= implode(',', $dataArray);
            
            if (mysqli_query($actualConnection, $sql)) {
                //echo "New record created successfully";
            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($actualConnection);
            }

            $connection -> closeConnection($actualConnection);
        }

        public function edit($courseId, $dataArray){
            //requiere_once necesario para que no crashee al llamar dos veces una funcion de un modelo
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //accedo a dato array --->>> $dataArray['name']
            //CONSULTA SQL
            if(isset($dataArray['newPlacesAvailable'])){
                $sql = "UPDATE curso 
                        SET nombre = '".$dataArray["name"]."', 
                            fecha_limite = '".$dataArray["deadline"]."',
                            fecha_inicio = '".$dataArray["firstDate"]."',
                            fecha_fin = '".$dataArray["lastDate"]."',
                            cantidad_cupos = '".$dataArray["placesAvailable"]."',
                            cantidad_cupos_restantes = '".$dataArray["newPlacesAvailable"]."',
                            infoCurso = '".$dataArray["aboutCourse"]."'                       
                        WHERE id ='".$courseId."'";
            }else{
                $sql = "UPDATE curso 
                        SET nombre = '".$dataArray["name"]."', 
                            fecha_limite = '".$dataArray["deadline"]."',
                            fecha_inicio = '".$dataArray["firstDate"]."',
                            fecha_fin = '".$dataArray["lastDate"]."',
                            cantidad_cupos = '".$dataArray["placesAvailable"]."',
                            infoCurso = '".$dataArray["aboutCourse"]."'                       
                        WHERE id ='".$courseId."'";
            }

            $result = mysqli_query($actualConnection, $sql);
        
            if (mysqli_query($actualConnection, $sql)) {
                echo "New record modified successfully";
            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($actualConnection);
            }

            $connection -> closeConnection($actualConnection); 
        }

        public function getAllDocuments(){
            //borrar
            include DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM tipodocumento";
            $result = mysqli_query($actualConnection, $sql);

            while ($row = mysqli_fetch_array($result)){
                $data[] = array(
                    id => $row['id'],  
                    tipo => $row['tipo'],       
                );
            }        

            $connection -> closeConnection($actualConnection);
            return json_encode($data);
        }

        public function getAllCourses(){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM curso
                    ORDER BY id ASC";
            $result = mysqli_query($actualConnection, $sql);

            while ($row = mysqli_fetch_array($result)){
                $data[] = array(
                    'id' => $row['id'],  
                    'nombre' => $row['nombre'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin'],
                    'fecha_limite' => $row['fecha_limite'],
                    'cantidad_cupos' => $row['cantidad_cupos'],
                    'cantidad_inscriptos' => $row['cantidad_inscriptos'],
                    'cantidad_cupos_restantes' => $row['cantidad_cupos_restantes'],
                    'infoCurso' => $row['infoCurso'],       
                );
            }     
            
            $connection -> closeConnection($actualConnection);

            return json_encode($data, JSON_FORCE_OBJECT);
        }

        public function getAllCoursesWithLimit($start, $amount){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM curso
                    ORDER BY id ASC
                    LIMIT $start, $amount";
            $result = mysqli_query($actualConnection, $sql);

            while ($row = mysqli_fetch_array($result)){
                $data[] = array(
                    'id' => $row['id'],  
                    'nombre' => $row['nombre'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin'],
                    'fecha_limite' => $row['fecha_limite'],
                    'cantidad_cupos' => $row['cantidad_cupos'],
                    'cantidad_inscriptos' => $row['cantidad_inscriptos'],
                    'cantidad_cupos_restantes' => $row['cantidad_cupos_restantes'],
                    'infoCurso' => $row['infoCurso'],       
                );
            }     
            
            $connection -> closeConnection($actualConnection);

            return json_encode($data, JSON_FORCE_OBJECT);
        }

        public function getCountCourses(){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM curso
                    ORDER BY id ASC";
            $result = mysqli_query($actualConnection, $sql);  

            while ($row = mysqli_fetch_array($result)){
                $data[] = array();
            }
            
            $connection -> closeConnection($actualConnection);

            $total_items = count($data);

            return json_encode($total_items, JSON_FORCE_OBJECT); 
        }

        public function getCourse($courseId){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM curso
                    WHERE id ='".$courseId."'";
            $result = mysqli_query($actualConnection, $sql);

            if ($row = mysqli_fetch_array($result)){
                $data[] = array(
                    'id' => $row['id'],  
                    'nombre' => $row['nombre'],
                    'fecha_inicio' => $row['fecha_inicio'],
                    'fecha_fin' => $row['fecha_fin'],
                    'cantidad_cupos' => $row['cantidad_cupos'],
                    'cantidad_inscriptos' => $row['cantidad_inscriptos'],
                    'cantidad_cupos_restantes' => $row['cantidad_cupos_restantes'],
                    'infoCurso' => $row['infoCurso'],
                    'fecha_limite' => $row['fecha_limite'],  
                );
            }  

            $connection -> closeConnection($actualConnection);           
            return json_encode($data, JSON_FORCE_OBJECT); 
        }

        public function getInscriptions($courseId){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM inscripcion
                    WHERE idCurso ='".$courseId."'";
            $result = mysqli_query($actualConnection, $sql);

            while ($row = mysqli_fetch_array($result)){
                $data[] = array(
                    'id' => $row['id'],  
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'dni' => $row['dni'],
                    'email' => $row['email'],
                    'telefono' => $row['telefono'],
                    'direccion' => $row['direccion'],
                    'ocupacion' => $row['ocupacion'],
                    'empresa' => $row['empresa'],
                    'fecha_nacimiento' => $row['fecha_nacimiento'],
                    'fecha_inscripcion' => $row['fecha_inscripcion'],           
                );
            }        

            $connection -> closeConnection($actualConnection);
            return json_encode($data, JSON_FORCE_OBJECT);
        }

        public function getPlaces($courseId){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT cantidad_cupos
                    FROM curso
                    WHERE id ='".$courseId."'";
            $result = mysqli_query($actualConnection, $sql);

            if ($row = mysqli_fetch_array($result)){
                $data[] = array(
                    'cantidad_cupos' => $row['cantidad_cupos'],            
                );
            }
            
            $connection -> closeConnection($actualConnection);           
            return json_encode($data);  

            /*if ($row = mysqli_fetch_array($result)){
                $data['cantidad_cupos'] = $row['cantidad_cupos'];            
            }

            $connection -> closeConnection($actualConnection);
            unset($actualConnection); unset($connection); 

            return $data['cantidad_cupos'];
            */      
        }       
    }
?>