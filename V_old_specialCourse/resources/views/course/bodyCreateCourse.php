<?php 
    $CourseTexts = new CourseTexts();    
?>

<!-- DatePicker Bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<p> </p>
<div class="container">       
    <div class="alert alert-info" id="mensaje" name="mensaje"> 
        <?php echo $CourseTexts->getText1(); ?> 
    </div> 

    <?php 
        $courseCreated = TRUE;
        if(isset($_GET['msj']) && ($_GET['msj'] == "courseCreated")){ ?>
  
            <div class="alert alert-success  alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> Curso creado EXITOSAMENTE! </strong> 
            </div>

        <?php }
    ?>   

    <div class="alert alert-secondary">
        <?php echo $CourseTexts->getText2(); ?>
    </div>

    <div class="container"> 
                
        <form name="formCourse" class="needs-validation" novalidate method="post" action=<?php INDEX ?> >   

            <input id="c" name="c" type="hidden" value="course">
            <input id="a" name="a" type="hidden" value="requestInsertCourse"> 

            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Recuerde: </strong> En recuadros amarillos están las aclaraciones necesarias para dar de alta un curso
            </div>

            <div class="form-group row">
                   
                <div class="col-12 col-md-4"> 
                    <label for="name"> Nombre </label>
                    <input name="name" id="name" value="" type="text" size="8" maxlength="1024" class="form-control" required>     
            
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback">  </div>
                </div> 

            </div>
                    
            <div class="form-group row">

                <div class="col-12 col-md-4"> 
                    <label for="deadline"> Fecha límite para inscribirse </label>
                    <input name="deadline" id="deadline" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required> 
                    <script>
                        $('#deadline').datepicker({
                            format: 'yyyy-mm-dd',
                            uiLibrary: 'bootstrap4'
                        });
                    </script>             

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Año-Mes-Dia. EJ: 2021-05-07 </div>   
                </div>

                <div class="col-12 col-md-4"> 
                    <label for="firstDate"> Fecha de inicio </label>
                    <input name="firstDate" id="firstDate" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required>  
                    <script>
                        $('#firstDate').datepicker({
                            format: 'yyyy-mm-dd',
                            uiLibrary: 'bootstrap4'
                        });
                    </script>         
                
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Año-Mes-Dia. EJ: 2021-05-07 </div>         
                </div>

                <div class="col-12 col-md-4"> 
                    <label for="lastDate"> Fecha de fin </label>
                    <input name="lastDate" id="lastDate" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required> 
                    <script>
                        $('#lastDate').datepicker({
                            format: 'yyyy-mm-dd',
                            uiLibrary: 'bootstrap4'
                        });
                    </script>             

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Año-Mes-Dia. EJ: 2021-05-07 </div>   
                </div>

            </div>

            <div class="form-group row">

                <div class="col-2 col-md-2"> 
                    <label for="placesAvailable"> Cupos </label>
                    <input name="placesAvailable" id="placesAvailable" value="" type="text" size="8" maxlength="8" class="form-control" pattern="[0-9]{1,8}" required>     
                
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback">  </div>    
                </div>

                <div class="col-12 col-md-10"> 
                    <label for="aboutCourse"> Información extra del curso </label>
                    <input name="aboutCourse" id="aboutCourse" value="" type="text" size="8" maxlength="2048" class="form-control" required>  

                    <div class="valid-feedback"> Der ser posible ingrese información sobre el curso </div>
                    <div class="invalid-feedback"> Incorrecto </div>  
                </div> 

            </div> 

            <div class="card-deck">

                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Fecha límite para inscribirse </h5>
                        <p class="card-text">  
                            Cuando la fecha de fin de curso sea inferior a la fecha de hoy, 
                            el curso no estará disponible para inscribirse.
                            Es decir, no aceptará más inscripciones.
                        </p>
                    </div>
                </div>

                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Fecha de inicio y de fin </h5>
                        <p class="card-text">  
                            Es la fecha estimativa (rango) en la cuál se realizará el curso.                                                     
                        </p>
                        <p class="card-text">  
                            No afecta a la hora de inscribirse a un curso.                                                     
                        </p>
                    </div>
                </div>
            
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Cupos </h5>
                        <p class="card-text">  
                            Es la cantidad (N° de cupos) de inscripciones que permitirá el curso.    
                        </p>
                        <p class="card-text">  
                            En caso de no disponer de un límite, se podrá colocar un valor alto.    
                        </p>
                    </div>
                </div>

                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Inscripción </h5>
                        <p class="card-text">  
                            Si un curso se encuentra lleno, desaparecerá en el listado de inscripción ("curso a inscribirme"). 
                        </p>
                    </div>
                </div>

            </div>
        
            <br><hr> 
            <!-- Captcha -->
            <?php include ("captcha.php"); ?> 

            <div class="form-group row"> 
	            <div class="col-12 col-md-8 offset-md-2" >
                    <button name="sendCourse" id="sendCourse" type="submit" class="btn btn-outline-primary btn-round btn-block btn-lg" onClick="return validateCaptcha();"> <?= $CourseTexts->getButtonCourse(); ?> </button>
                </div>
            </div>

        </form> 
    </div>                                                       
</div> 