<?php

    session_start();

    // echo var_dump($_SESSION);
    unset($_SESSION);

    session_unset();
    session_destroy();
    
    header("Location:index.php");
    exit;
?>