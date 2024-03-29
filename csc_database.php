<?php
include 'config/app.php';
include 'controllers/AuthenticationController.php';
$authenticated = new AuthenticationController($db);
$authenticated->admin();

include ('codes/authentication_code.php');
// include_once 'controllers/DatabaseCrudController.php';
include 'includes/header.php';
include 'includes/navbar.php';
// include 'database/net_el.php';
// include 'database/ra.php';
// include 'database/tso.php';
?>
<div style="display:flex">
    <div class="col-md-2" style="display:flex;align-items: center;flex-direction: column;padding-top:100px">
        <button class="btn btn-warning fw-bold fs-4 mt-3 col-8" id="tso">TSO</button>
        <button class="btn btn-warning fw-bold fs-4 mt-3 col-8" id="net_el">NET_EL</button>
        <button class="btn btn-warning fw-bold fs-4 mt-3 col-8" id="ra">RA</button>
    </div>
    <div class="col-md-10" id="panel">
        <?php
            include 'database/tso.php';
        ?>
    
    </div>
</div>
<script>
    $("#panel").load("database/tso.php")
    $("button").click(function(){
        var id = $(this).attr("id");
        if(id=="tso")
            $("#panel").load("database/tso.php")
        else if(id=="net_el")
            $("#panel").load("database/net_el.php")
        else if(id=="ra")
            $("#panel").load("database/ra.php")
    })
</script>
<script src="assets/js/tso.js"></script>
<script src="assets/js/net_el.js"></script>
<script src="assets/js/ra.js"></script>
<?php
include 'includes/footer.php';
?>