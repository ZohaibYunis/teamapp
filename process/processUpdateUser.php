<?php 

    session_start();
    require_once '../Includes/connection.php';
    require_once '../Includes/checkLogin.php';
    
    $errors     = array();
    $success    = array();

    $userID = mysqli_real_escape_string($connect, $_POST['userID']);    
    
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
        
        $sql    = " UPDATE 
                        users 
                    SET 
                        first_name = '$firstName',
                        last_name  = '$lastName'
                    WHERE 
                        id = $userID";
        
        $query  = mysqli_query($connect, $sql);
        
        if (mysqli_affected_rows($connect)){

            $success['userAdded'] = "User Has Been Updated.";
            $_SESSION['success'] = $success;
            header('location: ../viewUsers.php');            
            
        }  
        
        else {

            $errors['Input_error'] = "We are Not find any update in this page.";
            $_SESSION['errors']    = $errors;
            header("location: ../editUser.php?editUser=$userID");
            
        }
        
    }else{
        
        $_SESSION['errors'] = $errors;
        header("location: ../editUser.php?editUser=$userID");
        
    }
    
?>