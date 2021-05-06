<?php 
    $coverPageTexts = new CoverPageTexts();
?>

<!-- count Down date: https://codepen.io/gohari7/pen/Bayadwp -->
<script type="text/javascript" src="../<?php echo $GLOBALS['public']; ?>/js/countDownDate.js"></script>

<!-- CSS expand text effect (info hide, clickeable and show more info) -->
<link rel="stylesheet" href="../<?php echo $GLOBALS['public']; ?>/css/coverPageTextExpandEffect.css">

<p> </p>
<div class="container">                             

    <div class="alert alert-info" id="mensaje" name="mensaje"> 
        <h4> <?php echo $coverPageTexts->getText1(); ?> </h4>       
    </div> 

    <div class="card">
        <div class="card bg-dark text-white">
            <img class="card-img" src="img/body/coverPage/cursos_online.png" alt="Educación">
            <div class="card-img-overlay">
                <h1 class="card-title"> <?php echo $coverPageTexts->getText2(); ?> </h1>
            </div>
        </div>
    </div>
        
    <br>

    <div class="container">  

    <?php
        if(($courses == "null")){?>

            <div class="alert alert-danger" role="alert">
                No hay cursos disponibles
            </div>
           
    <?php }else{ ?>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">

        <?php  
            $courses = json_decode($courses, true);
            foreach($courses as $course){
        ?>

        <div class="col mb-3">
            <div class="card h-100">
                <!-- <img src="https://mdbootstrap.com/img/new/standard/city/044.jpg" class="card-img-top" alt="..." /> -->
                <div class="card-body">
                    <h5 class="p-3 mb-2 bg-secondary text-white"> <?php echo($course['nombre']); ?> </h5>
                    
                    <p class="card-text">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                        Inicia en la fecha <?php echo($course['fecha_inicio']); ?>
                    </p>
                    <p class="card-text">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                        Termina el <?php echo($course['fecha_fin']); ?>
                    </p>

                    <p class="card-text">
                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                        Fecha límite para poder inscribirse 
                    </p>
                    <p class="text-center">  
                        <?php echo($course['fecha_limite']); ?>
                    </p>
                 
                    <!-- Display the countdown timer in an element -->
                    <div class="clockdiv" data-date="<?= $course['fecha_limite'] ?> 23:59:59">
                        <p class="font-weight-bold text-center">
                            <i class="fas fa-clock"></i>
                            <span class="days"> </span>d 
                            <span class="hours"></span>h
                            <span class="minutes"></span>m
                            <span class="seconds"></span>s
                        </p>                        
                    </div>            

                    <hr>

                    <div class="module">
                    
                     <?php if(strlen($course['infoCurso']) > 133){ ?>
                        <div class="text-center">
                            <div class="badge badge-pill badge-secondary">
                                Ver info completa
                            </div>
                        </div>
                    
                        <a class="read-more collapsed" data-toggle="collapse" href="#collapse<?= $course['id']; ?>" role="button"></a>
                    <?php }?>
                        <div class="collapse" id="collapse<?= $course['id']; ?>" aria-expanded="false">  
                            <p class="card-text">
                                <?php echo($course['infoCurso']); ?>
                            </p>
                        </div>
       
                    </div>
   
                </div>

                <div class="card-footer">
                <?php 
                    if($course['fecha_limite'] < date('Y-m-d')){ 
                        ?> 
                            <p class="text-center"><small class="text-danger"> No se aceptan más inscripciones </small></p> 
                            <p class="text-center"> <button type="button" class="btn btn-secondary btn-sm" disabled> No es posible inscribirse </button> </p>
                        <?php
                    }else 
                        if(strcmp($course['cantidad_cupos_restantes'], "0") == 0){ 
                            ?> 
                                <p class="text-center"><small class="text-warning"> Curso lleno </small></p> 
                                <p class="text-center"> <button type="button" class="btn btn-secondary btn-sm" disabled> No es posible inscribirse </button> </p>     
                            <?php
                        }else{
                        ?> <p class="text-center"><small class="text-success"> Cupos disponibles </small></p> 
                            <!-- Link with courseId reference for inscription a=course --> 
                           <p class="text-center"> <a class="btn btn-outline-success btn-sm" href="<?= INDEX.'?c=courseInscription&courseId='.$course['id']; ?>" role="button"> Inscribirme al curso</a> </p>
                        <?php
                    }
                ?> 
                </div>
            </div>

        </div>

        <?php } ?>
        
    </div>

    <!-- End else without courses -->
    <?php } ?>

    <br>
    
    </div>                                              
</div> 