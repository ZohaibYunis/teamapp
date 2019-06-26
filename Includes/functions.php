<?php 

require 'connection.php';

$folderName = "teamapp";
define('base_url', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/" . $folderName . "/") ;

function getUsers(){
    
    global $connect;

    $sql         = "SELECT 
                        `id`, 
                        `first_name`, 
                        `last_name` 
                    FROM 
                        `users` 
                    WHERE 
                        id 
                    not IN (
                            SELECT 
                                teams_users.user_id 
                            from 
                                teams_users
                            )";
    
    $query       = mysqli_query($connect, $sql);
    $count       = mysqli_num_rows($query);
    $result      = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
    if ($result){
        return $result;
    }else{
        return FALSE;
    }
    
}

function getTeams(){
    
    global $connect;

    $sql         = "select id, name from teams";
    $query       = mysqli_query($connect, $sql);
    $count       = mysqli_num_rows($query);
    $result      = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
    if ($result){
        return $result;
    }else{
        return FALSE;
    }
    
}


?>