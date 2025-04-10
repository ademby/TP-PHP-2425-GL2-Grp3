<?php
if ( (! isset($_SESSION['user']))  ||  ($_SESSION['user']!="admin") ) {
    header('location:login.php?errorMsg=Login with an admin account to proceed');
    exit();
}
?>