<?php
require_once __DIR__ . "/core/autoLoader.php";
include "./isAuthentified.php";

include "./isAdmin.php";

$SecRepo = new SectionRepository();

if ( (! isset($_GET['id']) || ! is_numeric($_GET['id']) ) ){
    header("Location:sectionsPage.php?errorMsg=Forbidden Operation");
}

$id = intval($_GET['id']);

$data = $SecRepo->findById($id);


if (! $data ){
    header("Location:sectionsPage.php?errorMsg=No entries with the given Id");
}

$data = $SecRepo->deleteById($id);

if (isset($data['errorMsg']))
    header('Location:sectionsPage.php?errorMsg='.$data['errorMsg'].'})');
else 
    header("Location:sectionsPage.php?successMsg=Successfull Operation");


?> 