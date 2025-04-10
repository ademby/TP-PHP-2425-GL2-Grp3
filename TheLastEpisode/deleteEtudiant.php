<?php require_once __DIR__ . "/core/autoLoader.php"; ?>
<?php include_once __DIR__ . "/isAuthentified.php"; ?>
<?php include "./isAdmin.php";?>
<?php

$StuRepo = new StudentRepository();

if ( (! isset($_GET['id']) || ! is_numeric($_GET['id']) ) ){
    header("Location:studentsPage.php?errorMsg=Forbidden Operation");
    exit;
}

$id = intval($_GET['id']);

$data = $StuRepo->findById($id);


if (! $data ){
    header("Location:studentsPage.php?errorMsg=No entries with the given Id");
    exit;
}

$data = $StuRepo->deleteById($id);

if (isset($data['errorMsg']))
    header('Location:studentsPage.php?errorMsg='.$data['errorMsg']);
    // header('Location:studentsPage.php?errorMsg=Error during execution (You can\'t delete a referenced column)}).');
else 
    header("Location:studentsPage.php?successMsg=Successfull Operation");


?> 