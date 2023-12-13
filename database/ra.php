<?php
// include '../config/DatabaseConnection.php';s

?>

<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
</style>

<!-- The Modal -->
<div id="ra_Modal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add RA</h5>
        <button type="button" class="btn-close" id="ra_hide"></button>
      </div>
      <div class="modal-body">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <div class="mb-3">
            <label class="mb-3">Generator</label>
            <input type="text" class="form-control" id="ra_generator" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">TSO</label>
            <input type="text" class="form-control" id="ra_tso" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">RA Name</label>
            <input type="text" class="form-control" id="ra_name" no="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="ra_close_btn">Close</button>
        <button value="save"class="btn btn-primary" id="ra_confirm_btn">Save RA</button>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">  
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-start">RA Details
                        
                        <button type="button" class="btn btn-primary float-end" id="ra_add_btn">
                          Add Remidial action
                        </button>
                         </h4>
                </div>
                <div class="card-body">
                    <table id="myTableRa" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="table-secondary">
                                <th >ID</th>
                                <th >Generator</th>
                                <th >TSO</th>
                                <th >RA Name</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              // $db = new DatabaseConnection();
                              $query = 'SELECT * FROM ra';
                              $query_run = mysqli_query($db->conn, $query);
                              if ($query_run) {
                                while ($ra = mysqli_fetch_assoc($query_run)) {
                                  ?>
                                        <tr class="table-dark">
                                            <td class="id"><?php echo $ra['id']; ?></td>
                                            <td class="generator"><?php echo $ra['generator']; ?></td>
                                            <td class="tso"><?php echo $ra['tso']; ?></td>
                                            <td class="name"><?php echo $ra['name']; ?></td>
                                            <td>
                                                <button type="button" value="<?php echo $ra['id']; ?>" class="viewRaBtn btn btn-info btn-sm">View</button>
                                                <button type="button" value="<?php echo $ra['id']; ?>" class="editRaBtn btn btn-success btn-sm">Edit</button>
                                                <button type="button" value="<?php echo $ra['id']; ?>" class="deleteRaBtn btn btn-danger btn-sm">Delete</button>
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
<script src="assets/js/ra.js"></script>