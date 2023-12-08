<?php

include_once 'controllers/LoginController.php';


$auth = new LoginController($db);
if(isset($_POST['login_btn'])){
   
    $email = valideteInput($db->conn, $_POST['email']);
    $password= valideteInput($db->conn, $_POST['password']);
    
    //$auth = new LoginController($db);
    $checkLogin = $auth->userLogin($email, $password);
    if($checkLogin){
        if($_SESSION['auth_role'] == '1'){
            
            redirect("<h5 class='text-info'>Logged In Successfully</5>", "index.php");
        } else {
            redirect("Logged In Successfully", "index.php");
        }
        
    }else{
        redirect("Invalid Email Id or Password", "login.php");
    }
}

if(isset($_POST['logout_btn'])){
    $checkLoggedOut = $auth->logout();
    echo $checkLoggedOut;
    if($checkLoggedOut){
        redirect("<h5 class='text-info'>Logged Out Successfully</h5>", "index.php");
    }else{
        redirect("Failed", "index.php");
    }
        
}

/*if(isset($_POST['register_btn'])){
     //var_dump($_POST['register_btn']);
    $fname = valideteInput($db->conn, $_POST['fname']);
    $lname = valideteInput($db->conn, $_POST['lname']);
    $email = valideteInput($db->conn, $_POST['email']);
    $password= valideteInput($db->conn, $_POST['password']);
    $confirm_password = valideteInput($db->conn, $_POST['confirm_password']);
    
    $register = new RegisterController($db);
    $result_password = $register->confirmPassword($password, $confirm_password);
    if($result_password)
    {
        $result_user = $register->isUserExists($email);
        if($result_user){
            redirect("Already Email Exists", "register.php");
        } else {
            $register_query = $register->registration($fname, $lname, $email, $password);
            
            if($register_query){
               redirect("Registered Successfuly!", "login.php"); 
               var_dump($register_query);
            }else{
                var_dump($register_query);
                //redirect("Error: " . $db->conn->error, "register.php");
            }
        }
        
    }else{
        redirect("Password and Confirm Password Does not match", "register.php");
    }   
}*/
