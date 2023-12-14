<?php

require '../config/app.php';
// ADD TSO
if ($_POST['type'] == 'save_net') {
    $net_node1 = mysqli_real_escape_string($db->conn, $_POST['net_node1']);
    $net_node2 = mysqli_real_escape_string($db->conn, $_POST['net_node2']);
    $net_name = mysqli_real_escape_string($db->conn, $_POST['net_name']);
    $net_ptdf = mysqli_real_escape_string($db->conn, $_POST['net_ptdf']);
    $net_tso1 = mysqli_real_escape_string($db->conn, $_POST['net_tso1']);
    $net_tso2 = mysqli_real_escape_string($db->conn, $_POST['net_tso2']);

    if (empty($net_name) || empty($net_node1) || empty($net_node2) || empty($net_ptdf) || empty($net_tso1) || empty($net_tso2)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO net_el (node1,node2,name,name_ptdf,tso1,tso2) VALUES ('$net_node1','$net_node2','$net_name','$net_ptdf','$net_tso1','$net_tso2')";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'NET_EL Created Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'NET_EL Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}
// UPDATE
if ($_POST['type'] == 'update_net') {
    $net_id = mysqli_real_escape_string($db->conn, $_POST['net_id']);
    $net_node1 = mysqli_real_escape_string($db->conn, $_POST['net_node1']);
    $net_node2 = mysqli_real_escape_string($db->conn, $_POST['net_node2']);
    $net_name = mysqli_real_escape_string($db->conn, $_POST['net_name']);
    $net_ptdf = mysqli_real_escape_string($db->conn, $_POST['net_ptdf']);
    $net_tso1 = mysqli_real_escape_string($db->conn, $_POST['net_tso1']);
    $net_tso2 = mysqli_real_escape_string($db->conn, $_POST['net_tso2']);

    if (empty($net_name) || empty($net_node1) || empty($net_node2) || empty($net_ptdf) || empty($net_tso1) || empty($net_tso2)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE net_el SET node1='$net_node1', node2='$net_node2', name='$net_name', name_ptdf='$net_ptdf', tso1='$net_tso1', tso2='$net_tso2' WHERE id='$net_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'NET_EL Updated Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'NET_EL Not Updated' . mysqli_error($con)  // Dodato rukovanje greškom
        ];
        echo json_encode($res);
        return false;
    }
}
// DELETE TSO
if ($_POST['type'] == 'delete_net') {
    $net_id = mysqli_real_escape_string($db->conn, $_POST['net_id']);

    $query = "DELETE FROM net_el WHERE id='$net_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'NET_EL Deleted Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'NET_EL Not Deleted'
        ];
        echo json_encode($res);
        return false;
    }
}
