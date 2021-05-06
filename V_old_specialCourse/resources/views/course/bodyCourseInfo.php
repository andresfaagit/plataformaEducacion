<?php 
    $courseInformationTexts = new CourseInformationTexts();
?>

<p> </p>
<div class="container">                             
    <div class="alert alert-info" id="mensaje" name="mensaje"> 
        <p class="font-weight-bold">  
            <?php echo $courseInformationTexts->getText3(); ?> 
            <?php echo $courseId; ?> 
        </p>  
        <p> <?php echo($courseData[0]['nombre']); ?> </p>
    </div> 

    <div class="alert alert-secondary">
        <?php echo $courseInformationTexts->getText4(); ?>
    </div>

    <div class="container">

    <div class="alert alert-warning alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Recuerde: </strong> 
        Con la opción &nbsp;&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
        </svg> &nbsp;&nbsp;
        Podrá visualizar la informaci&oacute;n detallada (extra) del inscripto seleccionado
    </div>   

    <?php
        if(($inscriptions == "null")){?>

            <div class="alert alert-danger" role="alert">
                No hay inscriptos en el curso
            </div>
           
    <?php }else{ ?>

        <div class="table-responsive">
            <table class="table table-bordered table-sm table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col" class="active">Nombre</th>
                        <th scope="col" class="active">Apellido</th>
                        <th scope="col" class="active">DNI</th>
                        <th scope="col" class="active">Email</th>
                        <th scope="col" class="active">  </th>
                    </tr>
                </thead>
            
                <tbody>

                    <?php  
                    $inscriptions = json_decode($inscriptions, true);
                    foreach($inscriptions as $inscription){
                    ?>

                    <tr class="clickable" data-toggle="collapse" data-target="#group<?= $inscription['id']; ?>" aria-expanded="false">
                        <td> <?php echo($inscription['nombre']); ?> </td>
                        <td> <?php echo($inscription['apellido']); ?> </td>
                        <td> <?php echo($inscription['dni']); ?> </td>
                        <td> <?php echo($inscription['email']); ?> </td>
                        <td class="text-center"> 
                            <!-- icons options -->
                            <div class="btn-group dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#group<?= $course['id']; ?>" aria-expanded="false" aria-label="Toggle navigation">
                                    <span> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                        </svg> 
                                    </span>
                                </button>
                            </div> 
                        </td>
                    </tr>

                    <tbody id="group<?= $inscription['id']; ?>" class="collapse">
                
                    <!-- subLine options -->
                    <tr>
                            
                        <td colspan="10" style="text-align:center; border-right: 0px; border-left: 0px">
                            <div> 
                                <p class="font-weight-bold">Información detallada del inscripto </p>   
                                <p class="font-weight-bold">Inscripci&oacute;n N° <?php echo($inscription['id']); ?></p> 
                                <p class="font-weight-light"> Tel&eacute;fono: <?php echo($inscription['telefono']); ?> </p>
                                <p class="font-weight-light"> Direcci&oacute;n: <?php echo($inscription['direccion']); ?> </p>
                                <p class="font-weight-light"> Ocupaci&oacute;n: <?php echo($inscription['ocupacion']); ?> </p>
                                <p class="font-weight-light"> Empresa: <?php echo($inscription['empresa']); ?> </p>
                                <p class="font-weight-light"> <p class="font-weight-bold"> Fecha de inscripci&oacute;n </p> <?php echo($inscription['fecha_inscripcion']); ?> </p>
                            </div>                                            
                        </td>

                    </tr>
                    <!-- end subLine options -->

                    </tbody>

                    <?php
                    }
                    ?>

                </tbody>
            </table>

            <br>

            <div class="text-center">
            <!-- Descargar Excel -->         
            <div class="btn-group">
                <form name="formDownload" method="post" action=<?php INDEX ?>>
                
                    <input id="c" name="c" type="hidden" value="course">
                    <input id="a" name="a" type="hidden" value="dowloadInscriptionsExcel">
                    <input id="courseId" name="courseId" type="hidden" value= <?= $courseId ?> >

                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-outline-success btn-round" > Descargar Excel <?php //echo ($loginTexts->getButtonLogin()); ?> </button>
                </form>
            </div>

            <!-- Descargar PDF -->
            <div class="btn-group">
                <form name="formDownload" method="post" action=<?php INDEX ?>>
                    <input id="c" name="c" type="hidden" value="course">
                    <input id="a" name="a" type="hidden" value="dowloadInscriptionsPdf">
                    <input id="courseId" name="courseId" type="hidden" value= <?= $courseId ?> >
                
                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-outline-danger btn-round" > Descargar pdf <?php //echo ($loginTexts->getButtonLogin()); ?> </button>
                </form>
            </div> 

            <!-- Descargar TXT -->
            <div class="btn-group">
                <form name="formDownload" method="post" action=<?php INDEX ?>>
                
                    <input id="c" name="c" type="hidden" value="course">
                    <input id="a" name="a" type="hidden" value="dowloadInscriptionsTxt">
                    <input id="courseId" name="courseId" type="hidden" value= <?= $courseId ?> >

                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-outline-primary btn-round" disabled> Descargar txt <?php //echo ($loginTexts->getButtonLogin()); ?> </button>
                </form>
            </div>
            </div> 

            <br>        

        </div> 
        
        <!-- End else without inscriptions -->
        <?php } ?>

    </div> 
</div>