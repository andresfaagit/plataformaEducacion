 <div>   
    <!-- nav 1-->
    <!-- aquí se agregan las funcionalidades en el menú-->
    <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
        <div style="padding-left: 4%;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <button class="btn">
                        <a class="nav-link" href=<?= INDEX.'?c=coverPage' ?> > <?php echo $generalPageTexts->getNav1(); ?> </a>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn">
                        <a class="nav-link" href= <?= INDEX.'?c=login' ?> > <?php echo $generalPageTexts->getNav2(); ?> </a>
                    </button>
                </li>

                <li class="nav-item">
                    <button class="btn">
                        <!-- EJEMPLO ANTES: <a class="nav-link" href='../public/index.php?c=solicitudDenuncia&a=solicitudAlta'> Demo ALTA SIMPLE </a>-->
                        <a class="nav-link" href=<?= INDEX.'?c=solicitudDenuncia&a=solicitudAlta' ?> > Demo ALTA SIMPLE </a>
                    </button>
                </li>
            </ul>
        </div>

        <?php if (isset($actualUser)){ ?>
            <!-- User logeado -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        userLogged -> <?php echo($actualUser); ?>
                    </li>
                </ul>
            </div> 
            <?php } ?>
    </nav>
    
    <!-- nav 2-->
    <!-- 
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div style="padding-left: 6%;">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>  
    </nav>
    -->
</div>