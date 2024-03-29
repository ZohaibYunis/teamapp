<?php 
    session_start();
    
if (isset($_SESSION['username'])){
    header('location:index.php');
}    
    
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
        <div class="main-wthree">
            <div class="container">
                <div class="sin-w3-agile">

                    <h2 style="text-align: left; font-weight: 100%; font-family: 'Patua One', cursive;" >Team App Login</h2>

                    <form action="process/processLogin.php" method="post">
                       
                        <?php if (isset($errors)): ?>
                            <div class="alert alert-danger">
                                <?php 
                                    foreach ($errors as $error):
                                        echo  $error . "<br>";
                                    endforeach;
                                ?>
                            </div>                            
                        <?php endif; ?>                        
                        
                        <div class="username">
                            <span class="username">Username:</span>
                            <input type="text" name="username" class="name" placeholder="" required="">
                            <div class="clearfix"></div>
                        </div>

                        <div class="password-agileits">
                            <span class="username">Password:</span>
                            <input type="password" name="password" class="password" placeholder="" required="">
                            <div class="clearfix"></div>
                        </div>

                        <div class="login-w3">
                            <input type="submit" class="login" value="Login">
                        </div>

                        <div class="clearfix"></div>

                    </form>

                    <br>                

                    <!-- Footer Start -->                    
                    <?php require_once 'Includes/footer.php'; ?>
                    <!-- Footer End -->                                    

                </div>
            </div>
        </div>
    </body>
</html>