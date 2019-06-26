<?php
session_start();
require_once 'Includes/checkLogin.php';
require_once './Includes/functions.php';

if (isset($_SESSION['success']['userTeamAdded'])) {
    $success = $_SESSION['success']['userTeamAdded'];
    unset($_SESSION['success']['userTeamAdded']);
}
?>

<?php if (isset($success)): ?>                                 
    <?php echo $success; ?>
<?php endif; ?>        

<!DOCTYPE HTML>
<html>
    <head>
        <title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Tabels :: w3layouts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css"/>
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!-- //jQuery -->
        <!-- tables -->
        <link rel="stylesheet" type="text/css" href="css/table-style.css" />
        <link rel="stylesheet" type="text/css" href="css/basictable.css" />
        <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#table').basictable();
            });
        </script>
        <!-- //tables -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
    </head> 
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
                    
                    <div class="agile-grids">	
                        <!-- tables -->

                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>View Users Teams</h2>
                                <hr>
                                <table id="table">
                                    <thead>
                                        <tr>
                                            <th>SR</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Teams</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
<?php  

    $sql = "SELECT * FROM `teams_users`";
    $query = mysqli_query($connect, $sql);
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
    echo "<pre>";
    print_r($result);

foreach ($results as $results):
    
?>
                                       
                                        
                                        <tr>
                                            <td>Jill Smith</td>
                                            <td>25</td>
                                            <td>Female</td>
                                            <td>5'4</td>
                                        </tr>
                                        
<?php endforeach; ?>                                        
                                        
                                    </tbody>
                                </table>
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

