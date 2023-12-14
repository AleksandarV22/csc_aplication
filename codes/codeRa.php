<?php

require '../config/app.php';
// ADD TSO
if ($_POST['type'] == 'save_ra') {
    $ra_generator = mysqli_real_escape_string($db->conn, $_POST['ra_generator']);
    $ra_tso = mysqli_real_escape_string($db->conn, $_POST['ra_tso']);
    $ra_name = mysqli_real_escape_string($db->conn, $_POST['ra_name']);

    if (empty($ra_generator) || empty($ra_tso) || empty($ra_name)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO ra (generator,tso,name) VALUES ('$ra_generator','$ra_tso','$ra_name')";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'RA Created Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'RA Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}
// POP UP update studenta
if ($_POST['type'] == 'update_ra') {
    $ra_id = mysqli_real_escape_string($db->conn, $_POST['ra_id']);
    $ra_generator = mysqli_real_escape_string($db->conn, $_POST['ra_generator']);
    $ra_tso = mysqli_real_escape_string($db->conn, $_POST['ra_tso']);
    $ra_name = mysqli_real_escape_string($db->conn, $_POST['ra_name']);

    if (empty($ra_generator) || empty($ra_tso) || empty($ra_name)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE ra SET generator='$ra_generator', tso='$ra_tso', name='$ra_name' WHERE id='$ra_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'RA Updated Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'RA Not Updated' . mysqli_error($con)  // Dodato rukovanje greškom
        ];
        echo json_encode($res);
        return false;
    }
}
// DELETE TSO
if ($_POST['type'] == 'delete_ra') {
    $ra_id = mysqli_real_escape_string($db->conn, $_POST['ra_id']);

    $query = "DELETE FROM ra WHERE id='$ra_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'RA Deleted Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'RA Not Deleted'
        ];
        echo json_encode($res);
        return false;
    }
}
