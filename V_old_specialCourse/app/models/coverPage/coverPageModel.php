<?php 
    //error_reporting(-1);
    class CoverPageModel {   

        public function getAllCourses(){
            include DBS.'dataBase.php';
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
        
        public function getAllCoursesOrderByDate(){
            include DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();

            //CONSULTA SQL
            $sql = "SELECT * 
                    FROM curso
                    ORDER BY fecha_limite DESC";
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
        
    }
?>