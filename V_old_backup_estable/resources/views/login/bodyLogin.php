<?php 
    $loginTexts = new LoginTexts();
?>

<p> </p>
<div class="container">                            
    <div class="alert alert-secondary col-12 col-md-4 offset-md-4"> 
        <div class="form-group row">
            <div class="col-12 col-md-12 alert-secondary text-center" >

                <div class="d-flex justify-content-center links">
                    <h1 class="form-signin-heading text-muted"> Ingreso </h1>
			    </div>
                <br>
                
                <form name="formLogin" method="post" action='../inscripciones/index.php' >

                    <input id="c" name="c" type="hidden" value="login">
                    <input id="a" name="a" type="hidden" value="checkLogin">

                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="userName" id="userName" value="" type="text" class="form-control" placeholder="<?= $loginTexts->getUserText(); ?>" required>				
					</div>

                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" id="password" value="" type="password" class="form-control" placeholder="<?= $loginTexts->getPasswordText(); ?>" required>				
                    </div>
                                        
                    <div class="col-12 col-md-8 offset-md-2">
                        <!-- <button type="button" class="btn btn-secondary btn-lg" disabled> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Ingresando... </button> -->                       
                        <button name="cmdenviar" id="cmdenviar" type="submit" class="btn btn-outline-primary btn-round btn-block btn-lg" onClick="xxx();"> <?php echo ($loginTexts->getButtonLogin()); ?> </button>
                    </div>
                    
                </form>   
            </div>
        </div>
    </div>                                                   
</div>

