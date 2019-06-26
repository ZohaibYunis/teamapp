<?php
session_start();
require_once 'Includes/checkLogin.php';
require_once './Includes/functions.php';


if (isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
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
                        <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Users <i class="fa fa-angle-right"></i> Add User</li>
                    </ol>

                    <!--grid-->
                    <div class="grid-form">

                        <div class="grid-form1">

                                <div class="row">
                                
                                    <div class="col-md-9">
                                        <h3>Add User</h3>
                                    </div>

                                    <div class="col-md-3" style="line-height: 60px;">                                
                                        <a href="<?php echo base_url . 'viewUsers.php' ?>"> <i style="color: green" class="fa fa-eye"></i> View User</a>
                                    </div>
                                    
                                </div>                                
                            
                            
                            <hr>
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="horizontal-form">
                                    <form class="form-horizontal" action="process/processAddUser.php" method="post">

                                        <?php if (isset($errors)): ?>
                                            <div class="alert alert-danger">
                                                <?php 
                                                    foreach ($errors as $error):
                                                        echo  $error . "<br>";
                                                    endforeach;
                                                ?>
                                            </div>                            
                                        <?php endif; ?>                        
                                        
                                        <div class="form-group">
                                            <label for="FirstName" class="col-sm-2 control-label">First Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="firstName" class="form-control1" id="focusedinput" placeholder="Enter First Name">
                                            </div>
                                   <?php if (isset($errors['firstName_error'])): ?>                                 
                                            <div class="col-sm-2">
                                                <p class="help-block" style="color: #a94442; font-weight: bolder;"><?php echo $errors['firstName_error'] ?></p>
                                            </div>
                                    <?php endif; ?>        
                                        </div>

                                        <div class="form-group">

                                            <label for="LastName" class="col-sm-2 control-label">Last Name</label>

                                            <div class="col-sm-8">
                                                <input type="text" name="lastName" class="form-control1" id="focusedinput" placeholder="Enter Last Name">
                                            </div>
                                            
                                   <?php if (isset($errors['lastName_error'])): ?>                                 
                                            <div class="col-sm-2">
                                                <p class="help-block" style="color: #a94442; font-weight: bolder;"><?php echo $errors['lastName_error'] ?></p>
                                            </div>
                                    <?php endif; ?>        

                                        </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-primary btn">Submit</button>
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