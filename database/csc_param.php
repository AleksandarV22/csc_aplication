<?php
// include '../config/DatabaseConnection.php';s
include '../config/app.php';
include '../controllers/AuthenticationController.php';
$authenticated = new AuthenticationController($db);
$authenticated->admin();
?>

<!-- The Modal -->
<div id="csc_param_Modal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Cost-sharing parameter</h5>
        <button type="button" class="btn-close" id="csc_param_hide"></button>
      </div>
      <div class="modal-body">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <div class="mb-3">
            <label class="mb-3">RA.TSO</label>
            <select class="form-control"  id="csc_param_ra">
            <option value="">Select RA.TSO...</option>
                <?php
                    $query = 'SELECT name FROM tso';
                    $query_run = mysqli_query($db->conn, $query);
                    if ($query_run) {
                        while ($csc_param = mysqli_fetch_assoc($query_run)) {
                ?>
                        
                        <option value="<?php echo $csc_param['name'] ?>"><?php echo $csc_param['name'] ?></option>
                 <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="mb-3">CNT1.TSO</label>
            <select class="form-control"  id="csc_param_cnt1">
            <option value="">Select CNT1.TSO...</option>
                <?php
                    $query = 'SELECT name FROM tso';
                    $query_run = mysqli_query($db->conn, $query);
                    if ($query_run) {
                        while ($csc_param = mysqli_fetch_assoc($query_run)) {
                ?>
                        
                        <option value="<?php echo $csc_param['name'] ?>"><?php echo $csc_param['name'] ?></option>
                 <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="mb-3">CNT2.TSO</label>
            <select class="form-control"  id="csc_param_cnt2">
            <option value="">Select CNT2.TSO...</option>
                <?php
                    $query = 'SELECT name FROM tso';
                    $query_run = mysqli_query($db->conn, $query);
                    if ($query_run) {
                        while ($csc_param = mysqli_fetch_assoc($query_run)) {
                ?>
                        
                        <option value="<?php echo $csc_param['name'] ?>"><?php echo $csc_param['name'] ?></option>
                 <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="mb-3">xNEC1.TSO</label>
            <select class="form-control"  id="csc_param_xnec1">
            <option value="">Select xNEC1.TSO...</option>
                <?php
                    $query = 'SELECT name FROM tso';
                    $query_run = mysqli_query($db->conn, $query);
                    if ($query_run) {
                        while ($csc_param = mysqli_fetch_assoc($query_run)) {
                ?>
                        
                        <option value="<?php echo $csc_param['name'] ?>"><?php echo $csc_param['name'] ?></option>
                 <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="mb-3">xNEC2.TSO</label>
            <select class="form-control"  id="csc_param_xnec2">
            <option value="">Select xNEC2.TSO...</option>
                <?php
                    $query = 'SELECT name FROM tso';
                    $query_run = mysqli_query($db->conn, $query);
                    if ($query_run) {
                        while ($csc_param = mysqli_fetch_assoc($query_run)) {
                ?>
                        
                        <option value="<?php echo $csc_param['name'] ?>"><?php echo $csc_param['name'] ?></option>
                 <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="mb-3">Q</label>
            <select class="form-control"  id="csc_param_q">
            <option value="">Select xNEC2.TSO...</option>
                <?php
                    $query = 'SELECT DISTINCT q FROM csc_param';
                    $query_run = mysqli_query($db->conn, $query);
                    if ($query_run) {
                        while ($csc_param = mysqli_fetch_assoc($query_run)) {
                ?>
                        
                        <option value="<?php echo $csc_param['q'] ?>"><?php echo $csc_param['q'] ?></option>
                 <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="mb-3">RSBA</label>
            <input type="text" class="form-control" id="csc_param_rsba" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">RSME</label>
            <input type="text" class="form-control" id="csc_param_rsme" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">BAME</label>
            <input type="text" class="form-control" id="csc_param_bame" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">Sensitivity</label>
            <input type="text" class="form-control" id="csc_param_sensitivity" no="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="csc_param_close_btn">Close</button>
        <button value="save"class="btn btn-primary" id="csc_param_confirm_btn">Save CSC parameter</button>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">  
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-start">Cost-sharing calculation parameters settings database Details
                        <button type="button" class="btn btn-primary fw-bold float-end" id="csc_param_add_btn">
                          Add CSC parameter
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="myTableCscParam" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="table-secondary">
                                <th >ID</th>
                                <th >RA.TSO</th>
                                <th >CNT1.TSO</th>
                                <th >CNT2.TSO</th>
                                <th >xNEC2.TSO</th>
                                <th >xNEC1.TSO</th>
                                <th >Q</th>
                                <th >RSBA</th>
                                <th >RSME</th>
                                <th >BAME</th>
                                <th >Sensitivity</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $db = new DatabaseConnection();
                                $query = 'SELECT * FROM csc_param';
                                $query_run = mysqli_query($db->conn, $query);
                                if ($query_run) {
                                    while ($csc_param = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr class="table-dark">
                                            <td class="id"><?php echo $csc_param['id']; ?></td>
                                            <td class="csc_param_ra"><?php echo $csc_param['ra_tso']; ?></td>
                                            <td class="csc_param_cnt1"><?php echo $csc_param['cnt1_tso']; ?></td>
                                            <td class="csc_param_cnt2"><?php echo $csc_param['cnt2_tso']; ?></td>
                                            <td class="csc_param_xnec1"><?php echo $csc_param['xnec1_tso']; ?></td>
                                            <td class="csc_param_xnec2"><?php echo $csc_param['xnec2_tso']; ?></td>
                                            <td class="csc_param_q"><?php echo $csc_param['q']; ?></td>
                                            <td class="csc_param_rsba"><?php echo $csc_param['rsba']; ?></td>
                                            <td class="csc_param_rsme"><?php echo $csc_param['rsme']; ?></td>
                                            <td class="csc_param_bame"><?php echo $csc_param['bame']; ?></td>
                                            <td class="csc_param_sensitivity"><?php echo $csc_param['sensitivity']; ?></td>
                                            <td>
                                                <button type="button" value="<?php echo $csc_param['id']; ?>" class="viewCscParamBtn btn btn-info fw-bold btn-sm">View</button>
                                                <button type="button" value="<?php echo $csc_param['id']; ?>" class="editCscParamBtn btn btn-success fw-bold btn-sm">Edit</button>
                                                <button type="button" value="<?php echo $csc_param['id']; ?>" class="deleteCscParamBtn btn btn-danger fw-bold btn-sm">Delete</button>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo '<h5> No Record Found </h5>';
                                    // Dodajte dodatne informacije o grešci ako je potrebno
                                    echo 'Error: ' . mysqli_error($db->conn);
                                }
                                                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/csc_param.js"></script>
