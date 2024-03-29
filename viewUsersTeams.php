<?php

session_start();
require_once 'Includes/checkLogin.php';
require_once './Includes/functions.php';

if (isset($_SESSION['success']['userTeamAdded'])) {
    $success = $_SESSION['success']['userTeamAdded'];
    unset($_SESSION['success']['userTeamAdded']);
}

if (isset($_SESSION['recError']['recError'])) {
    $recError = $_SESSION['recError']['recError'];
    unset($_SESSION['recError']['recError']);
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
                        <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Users Teams <i class="fa fa-angle-right"></i> View Users Teams</li>
                    </ol>

                    <?php if (isset($success)): ?>                                 
                    <div class="alert alert-success">
                      <strong>Success!</strong><?php echo " " . $success; ?>
                    </div>
                    <?php endif; ?>                            
                    
                    <?php if (isset($recError)): ?>                                 
                    <div class="alert alert-danger">
                      <strong>Failed!</strong><?php echo " " . $recError; ?>
                    </div>
                    <?php endif; ?>                            
                    
                    <div class="agile-grids">	
                        <!-- tables -->

                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                
                                <div class="row">
                                    
                                    <div class="col-md-10">
                                       <h2>View Users Teams</h2>                                    
                                    </div>

                                    <div class="col-md-2" style="line-height: 60px;">                                
                                        <a href="<?php echo base_url . 'addUserTeam.php' ?>"> <i style="color: green" class="fa fa-plus"></i> Add User Team</a>
                                    </div>
                                    
                                </div>                                
                                
                                <hr>
                                <div class="table-responsive">                                
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">SR</th>
                                                <th style="text-align: center;">First Name</th>
                                                <th style="text-align: center;">Last Name</th>
                                                <th style="text-align: center;">Teams</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $inc = 1;
                                            $sql = "SELECT * FROM `teams_users` order by id desc";
                                            $query = mysqli_query($connect, $sql);
                                            $results = mysqli_fetch_all($query, MYSQLI_ASSOC);

                                            foreach ($results as $result):
                                                
                                            $sqlUsers = "SELECT first_name, last_name FROM `users` where id = ".$result['user_id']."";
                                            $queryUsers = mysqli_query($connect, $sqlUsers);
                                            $resultsUsers = mysqli_fetch_all($queryUsers, MYSQLI_ASSOC);

                                            $sqlteams = "SELECT name FROM teams where id in (".$result['team_id'].") ";
                                            $queryteams = mysqli_query($connect, $sqlteams);
                                            $resultsteams = mysqli_fetch_all($queryteams, MYSQLI_ASSOC);                                            
                                            
                                                ?>


                                                <tr>
                                                    
                                                    <td style="text-align: center;"><?php echo $inc;  ?></td>
                                                    <td><?php echo $resultsUsers[0]['first_name'];  ?></td>
                                                    <td><?php echo $resultsUsers[0]['last_name']; ?></td>
                                                    <td><?php foreach ($resultsteams as $resultsteam){
                                                        
                                                        echo $resultsteam['name'] . ', ';
                                                        
                                                    } ?> </td>

                                                    
                                                    <td style="text-align: center;">
                                                        <a href="<?php echo base_url . "editUserTeam.php?editUserTeam=" . $result['id'] ?>"> <i style="color: green" class="fa fa-edit"></i> </a>
                                                        <a href="<?php echo base_url . "viewUserTeam.php?userTeam=" . $result['id'] ?>"> <i style="color: green" class="fa fa-eye"></i> </a>
                                                        <!--<a href="<?php ?>"> <i style="color: red" class="fa fa-trash-o"></i> </a>-->
                                                    </td>
                                                    
                                                </tr>

                                            <?php $inc++; endforeach; ?>                                        

                                        </tbody>
                                    </table>
                                </div>    
                            </div>

                        </div>
                        <!-- //tables -->
                    </div>
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
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                }
                else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }

                toggle = !toggle;
            });
        </script>
        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- /Bootstrap Core JavaScript -->	   

    </body>
</html>

