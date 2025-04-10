<?php require_once __DIR__ . "/core/autoLoader.php"; ?> 

<?php
session_start();

$user = strip_tags($_POST['user']);
$password = strip_tags($_POST['password']);

$UserRepo = new UserRepository();

if (isset($user) && isset($password)) {

    $test = $UserRepo->confirmUser($user,$password) ;

    if ($test === true) {
        $_SESSION['user'] = $user;
        header("Location:index.php");
    }

    else if (isset($_GET['errorMsg'])) {
        header("Location:login.php?errorMessage={$_GET['errorMsg']}");
    }
    
    else {
        header("Location:login.php?errorMessage=Veuillez vérifier vos crédentials");
    }
}

?>