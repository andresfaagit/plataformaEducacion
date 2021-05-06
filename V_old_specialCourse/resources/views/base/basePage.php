<?php 
    include_once(LANGUAGE.'es.php');
    $generalPageTexts = new GeneralPageTexts();
?>
      
<html>
    <!-- Header -->
    <?php include_once (VIEWS.'base/header.php') ?>

    <!-- Banner -->
    <?php include_once (VIEWS.'base/banner.php') ?>
    
    <!-- Nav-Bar -> nav to charge in baseNavBar --> 
    <?php include_once (VIEWS.'base/baseNavBar.php') ?>
    
    <!-- Body -->
    <div>  
        <body> 
            <div class="animate-body">

                <!-- Body to show-->
                <?php include (VIEWS.$bodyToCharge) ?>

            </div>
        </body>
    </div>   
    
    <!-- Footer -->
    <?php include_once (VIEWS.'base/footerEmpty.php') ?>
</html>