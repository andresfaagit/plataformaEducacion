<?php 
    $courseInscriptionTexts = new CourseInscriptionTexts();
    include_once (AJAX.'course/courseAjaxMethods.php');
    $queryAjax = new CourseAjaxController();
?>

<!-- Bootstrap two fields validate/match -->
<script type="text/javascript" src="../<?php echo $GLOBALS['public']; ?>/js/matchFieldsValidation.js"></script>

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
            <input id="a" name="a" type="hidden" value="createInscriptionToCourseSpecial"> 

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
                <div class="col-12 col-md-6"> 
                    <label for="telephone"> Tel&eacute;fono </label>
                    <input name="telephone" id="telephone" value="" type="text" class="form-control" pattern="[0-9]{1,30}" required>  

                    <div class="valid-feedback"> </div>
                    <div class="invalid-feedback"> Incorrecto. Ej: 221154456789 </div>   
                </div>  
                <div class="col-12 col-md-6"> 
                    <label for="genero"> G&eacute;nero </label>
                    <select name="genero" id="genero" class="form-control" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>     
                </div> 
            </div>

            <div class="form-group row"> 
                <div class="col-12 col-md-6"> 
                    <label for="distrito">Distrito de residencia </label>
                    <input name="distrito" id="distrito" value="" type="text" maxlength="220" class="form-control text-capitalize" required>     
                </div> 
                <div class="col-12 col-md-6"> 
                    <label for="region"> Regi&oacute;n </label>
                    <input name="region" id="region" value="" type="text" maxlength="220" class="form-control text-capitalize" required>     
                </div>
            </div>

            <div class="form-group row"> 
                <div class="col-12 col-md-6"> 
                    <label for="escuela"> Escuela en la que se desempeña </label>
                    <input name="escuela" id="escuela" value="" type="text" maxlength="220" class="form-control text-capitalize" required>     
                </div> 
                <div class="col-12 col-md-6"> 
                    <label for="nivel"> Nivel </label>
                    <input name="nivel" id="nivel" value="" type="text" maxlength="180" class="form-control text-capitalize" required>     
                </div>
            </div>

            <div class="form-group row"> 
                <div class="col-12 col-md-6"> 
                    <label for="cargo"> Cargo </label>
                    <input name="cargo" id="cargo" value="" type="text" maxlength="180" class="form-control text-capitalize" required>     
                </div> 
                <div class="col-12 col-md-6"> 
                    <label for="tipogestion"> Tipo de gesti&oacute;n </label>
                    <select name="tipogestion" id="tipogestion" class="form-control" required>
                        <option value="Publica">P&uacute;blica</option>
                        <option value="Privada">Privada</option>
                    </select>                        
                </div>
            </div>

            <div class="form-group row"> 
                <div class="col-12 col-md-6"> 
                    <label for="aniosejercicio"> Años de ejercicio en la docencia </label>
                    <select name="aniosejercicio" id="aniosejercicio" class="form-control" required>
                        <option value="0 a 5">0-5</option>
                        <option value="6 a 10">6-10</option>
                        <option value="10 a 15">10-15</option>
                        <option value="mas de 15">M&aacute;s de 15</option>
                    </select>                       
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