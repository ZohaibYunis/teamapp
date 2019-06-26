<?php
session_start();
require_once 'Includes/checkLogin.php';
require_once './Includes/functions.php';

if (isset($_SESSION['success']['userAdded'])){
    $success = $_SESSION['success']['userAdded'];
    unset($_SESSION['success']['userAdded']);
} 

?>

<?php if (isset($success)): ?>                                 
<?php echo $success; ?>
<?php endif; ?>        




