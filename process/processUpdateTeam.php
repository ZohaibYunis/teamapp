<?php 

    session_start();
    require_once '../Includes/connection.php';
    require_once '../Includes/checkLogin.php';
    
    $errors     = array();
    $success    = array();

    $teamID = mysqli_real_escape_string($connect, $_POST['teamID']);    
    
    try {
        
        $teamName   = trim(mysqli_real_escape_string($connect, $_POST['teamName']));                
        
        if (empty($teamName)){
            throw new Exception("Team Name is required.");
        }
         
    } catch (Exception $ex) {
        $errors['teamName_error'] = $ex->getMessage();
    }
    
    
    if (count($errors) == 0){
        
        $sql    = " UPDATE 
                        teams 
                    SET 
                        name = '$teamName'
                    WHERE 
                        id = $teamID";

        $query  = mysqli_query($connect, $sql);
        
        if (mysqli_affected_rows($connect)){

            $success['teamAdded'] = "Team Has Been Updated.";
            $_SESSION['success'] = $success;
            header('location: ../viewTeams.php');            
            
        }  
        
        else {

            $errors['Input_error'] = "We are Not find any update in this page.";
            $_SESSION['errors']    = $errors;
            header("location: ../editTeam.php?editTeam=$teamID");
            
        }
        
    }else{
        
        $_SESSION['errors'] = $errors;
        header("location: ../editTeam.php?editTeam=$teamID");
        
    }
    
?>