<?php

    session_start();
    require_once 'Includes/checkLogin.php';
    require_once './Includes/functions.php';
    
    if ($_GET['Team']){
        
        $recError   = array();        
        
        $sql        = "SELECT * FROM `teams` where id =" . mysqli_real_escape_string($connect ,$_GET['Team'])."";
        $query      = mysqli_query($connect, $sql);
        $rows       = mysqli_num_rows($query);
        
        if ($rows){
            $results = mysqli_fetch_array($query, MYSQLI_ASSOC);            
        }else{
            
            $recError['recError']  = "Team Record Not Found.";
            $_SESSION['recError']  = $recError;
            
            header('location:viewTeams.php');            
        }
    }else{
        header('location:viewTeams.php');
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
                        <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Teams<i class="fa fa-angle-right"></i> View Team </li>
                    </ol>
                    
                    <div class="agile-grids">	
                        <!-- tables -->

                        <div class="agile-tables">
                            <div class="w3l-table-info">

                                <div class="row">
                                    
                                    <div class="col-md-9">
                                        <h2>View Team</h2>
                                    </div>

                                    <div class="col-md-3" style="line-height: 60px;">                                
                                        <a href="<?php echo base_url . 'addTeam.php' ?>"> <i style="color: green" class="fa fa-plus"></i> Add Team </a> |
                                        <a href="<?php echo base_url . 'viewTeams.php' ?>"> <i style="color: green" class="fa fa-eye"></i> View Teams</a>
                                    </div>
                                    
                                </div>                                
                                
                                
                                <hr>
                                <div class="table-responsive">                                
                                    <table class="table table-bordered">

                                            <tr>
                                                <th>Team Name</th>
                                                <td><?php echo $results['name'] ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Created At</th>
                                                <td>
                                                    <?php 
                                                        $old_date_timestamp = strtotime($results['created_at']);
                                                        $new_date = date('Y M d H:i:s A', $old_date_timestamp);   
                                                        echo $new_date;
                                                    ?>
                                                </td>                                                
                                            </tr>
                                            
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


