<?php 

    session_start();
    require_once '../Includes/connection.php';
    require_once '../Includes/checkLogin.php';
    
    $errors     = array();
    $success    = array();
    
    try {
        
        $teamName   = trim(mysqli_real_escape_string($connect, $_POST['teamName']));                
        
        if (empty($teamName)){
            throw new Exception("Team Name is required.");
        }
         
    } catch (Exception $ex) {
        $errors['teamName_error'] = $ex->getMessage();
    }

    
    if (count($errors) == 0){
        
        $sql    = "INSERT INTO `teams`(`name`) VALUES ('$teamName')";
        $query  = mysqli_query($connect, $sql);
        
        if (mysqli_insert_id($connect)){
            
            $success['teamAdded'] = "Team Added.";
            $_SESSION['success'] = $success;
            header('location: ../viewTeams.php');            
            
        }  else {
            
            $errors['Input_error'] = "Sql query error." . mysqli_errno($connect) . " " . mysqli_error($connect);
            $_SESSION['errors']    = $errors;
            header('location: ../addTeam.php');
            
        }
        
        
    }else{
        
        $_SESSION['errors'] = $errors;
        header('location: ../addTeam.php');
        
    }
    
    
    
?>