<?php

session_start();

require_once 'Includes/checkLogin.php';
require_once './Includes/functions.php';


    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    if ($_GET['editUserTeam']){
        
        $recError   = array();
        
        $sql        = "SELECT * FROM `teams_users` where id =" . mysqli_real_escape_string($connect ,$_GET['editUserTeam'])."";
        $query      = mysqli_query($connect, $sql);
        $rows       = mysqli_num_rows($query);
        
        if ($rows){
            
            $results    = mysqli_fetch_array($query, MYSQLI_ASSOC);            
            $users      = getUsersWithCondition($results['user_id']);
            $teams      = getTeams();
            
        }else{
            
            $recError['recError']  = "User Teams Record Not Found for Update.";
            $_SESSION['recError']  = $recError;
            
            header('location:viewUsersTeams.php');            
        }
    }else{
        header('location:viewUsersTeams.php');
    }


?>

<!DOCTYPE HTML>
<html>

    <!-- Header Start -->    
<?php require_once 'Includes/header.php'; ?>    
    <!-- Header End -->            

    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="mother-grid-inner">

                    <!--header start here-->
<?php require_once 'Includes/mainHeader.php'; ?>                     
                    <!--heder end here-->

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Teams <i class="fa fa-angle-right"></i> Edit User Team</li>
                    </ol>

                    <!--grid-->
                    <div class="grid-form">

                        <div class="grid-form1">

                                <div class="row">
                                
                                    <div class="col-md-9">
                            <h3>Edit User Team</h3>
                                    </div>

                                    <div class="col-md-3" style="line-height: 60px;">                                
                                        <a href="<?php echo base_url . 'addUserTeam.php' ?>"> <i style="color: green" class="fa fa-eye"></i> Add User Team</a> |                                         
                                        <a href="<?php echo base_url . 'viewUsersTeams.php' ?>"> <i style="color: green" class="fa fa-eye"></i> View User Teams</a>
                                    </div>
                                    
                                </div>                                
                            
                            
                            <hr>

                            <div class="tab-content">
                                
                                    <?php if (isset($errors)): ?>
                                            <div class="col-sm-12 alert alert-danger">
                                            <?php
                                            foreach ($errors as $error):
                                                echo  $error . "<br>";
                                            endforeach;
                                            ?>
                                            </div>                            

                                            <?php endif; ?>                        
                                
                                
                                <div class="tab-pane active" id="horizontal-form">
                                    <form class="form-horizontal" action="process/processEditUserTeams.php" method="post">
                                        <div class="form-group">
                                            <label for="selector1" class="col-sm-2 control-label">Select User</label>
                                            <div class="col-sm-7">
                                                <select name="user" class="form-control">
                                                    <option value="">select User</option>
                                                    
                                                    <?php 
                                                    
                                                        if ($users){
                                                        foreach ($users as $user): ?>
                                                            <option <?php echo ($user['id'] == $results['user_id']) ? 'selected' : '' ?> value="<?php echo trim($user['id']); ?>"><?php echo trim($user['first_name'] . " " . $user['last_name']); ?></option>
                                                    <?php 
                                                        endforeach;  
                                                        }else{ ?>
                                                            <option value="">No More new users found.</option>                                                            
                                                <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <?php if (isset($errors['user_error'])): ?>                                 
                                                <div class="col-sm-2">
                                                    <p class="help-block" style="color: #a94442; font-weight: bolder;"><?php echo $errors['user_error'] ?></p>
                                                </div>
                                            <?php endif; ?>                                                    
                                            
                                        </div>                                        

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Select Team</label>
                                            
                                            <div class="col-sm-7">
                                                
                                                <select name="teams[]" multiple="" class="form-control1">
                                                    <option value="">Select Team</option>
                                                    <?php foreach ($teams as $team): ?>
                                                            <option value="<?php echo trim($team['id']); ?>"><?php echo trim($team['name']); ?></option>
                                                    <?php endforeach;  ?>                                                    
                                                </select>
                                                
                                            </div>
                                            
                                            <?php if (isset($errors['team_error'])): ?>                                 
                                                <div class="col-sm-2">
                                                    <p class="help-block" style="color: #a94442; font-weight: bolder;"><?php echo $errors['team_error'] ?></p>
                                                </div>
                                            <?php endif; ?>        
                                            
                                        </div>

                                <input type="hidden" name="userTeamId" value="<?php echo $results['id'] ?>">                                        
                                        
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-primary btn">Edit User Team</button>
                                        </div>
                                    </div>
                                </div>

                                </form>                                

                            </div>



                        </div>
                    </div>
                    <!--//grid-->

                    <!-- script-for sticky-nav -->
                    <script>
                        $(document).ready(function () {
                            var navoffeset = $(".header-main").offset().top;
                            $(window).scroll(function () {
                                var scrollpos = $(window).scrollTop();
                                if (scrollpos >= navoffeset) {
                                    $(".header-main").addClass("fixed");
                                } else {
                                    $(".header-main").removeClass("fixed");
                                }
                            });

                        });
                    </script>
                    <!-- /script-for sticky-nav -->
                    <!--inner block start here-->
                    <div class="inner-block">

                    </div>
                    <!--inner block end here-->

                    <!-- Footer Start -->                    
<?php require_once 'Includes/footer.php'; ?>
                    <!-- Footer End -->                                        

                </div>
            </div>

            <!--//content-inner-->

            <!-- sidebar-menu -->
<?php require_once 'Includes/navbar.php'; ?>
            <!-- sidebar-menu End-->

            <div class="clearfix"></div>		
        </div>

        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- /Bootstrap Core JavaScript -->	   

    </body>
</html>