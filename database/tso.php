<?php
include '../config/app.php';
include '../controllers/AuthenticationController.php';
$authenticated = new AuthenticationController($db);
$authenticated->admin();

?>


<!-- The Modal -->
<div id="tso_Modal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add TSO</h5>
        <button type="button" class="btn-close" id="tso_hide"></button>
      </div>
      <div class="modal-body">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <div class="mb-3">
            <label class="mb-3">TSO Name</label>
            <input type="text" class="form-control" id="tso_name" no="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="tso_close_btn">Close</button>
        <button value="save"class="btn btn-primary" id="tso_confirm_btn">Save TSO</button>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">  
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-start">TSO Details
                        
                        <button type="button" class="btn btn-primary fw-bold float-end" id="tso_add_btn">
                          Add TSO
                        </button>
                         </h4>
                </div>
                <div class="card-body">
                    <table id="myTableTso" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="table-secondary">
                                <th >ID</th>
                                <th >TSO Name</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $query = 'SELECT * FROM tso';
                              $query_run = mysqli_query($db->conn, $query);
                              if ($query_run) {
                                while ($tso = mysqli_fetch_assoc($query_run)) {
                                  ?>
                                        <tr class="table-dark">
                                            <td class="id"><?php echo $tso['id']; ?></td>
                                            <td class="name"><?php echo $tso['name']; ?></td>
                                            <td>
                                                <button type="button" value="<?php echo $tso['id']; ?>" class="viewTsoBtn btn btn-info fw-bold btn-sm">View</button>
                                                <button type="button" value="<?php echo $tso['id']; ?>" class="editTsoBtn btn btn-success fw-bold btn-sm">Edit</button>
                                                <button type="button" value="<?php echo $tso['id']; ?>" class="deleteTsoBtn btn btn-danger fw-bold btn-sm">Delete</button>
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
<script src="assets/js/tso.js"></script>