<?php 
    $CourseTexts = new CourseEditTexts();    
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

    <div class="alert alert-secondary">
        <?php echo $CourseTexts->getText2(); ?>
    </div>

    <div class="container"> 

    <?php if(isset($_COOKIE['courseEdited'])){  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Modificación EXITOSA.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>  

        <form name="formCourse" class="needs-validation" novalidate method="post" action=<?php INDEX ?> >   

            <input id="c" name="c" type="hidden" value="course">
            <input id="a" name="a" type="hidden" value="requestEditCourse"> 
              
            <div class="form-group row">

            <?php 
            foreach($course as $courseData){
            ?> 

                <div class="col-12 col-md-4"> 
                    <label for="name"> Número </label>
                    <input name="courseId" id="courseId" value="<?= $courseData['id']; ?>" type="text" size="8" maxlength="40" class="form-control" readonly>     
            
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback">  </div>
                </div>           
                
                <div class="col-12 col-md-4"> 
                    <label for="name"> Nombre </label>
                    <input name="name" id="name" value="<?= $courseData['nombre']; ?>" type="text" size="8" maxlength="40" class="form-control" required>     
            
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback">  </div>
                </div> 

            </div>

            <div class="form-group row">

                <div class="col-12 col-md-4"> 
                    <label for="deadline"> Fecha límite para inscribirse </label>
                    <input name="deadline" id="deadline" value="<?= $courseData['fecha_limite']; ?>" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required> 
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
                    <input name="firstDate" id="firstDate" value="<?= $courseData['fecha_inicio']; ?>" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required>  
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
                    <input name="lastDate" id="lastDate" value="<?= $courseData['fecha_fin']; ?>" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required> 
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
                    <input name="placesAvailable" id="placesAvailable" value="<?= $courseData['cantidad_cupos']; ?>" type="text" size="8" maxlength="4" class="form-control" pattern="[0-9]{1,8}" required>     
                
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback">  </div>    
                </div>

                <div class="col-12 col-md-10"> 
                    <label for="aboutCourse"> Información extra del curso </label>
                    <input name="aboutCourse" id="aboutCourse" value="<?= $courseData['infoCurso']; ?>" type="text" size="8" maxlength="1024" class="form-control">  

                    <div class="invalid-feedback"> Incorrecto </div>  
                </div> 

            </div> 

            <div class="form-group row">

                <div class="col-12 col-md-2"> 
                    <label for="enrolled"> Inscriptos a la fecha </label>
                    <input name="enrolled" id="enrolled" value="<?= $courseData['cantidad_inscriptos']; ?>" type="text" class="form-control" readonly>     
            
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback">  </div>
                </div>
            </div> 

            <?php } ?> <!-- End foreach -->
        
            <div class="card-deck">

                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Cupos </h5>
                        <p class="card-text">  
                            El valor no puede ser inferior a la cantidad de Inscriptos.
                            Se podrá incrementar la cantidad deseada, siempre que supere
                            a la cantidad de inscriptos; caso contrario, permanece el mínimo posible.
                        </p>
                    </div>
                </div>

            </div>

            <hr> 

            <div class="form-group row"> 
	            <div class="col-12 col-md-8 offset-md-2" >
                    <button name="sendCourse" id="sendCourse" type="submit" class="btn btn-outline-primary btn-round btn-block btn-lg" onClick="return validateCaptcha();"> <?= $CourseTexts->getButtonCourse(); ?> </button>
                </div>
            </div>

        </form> 
    </div>                                                       
</div> 