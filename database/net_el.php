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
<div id="net_Modal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add NET_EL</h5>
        <button type="button" class="btn-close" id="net_times"></button>
      </div>
      <div class="modal-body">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <div class="mb-3">
            <label class="mb-3">Node1</label>
            <input type="text" class="form-control" id="net_node1" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">Node2</label>
            <input type="text" class="form-control" id="net_node2" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">Name</label>
            <input type="text" class="form-control" id="net_name" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">Name PTDF</label>
            <input type="text" class="form-control" id="net_ptdf" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">TSO1</label>
            <input type="text" class="form-control" id="net_tso1" no="">
        </div>
        <div class="mb-3">
            <label class="mb-3">TSO2</label>
            <input type="text" class="form-control" id="net_tso2" no="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="net_close_btn">Close</button>
        <button value="save"class="btn btn-primary" id="net_confirm_btn">Save Net EL</button>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">  
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-start">NET EL Details
                        <button type="button" class="btn btn-primary float-end" id="net_add_btn">
                          Add NET EL
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="myTableNet" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="table-secondary">
                                <th >ID</th>
                                <th >Node1</th>
                                <th >Node2</th>
                                <th >Name</th>
                                <th >Name PTDF</th>
                                <th >TSO1</th>
                                <th >TSO2</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $db = new DatabaseConnection();
                                $query = 'SELECT * FROM net_el';
                                $query_run = mysqli_query($db->conn, $query);
                                if ($query_run) {
                                    while ($net_el = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr class="table-dark">
                                            <td class="id"><?php echo $net_el['id']; ?></td>
                                            <td class="net-node1"><?php echo $net_el['node1']; ?></td>
                                            <td class="net-node2"><?php echo $net_el['node2']; ?></td>
                                            <td class="net-name"><?php echo $net_el['name']; ?></td>
                                            <td class="net-name-ptdf"><?php echo $net_el['name_ptdf']; ?></td>
                                            <td class="net-tso1"><?php echo $net_el['tso1']; ?></td>
                                            <td class="net-tso2"><?php echo $net_el['tso2']; ?></td>
                                            <td>
                                                <button type="button" value="<?php echo $net_el['id']; ?>" class="viewNetBtn btn btn-info btn-sm">View</button>
                                                <button type="button" value="<?php echo $net_el['id']; ?>" class="editNetBtn btn btn-success btn-sm">Edit</button>
                                                <button type="button" value="<?php echo $net_el['id']; ?>" class="deleteNetBtn btn btn-danger btn-sm">Delete</button>
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
<script src="assets/js/net_el.js"></script>
