<?php

require '../config/app.php';
// ADD TSO
if ($_POST['type'] == 'save_tso') {
    $name = mysqli_real_escape_string($db->conn, $_POST['name']);

    if ($name == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO tso (name) VALUES ('$name')";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'TSO Created Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'TSO Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}
// POP UP update studenta
if ($_POST['type'] == 'update_tso') {
    $tso_id = mysqli_real_escape_string($db->conn, $_POST['tso_id']);
    $name = mysqli_real_escape_string($db->conn, $_POST['name']);

    if (empty($name)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE tso SET name='$name' WHERE id='$tso_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated' . mysqli_error($con)  // Dodato rukovanje greškom
        ];
        echo json_encode($res);
        return false;
    }
}
// DELETE TSO
if ($_POST['type'] == 'delete_tso') {
    $tso_id = mysqli_real_escape_string($db->conn, $_POST['tso_id']);

    $query = "DELETE FROM tso WHERE id={$tso_id}";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'TSO Deleted Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'TSO Not Deleted'
        ];
        echo json_encode($res);
        return false;
    }
}
