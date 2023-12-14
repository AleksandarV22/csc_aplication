<?php
//require __DIR__ . '/vendor/autoload.php';
include ('config/app.php');
include ('codes/authentication_code.php');

include ('includes/header.php');
include ('includes/navbar.php');
?>

    <div class="container my-5">
        <div class="row text-center justify-content-center align-items-center">
            <div class="col-md-6">
                <div>
                    <?php include ('message.php'); ?>
                </div>
                <h1 class="mb-5">COST SHARING APPLICATION</h1>
               <?php if (isset($_SESSION['authenticated'])): ?>

                 <div class="d-flex flex-column">
                    <a href="#" class="btn btn-info btn-lg mb-2 px-3">COST-SHARING CALCULATION</a>
                    <a href="csc_database.php" class="btn btn-primary btn-lg mb-2">RAs, CNTs NAD xNECs DATABASE</a>
                     <a href="csc_settings.php" class="btn btn-secondary btn-lg mb-2">CSC PARAMETERS SETTINGS</a>
                </div>
               <?php endif; ?>            
            </div>
        </div>
    </div>

    
<?php
        include 'includes/footer.php';
    ?>
