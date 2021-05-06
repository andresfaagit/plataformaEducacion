<?php 
    //AJAX
    Class CourseAjaxController{
        //Peticiones/consultas asíncronas
        //getters (muestran información de BD en los select)

        public function getCourseTypes($courseIdPreSelected){
            include_once DBS.'dataBase.php';
            $connection = new ConnectDB();
            $actualConnection = $connection -> openConnection();
            
            //CONSULTA SQL
            //Cursos donde la fecha de fin no sea anterior a hoy (current_date); es decir, que el curso siga "vigente" y que disponga de cupos
            $sql = "SELECT * 
                    FROM curso
                    WHERE fecha_limite >= CURRENT_DATE AND cantidad_cupos_restantes > 0
                    ORDER BY nombre ASC";

            $result = mysqli_query($actualConnection, $sql);

            $connection -> closeConnection($actualConnection);

            while($row = mysqli_fetch_array($result)) {
                if(isset($courseIdPreSelected) && $row['id']==$courseIdPreSelected){ 
                    echo"<option value='".$row['id']."' selected>".$row['nombre']."</option>";
                }else{
                    echo"<option value='".$row['id']."'>".$row['nombre']."</option>";
                }
                //without preSelected (_GET)--> echo"<option value='".$row['id']."'>".$row['nombre']."</option>";
            }          
        }
    }
?>