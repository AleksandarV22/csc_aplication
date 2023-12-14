<?php

require '../config/app.php';
// ADD TSO
if ($_POST['type'] == 'save_csc_param') {
    $csc_ra = mysqli_real_escape_string($db->conn, $_POST['csc_ra']);
    $csc_cnt1 = mysqli_real_escape_string($db->conn, $_POST['csc_cnt1']);
    $csc_cnt2 = mysqli_real_escape_string($db->conn, $_POST['csc_cnt2']);
    $csc_xnec1 = mysqli_real_escape_string($db->conn, $_POST['csc_xnec1']);
    $csc_xnec2 = mysqli_real_escape_string($db->conn, $_POST['csc_xnec2']);
    // var_dump($csc_xnec2);
    $csc_q = mysqli_real_escape_string($db->conn, $_POST['csc_q']);
    $csc_rsba = mysqli_real_escape_string($db->conn, $_POST['csc_rsba']);
    $csc_rsme = mysqli_real_escape_string($db->conn, $_POST['csc_rsme']);
    $csc_bame = mysqli_real_escape_string($db->conn, $_POST['csc_bame']);
    $csc_sens = mysqli_real_escape_string($db->conn, $_POST['csc_sens']);

    if (empty($csc_ra) || empty($csc_cnt1) || empty($csc_cnt2) || empty($csc_xnec1) || empty($csc_xnec2) || empty($csc_q)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }
    if ($csc_sens == NULL) {
        $query = "INSERT INTO csc_param (ra_tso,cnt1_tso,cnt2_tso,xnec1_tso,xnec2_tso,q,rsba,rsme,bame) VALUES ('$csc_ra','$csc_cnt1','$csc_cnt2','$csc_xnec1','$csc_xnec2','$csc_q','$csc_rsba','$csc_rsme','$csc_bame')";
    } else {
        $query = "INSERT INTO csc_param (ra_tso,cnt1_tso,cnt2_tso,xnec1_tso,xnec2_tso,q,rsba,rsme,bame,sensitivity) VALUES ('$csc_ra','$csc_cnt1','$csc_cnt2','$csc_xnec1','$csc_xnec2','$csc_q','$csc_rsba','$csc_rsme','$csc_bame','$csc_sens')";
    }

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'CSC Created Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'CSC Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}
// POP UP update CSC
if ($_POST['type'] == 'update_csc_param') {
    $csc_id = mysqli_real_escape_string($db->conn, $_POST['csc_id']);
    $csc_ra = mysqli_real_escape_string($db->conn, $_POST['csc_ra']);
    $csc_cnt1 = mysqli_real_escape_string($db->conn, $_POST['csc_cnt1']);
    $csc_cnt2 = mysqli_real_escape_string($db->conn, $_POST['csc_cnt2']);
    $csc_xnec1 = mysqli_real_escape_string($db->conn, $_POST['csc_xnec1']);
    $csc_xnec2 = mysqli_real_escape_string($db->conn, $_POST['csc_xnec2']);
    $csc_q = mysqli_real_escape_string($db->conn, $_POST['csc_q']);
    $csc_rsba = mysqli_real_escape_string($db->conn, $_POST['csc_rsba']);
    $csc_rsme = mysqli_real_escape_string($db->conn, $_POST['csc_rsme']);
    $csc_bame = mysqli_real_escape_string($db->conn, $_POST['csc_bame']);
    $csc_sens = mysqli_real_escape_string($db->conn, $_POST['csc_sens']);

    if (empty($csc_ra) || empty($csc_cnt1) || empty($csc_cnt2) || empty($csc_xnec1) || empty($csc_xnec2) || empty($csc_q)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE csc_param SET ra_tso='$csc_ra',cnt1_tso='$csc_cnt1',cnt2_tso='$csc_cnt2',xnec1_tso='$csc_xnec1',xnec2_tso='$csc_xnec2',q='$csc_q',rsba='$csc_rsba',rsme='$csc_rsme',bame='$csc_bame',sensitivity='$csc_sens' WHERE id='$csc_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'CSC Updated Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'CSC Not Updated' . mysqli_error($con)  // Dodato rukovanje greškom
        ];
        echo json_encode($res);
        return false;
    }
}
// DELETE TSO
if ($_POST['type'] == 'delete_csc_param') {
    $csc_id = mysqli_real_escape_string($db->conn, $_POST['csc_id']);

    $query = "DELETE FROM csc_param WHERE id='$csc_id'";

    $query_run = mysqli_query($db->conn, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'CSC Deleted Successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'CSC Not Deleted'
        ];
        echo json_encode($res);
        return false;
    }
}
