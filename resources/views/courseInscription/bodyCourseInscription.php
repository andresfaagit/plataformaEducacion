<?php 
    $courseInscriptionTexts = new CourseInscriptionTexts();
    include_once (AJAX.'course/courseAjaxMethods.php');
    $queryAjax = new CourseAjaxController();
?>

<!-- Bootstrap two fields validate/match -->
<script type="text/javascript" src="../<?php echo $GLOBALS['public']; ?>/js/matchFieldsValidation.js"></script>

<!-- DatePicker Bootstrap-->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<p> </p>
<div class="container">    
    <?php 
        if(isset($inscriptionCreated) && $inscriptionCreated){             
            include (VIEWS.'courseInscription/modalInscription.php');     
        }     
    ?>  
                            
    <div class="alert alert-info" id="mensaje" name="mensaje"> 
        <h4> <?php echo $courseInscriptionTexts->getText1(); ?> </h4>       
    </div> 

    <?php 
        if(isset($_GET['msj']) && $_GET['msj'] == 'rejectInscription'){ ?>
  
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> Incripción RECHAZADA! </strong> 
                Usted ya cuenta con una inscripción al curso solicitado
            </div>

        <?php }
        else{
            if(isset($_GET['msj']) && $_GET['msj'] == 'courseIsFull'){ ?>

                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Incripción RECHAZADA! </strong> 
                    El curso solicitado se encuentra lleno
                </div>

            <?php }
        }
    ?>   

    <div class="card">
        <div class="card bg-dark text-white">
            <img class="card-img" src="img/body/coverPage/educationOPDS.png" alt="Educación">
            <div class="card-img-overlay">
                <h1 class="card-title"> <?php echo $courseInscriptionTexts->getText2(); ?> </h1>
            </div>
        </div>

        <div class="card-header">
            <p class="card-text text-center"> 
                <h4> <p class="card-text text-center"> <?php echo $courseInscriptionTexts->getText3(); ?> </p> </h4>
            </p>
        </div>
    </div>

    <br>
    <div class="alert alert-warning alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong> Recuerde: </strong> 
        Una persona podrá inscribirse una única vez a un <strong> curso </strong>, con el <strong> DNI y su eMail </strong>
    </div>   

    <div class="alert alert-secondary">
        <?php echo $courseInscriptionTexts->getText4(); ?>
    </div>

    <div class="container">   
        <form name="formDenunciation" class="needs-validation" novalidate method="post" action=<?php INDEX ?> >   

            <input id="c" name="c" type="hidden" value="courseInscription">
            <input id="a" name="a" type="hidden" value="createInscriptionToCourse"> 

            <div class="form-group row">
                <div id="courseTypeAsync" class="col-12 col-md-6">
                    <label for="fname"> Curso a inscribirme </label>
                    
                    <select id="courseType" name="courseType" class="form-control" required>
                        <option value=""> -Seleccione uno- </option>
                            <!-- CONSULTA SIMPLE AJAX, obtener datos en un select-->
                            <?php $queryAjax -> getCourseTypes($courseId); ?>
                    </select>

                    <?php if(isset($courseId)){ ?>
                        <p class="font-italic text-center"> <small> Usted seleccionó este curso </small> </p>
                    <?php }else{ ?>
                        <p class="font-italic text-center"> <small> Sólo cursos disponibles </small> </p>
                    <?php } ?>   
                </div>
            </div> 

            <div class="form-group row">                
                <div class="col-12 col-md-6"> 
               
                    <label for="firstName"> Nombre </label>
                    <input name="firstName" id="firstName" value="" type="text" maxlength="40" class="form-control text-capitalize" pattern="[a-zA-Z ]+[a-zA-Z ]" required> 
                                                                                                                                    <!-- pattern con tildes  ="[a-zA-ZáéíóúÁÉÍÓÚ ]+[a-zA-ZáéíóúÁÉÍÓÚ ]" -->
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Incorrecto. Ingrese su nombre sin tildes </div>
                </div> 

                <div class="col-12 col-md-6"> 
                    <label for="secondName"> Apellido </label>
                    <input name="secondName" id="secondName" value="" type="text" class="form-control text-capitalize" pattern="[a-zA-Z ]+[a-zA-Z ]" required>  

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Incorrecto. Ingrese su apellido sin tildes</div>   
                </div>
            </div>
            
            <div class="form-group row">                
                <div class="col-12 col-md-6"> 
                    <label for="personalId"> DNI </label>
                    <input name="personalId" id="personalId" value="" type="text" size="8" maxlength="8" class="form-control" pattern="[0-9]{1,8}" required>     

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Incorrecto. Sólo se permiten Números </div>
                </div> 

                <div class="col-12 col-md-6"> 
                    <label for="personalIdConfirm"> <small id="personalIdConfirm" class="form-text text-muted">Por favor, repita su DNI</small> </label>  
                    <input name="personalIdConfirm" id="personalIdConfirm" value="" type="text" size="8" maxlength="8" class="form-control" pattern="[0-9]{1,8}" oninput="validate_personalId2(this)" aria-describedby="pwHelp" required>     

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Los DNIs deben coincidir </div>
                </div> 
            </div> 

            <div class="form-group row">
                <div class="col-12 col-md-6"> 
                    <label for="email"> eMail </label>
                    <input name="email" id="email" value="" type="email" maxlength="150" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>     
                
                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Incorrecto. Ej: ejemplo@gmail.com </div>
                </div> 

                <div class="col-12 col-md-6"> 
                    <label for="emailConfirm"> <small id="emailConfirm" class="form-text text-muted">Por favor, repita su eMail</small> </label>  
                    <input name="emailConfirm" id="emailConfirm" value="" type="email" maxlength="150" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninput="validate_email2(this)" aria-describedby="emailHelp" required>     

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Los eMails deben coincidir </div>
                </div> 
            </div> 

            <div class="form-group row">
                <div class="col-12 col-md-4"> 
                    <label for="birthdate"> Fecha de nacimiento </label>
                    <input name="birthdate" id="birthdate" placeholder="aaaa-mm-dd" type="text" size="8" maxlength="30" class="form-control" required> 
                    <script>
                        $('#birthdate').datepicker({
                            format: 'yyyy-mm-dd',
                            uiLibrary: 'bootstrap4'
                        });
                    </script>             

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Año-Mes-Dia. EJ: 2021-05-07 </div>   
                </div>
            </div>

            <div class="form-group row">  
                <div class="col-12 col-md-6"> 
                    <label for="telephone"> Tel&eacute;fono </label>
                    <input name="telephone" id="telephone" value="" type="text" class="form-control" pattern="[0-9]{1,30}" required>  

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Incorrecto. Ej: 221154456789 </div>   
                </div>               
                <div class="col-12 col-md-6"> 
                    <label for="addressCity"> Direcci&oacute;n </label>
                    <input name="addressCity" id="addressCity" value="" type="text" class="form-control" required>     
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-md-6"> 
                    <label for="occupation"> Ocupaci&oacute;n/Cargo </label>
                    <input name="occupation" id="occupation" value="" type="text" maxlength="30" class="form-control text-capitalize" required>     
                </div> 
                <div class="col-12 col-md-6"> 
                    <label for="company"> Organizaci&oacute;n/Dependencia </label>
                    <input name="company" id="company" value="" type="text" class="form-control text-capitalize" required>     
                </div> 
            </div>

            
            <br><hr> 
            <!-- Captcha -->
            <?php include ("captcha.php"); ?> 

            <div class="form-group row"> 
	            <div class="col-12 col-md-8 offset-md-2" >
                    <button name="sendInscription" id="sendInscription" type="submit" class="btn btn-outline-primary btn-round btn-block btn-lg" onClick="return validateCaptcha();"> <?= $courseInscriptionTexts->getButtonInscription(); ?> </button>
                </div>
            </div>
        </form>

    </div>                                              
</div> 