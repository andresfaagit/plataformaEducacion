 <div>   
    <!-- nav 1-->
    <!-- Funcionalidades del menú: $navToCharge -->
    <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
        <div style="padding-left: 4%;">
            <ul class="navbar-nav mr-auto">
                <?php include_once (VIEWS.$navToCharge) ?>
            </ul>
        </div>

        <?php if (isset($actualUser)){ ?>
            <!-- User logeado -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">                
                        <div>		
			                <span><i class="fas fa-user"></i> <?php echo($actualUser); ?> </span>		
		                </div>       
                    </li>
                </ul>
            </div> 
        <?php } ?>
    </nav>
</div>