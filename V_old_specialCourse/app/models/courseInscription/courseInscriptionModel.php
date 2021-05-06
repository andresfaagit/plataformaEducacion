<?php 
    class CourseInscriptionModel {   

        public function createInscription($dataArray, $courseId){           
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //Ocupacion, empresa es lo mismo que: Cargo, Dependencia

            if($this -> isCourseFull($courseId, $actualConnection)){
                echo "NO SE PUEDE INSCRIBIR, Curso lleno";
            }else{
                //CONSULTA SQL
                $sql = "INSERT INTO inscripcion (nombre, apellido, dni, email, telefono, direccion, ocupacion, empresa, fecha_inscripcion,idCurso) 
                        VALUES ";
                $sql .= implode(',', $dataArray); //$nombre = $data[0];

                if (mysqli_query($actualConnection, $sql)) {
                    //echo "New record created successfully";

                    //si fue posible la suscripción -> Actualizo la cantidad de inscriptos y resto un cupo al curso.                                      
                    $sql = "UPDATE curso 
                            SET cantidad_inscriptos = cantidad_inscriptos+1, 
                                cantidad_cupos_restantes = cantidad_cupos_restantes-1
                            WHERE id ='".$courseId."'";
                    mysqli_query($actualConnection, $sql);

                }else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($actualConnection);
                }
            }

            $connection -> closeConnection($actualConnection);
        }

        public function getInscription($firstName, $secondName, $personalId, $email, $courseId){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM inscripcion
                    WHERE nombre ='".$firstName."' AND
                          apellido ='".$secondName."' AND
                          dni ='".$personalId."' AND
                          email ='".$email."' AND
                          idCurso ='".$courseId."'";
            $result = mysqli_query($actualConnection, $sql);

            if ($row = mysqli_fetch_array($result)){
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
                    'fecha_inscripcion' => $row['fecha_inscripcion'],
                    'idCurso' => $row['idCurso'],
                );
            }  

            $connection -> closeConnection($actualConnection);           
            return json_encode($data, JSON_FORCE_OBJECT); 
        }

        public function getInscriptionPerson($personalId, $email, $courseId){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM inscripcion
                    WHERE dni ='".$personalId."' AND
                          email ='".$email."' AND
                          idCurso ='".$courseId."'";
            $result = mysqli_query($actualConnection, $sql);

            if ($row = mysqli_fetch_array($result)){
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
                    'fecha_inscripcion' => $row['fecha_inscripcion'],
                    'idCurso' => $row['idCurso'],
                );
            }  

            $connection -> closeConnection($actualConnection);           
            return json_encode($data, JSON_FORCE_OBJECT); 
        }

        private function isCourseFull($courseId, $actualConnection){
            //Retorna true si el curso está lleno (si no hay más cupos disponibles)
            if($this -> numberPlaceAvailable($courseId, $actualConnection) > 0){
                return false;
            }else{
                return true;
            }
        }
        
        private function numberPlaceAvailable($courseId, $actualConnection){   
            //Retorna la cantidad de cupos disponibles al curso                                
            $sql = "SELECT cantidad_cupos_restantes
                    FROM curso
                    WHERE id ='".$courseId."'";
            $result = mysqli_query($actualConnection, $sql);

            while ($row = mysqli_fetch_array($result)){
                $placeAvailable = $row['cantidad_cupos_restantes'];
            }  

            return($placeAvailable);           
        }

        public function courseFull($courseId){
            //Retorna true si el curso está lleno (si no hay más cupos disponibles)
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            if($this -> numberPlaceAvailable($courseId, $actualConnection) > 0){
                return false;
            }else{
                return true;
            }

            $connection -> closeConnection($actualConnection);    
        }

    }
?>