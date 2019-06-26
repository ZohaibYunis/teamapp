<?php
session_start();
require_once 'Includes/checkLogin.php';
require_once './Includes/functions.php';

if (isset($_SESSION['success']['teamAdded'])){
    $success = $_SESSION['success']['teamAdded'];
    unset($_SESSION['success']['teamAdded']);
} 

?>

<?php if (isset($success)): ?>                                 
<?php echo $success; ?>
<?php endif; ?>        




