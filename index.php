<?php 
    session_start();
    require_once 'Includes/checkLogin.php';
    require_once './Includes/functions.php';
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
                        <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
                    </ol>
                    
                    <!--four-grids here-->
                    
                    <div class="four-grids">
                        <div class="col-md-3 four-grid">
                            <div class="four-agileits">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>User</h3>
                                    <h4> 24,420  </h4>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 four-grid">
                            <div class="four-agileinfo">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>Clients</h3>
                                    <h4>15,520</h4>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 four-grid">
                            <div class="four-w3ls">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>Projects</h3>
                                    <h4>12,430</h4>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 four-grid">
                            <div class="four-wthree">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>Old Projects</h3>
                                    <h4>14,430</h4>

                                </div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>


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
        <!-- morris JavaScript -->	
        <script src="js/raphael-min.js"></script>
        <script src="js/morris.js"></script>

    </body>
</html>