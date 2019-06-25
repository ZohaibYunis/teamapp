<?php 

    session_start();
    require_once '../Includes/connection.php';
    $errors     = array();
    
    try {
        $username   = trim(mysqli_real_escape_string($connect, $_POST['username']));        
        
        if (!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $username)){
            throw new Exception("UserName is Invalid.");
        }
        
    } catch (Exception $ex) {
        $errors['username_error'] = $ex->getMessage();
    }

    try {
        
        if (empty($_POST['password'])){
            throw new Exception("password is required.");
        }
        
        $password = addslashes(mysqli_real_escape_string($connect, $_POST['password']));
        
    } catch (Exception $ex) {
        $errors['password_error'] = $ex->getMessage();
    }
    
    if (count($errors) == 0){
        
        echo $sql    = "select username, password from admin where username = '$username' and password = md5('$password')";
        $query       = mysqli_query($connect, $sql);
        $count       = mysqli_num_rows($query);
        
        if ($count == 1){
            
            $_SESSION['username'] = $username;
            header('location: ../index.php');            
        
        }else{
            
            $errors['loginErr'] = "Invalid Login Credentials.";
            $_SESSION['errors'] = $errors;
            header('location: ../login.php');
            
        }
        
    }else{
        
        $_SESSION['errors'] = $errors;
        header('location: ../login.php');
        
    }
    
    
    
?>