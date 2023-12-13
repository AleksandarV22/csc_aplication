<?php
include 'config/app.php';
include 'controllers/AuthenticationController.php';
$authenticated = new AuthenticationController($db);
$authenticated->admin();

include ('codes/authentication_code.php');
// include_once 'controllers/DatabaseCrudController.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div style="display:flex">
    <div class="col-4" style="display:flex;align-items: center;flex-direction: column;padding-top:100px">
        <button class="btn btn-primary mt-3 col-8" id="tso">TSO</button>
        <button class="btn btn-primary mt-3 col-8" id="net_el">NET_EL</button>
        <button class="btn btn-primary mt-3 col-8">TSO</button>
        <button class="btn btn-primary mt-3 col-8">TSO</button>
    </div>
    <div class="col-8" id="panel">
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
    })
</script>


<?php
include 'includes/footer.php';
?>