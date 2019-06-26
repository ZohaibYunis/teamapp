<?php 

    session_start();
    require_once '../Includes/connection.php';
    require_once '../Includes/checkLogin.php';
    
    $errors     = array();
    $success    = array();
    $post       = array();

    $userTeamId = mysqli_real_escape_string($connect, $_POST['userTeamId']);        
    
    try {
        
        $user   = trim(mysqli_real_escape_string($connect, $_POST['user']));                
        
        if (empty($user)){
            throw new Exception("User is required.");
        }
         
    } catch (Exception $ex) {
        $errors['user_error'] = $ex->getMessage();
    }

    try {
        
        $teams   = $_POST['teams'];                
        
        if (is_array($teams)){
            
            foreach ($teams as $team){
                
                if (empty($team)){
                    throw new Exception("Teams is required.");
                }
                
            }
            
        }else{
            
            if (empty($teams)){
                throw new Exception("Team is required.");
            }
            
        }
         
    } catch (Exception $ex) {
        $errors['team_error'] = $ex->getMessage();
    }

    
    if (count($errors) == 0){
        
        $teams = implode(",", $teams);
        
        $sql    = " UPDATE 
                        `teams_users` 
                    SET 
                        team_id = '$teams',
                        user_id = $user 
                    WHERE 
                        id = $userTeamId";
        
        $query  = mysqli_query($connect, $sql);
        
        if (mysqli_insert_id($connect)){
            
            $success['userTeamAdded'] = "User Team Added.";
            $_SESSION['success'] = $success;
            header('location: ../viewUsersTeams.php');            
            
        }  else {
            
            $errors['Input_error'] = "Sql query error." . mysqli_errno($connect) . " " . mysqli_error($connect);
            $_SESSION['errors']    = $errors;
            header('location: ../editUserTeam.php');
            
        }
        
    }else{
        
        $_SESSION['errors'] = $errors;
        header('location: ../editUserTeam.php');
        
    }
    
    
    
?>