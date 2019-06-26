<?php 

    session_start();
    require_once '../Includes/connection.php';
    require_once '../Includes/checkLogin.php';
    
    $errors     = array();
    $success    = array();
    
    try {
        
        $firstName   = trim(mysqli_real_escape_string($connect, $_POST['firstName']));                
        
        if (empty($firstName)){
            throw new Exception("First Name is required.");
        }
         
    } catch (Exception $ex) {
        $errors['firstName_error'] = $ex->getMessage();
    }

    try {
        
        $lastName = trim(mysqli_real_escape_string($connect, $_POST['lastName']));        
        
        if (empty($lastName)){
            throw new Exception("Last Name is required.");
        }
        
         
    } catch (Exception $ex) {
        $errors['lastName_error'] = $ex->getMessage();
    }
    
    if (count($errors) == 0){
        
        $sql    = "INSERT INTO `users`(`first_name`, `last_name`) VALUES ('$firstName','$lastName')";
        $query  = mysqli_query($connect, $sql);
        
        if (mysqli_insert_id($connect)){
            
            $success['userAdded'] = "User Added.";
            $_SESSION['success'] = $success;
            header('location: ../viewUsers.php');            
            
        }  else {
            
            $errors['Input_error'] = "Sql query error." . mysqli_errno($connect) . " " . mysqli_error($connect);
            $_SESSION['errors']    = $errors;
            header('location: ../addUser.php');
            
        }
        
        
    }else{
        
        $_SESSION['errors'] = $errors;
        header('location: ../addUser.php');
        
    }
    
    
    
?>