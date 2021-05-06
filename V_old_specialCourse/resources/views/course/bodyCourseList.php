<?php 
    $courseInformationTexts = new CourseInformationTexts();
?>

<p> </p>
<div class="container">                             
    <div class="alert alert-info" id="mensaje" name="mensaje"> 
        <?php echo $courseInformationTexts->getText1(); ?>      
    </div>   

    <div class="alert alert-secondary">
        <?php echo $courseInformationTexts->getText2(); ?>
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
            Podrá realizar acciones adicionales sobre el curso y ver la información del curso
        </div>

        <?php
        if(($courses == "null")){?>

            <div class="alert alert-danger" role="alert">
                No hay cursos creados o la p&aacute;gina especificada no contiene cursos
            </div>
           
        <?php }else{ ?>

        <div class="table-responsive">

            <table class="table table-bordered table-sm table-hover">

            <thead>
                <tr>
                    <th scope="col" class="active">#</th>
                    <th scope="col" class="active text-center">Nombre</th>
                    <th scope="col" class="active text-center">Inicio</th>
                    <th scope="col" class="active text-center">Fin</th>
                    <th scope="col" class="active text-center">Fecha límite inscripción</th>
                    <th scope="col" class="active text-center">Cupos</th>
                    <th scope="col" class="active text-center">Inscriptos</th>
                    <th scope="col" class="active text-center">Cupos restantes</th>
                    <th scope="col" class="active text-center"> </th>
                </tr>
            </thead>

            <tbody>

                <?php  
                $courses = json_decode($courses, true);

                foreach($courses as $course){
                ?>

                <tr class="clickable" data-toggle="collapse" data-target="#group<?= $course['id']; ?>" aria-expanded="false">
                    <th class="active">
                        <!-- Link with courseId reference --> 
                        <a href=<?= INDEX.'?c=course&a=courseInfo&courseId='.$course['id']; ?>> 
                            <?php echo($course['id']); ?> 
                        </a>
                    </th>
                    <td> <?php echo($course['nombre']); ?> </td>
                    <td class="text-center"> <?php echo($course['fecha_inicio']); ?> </td>

                    <!-- td danger or not (if fin < today) -->
                    <?php 
                    if($course['fecha_fin'] < date('Y-m-d')){ ?> 
                        <td class="table-danger text-center"> <?php echo($course['fecha_fin']);
                    }else{ ?> 
                        <td class="text-center"> <?php echo($course['fecha_fin']); } 
                    ?> </td>

                    <td class="text-center"> <?php echo($course['fecha_limite']); ?> </td>
                    <td class="text-center"> <?php echo($course['cantidad_cupos']); ?> </td>
                    <td class="text-center"> <?php echo($course['cantidad_inscriptos']); ?> </td>
                    
                    <!-- td warning or not (if is full)-->
                    <?php 
                    if(strcmp($course['cantidad_cupos_restantes'], "0") == 0){ 
                        ?> <td class="table-warning text-center"> <?php
                        echo('Curso lleno');
                    }else{
                        ?> <td class="text-center"> <?php 
                        echo($course['cantidad_cupos_restantes']);
                    }
                   
                    ?> 
                    </td>
                    <!-- end td -->

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

                <tbody id="group<?= $course['id']; ?>" class="collapse">
                
                <!-- subLine options -->
                <tr>
                            
                    <td colspan="10" style="text-align:center; border-right: 0px; border-left: 0px">
                        <div>    
                            <p>Curso <?php echo($course['id']); ?></p>
                            <p class="font-weight-light">
                                Información del curso:
                                <?php echo($course['infoCurso']); ?>
                            </p>
                   
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <!-- Link with courseId reference to list people -->
                                <form name="formDownload" method="post" action=<?php INDEX.'?c=course&a=courseInfo&courseId='.$course['id']; ?>>
                                    <input id="c" name="c" type="hidden" value="course">
                                    <input id="a" name="a" type="hidden" value="courseInfo">
                                    <input id="courseId" name="courseId" type="hidden" value= <?= $course['id']; ?> >
            
                                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-link" title="Inscriptos" <?php if(strcmp($course['cantidad_inscriptos'], "0") == 0){ ?> disabled <?php } ?> > 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                        </svg>   
                                    </button>
                                </form>

                                <!-- Link with courseId reference to dowload pdf list people -->
                                <form name="formDownload" method="post" action=<?php INDEX ?>>
                                    <input id="c" name="c" type="hidden" value="course">
                                    <input id="a" name="a" type="hidden" value="dowloadInscriptionsPdf">
                                    <input id="courseId" name="courseId" type="hidden" value= <?= $course['id']; ?> >
            
                                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-link" title="Inscriptos PDF" <?php if(strcmp($course['cantidad_inscriptos'], "0") == 0){ ?> disabled <?php } ?> > 
                                        <!-- PDF icon -->
                                        <i class="fas fa-file-pdf"></i>   
                                    </button>
                                </form>

                                <!-- Link with courseId reference to dowload excel list people -->
                                <form name="formDownload" method="post" action=<?php INDEX ?>>
                                    <input id="c" name="c" type="hidden" value="course">
                                    <input id="a" name="a" type="hidden" value="dowloadInscriptionsExcel">
                                    <input id="courseId" name="courseId" type="hidden" value= <?= $course['id']; ?> >
            
                                <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-link" title="Inscriptos EXCEL" <?php if(strcmp($course['cantidad_inscriptos'], "0") == 0){ ?> disabled <?php } ?> > 
                                        <!-- PDF icon -->
                                        <i class="fas fa-file-excel"></i>   
                                    </button>
                                </form>
                                
                                <!-- Link with courseId reference to edit course -->
                                <form name="formDownload" method="post" action=<?php INDEX ?>>
                                    <input id="c" name="c" type="hidden" value="course">
                                    <input id="a" name="a" type="hidden" value="courseEdit">
                                    <input id="courseId" name="courseId" type="hidden" value= <?= $course['id']; ?> >
            
                                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-link" title="Editar curso"> 
                                        <!-- Pencil icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>   
                                    </button>
                                </form>

                                <!-- Link with courseId reference to delete -->
                                <form name="formDownload" method="post" action=<?php INDEX ?>>
                                    <input id="c" name="c" type="hidden" value="course">
                                    <input id="a" name="a" type="hidden" value="courseDelete">
                                    <input id="courseId" name="courseId" type="hidden" value= <?= $course['id']; ?> >
            
                                    <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-link" title="Borrar curso" disabled> 
                                        <!-- Trash icon -->
                                        <i class="fa fa-trash" aria-hidden="true"></i>   
                                    </button>
                                </form>
                                                
                            </div>
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
        <!-- end -->

        <!-- Pagination -->       
        <nav aria-label="Page navigation example">
            <ul class="pagination pg-blue justify-content-center">
                <li <?php if($_GET['page'] <= 1){ ?> class="page-item disabled" <?php }else{ ?> class="page-item" <?php } ?>>
                    <?php $previousPage = $_GET['page'] - 1; ?> 
                    <a class="page-link" href="<?= INDEX.'?c=course&a=courseList&page='.$previousPage; ?>"> < </a>
                </li>

                <?php for($i=1; $i<=$pages; $i++){ ?>   
                    <li <?php if($_GET['page'] == $i){ ?> class="page-item active" <?php }else{ ?> class="page-item" <?php } ?>>
                        <a class="page-link" href="<?= INDEX.'?c=course&a=courseList&page='.$i; ?>" role="button"> <?php echo($i); ?> </a>  
                    </li>
                <?php } ?> 

                <li <?php if($_GET['page'] >= $pages){ ?> class="page-item disabled" <?php }else{ ?> class="page-item" <?php } ?>>
                    <?php $nextPage = $_GET['page'] + 1; ?>
                    <a class="page-link" href="<?= INDEX.'?c=course&a=courseList&page='.$nextPage; ?>"> > </a>
                </li>
            </ul>
        </nav>               
        <!-- End Pagination -->

        <div class="text-center">
            <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-placement="right" title="Registros totales">
                Regs: <?php echo($start+1); ?> -<?php echo($start + $items_for_page); ?> de <?php echo($total_items); ?> totales
            </span>
        </div>

        <!-- End else without courses -->
        <?php } ?>

        </div> 

    </div>                                              
</div> 