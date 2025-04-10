<?php require_once __DIR__ . "/core/autoLoader.php"; ?>
<?php include_once __DIR__ . "/isAuthentified.php"; ?>
<?php include "./isAdmin.php";?>
<?php


$SecRepo = new SectionRepository();

if ( (! isset($_GET['id']) || ! is_numeric($_GET['id']) ) ){
    header("Location:sectionsPage.php?errorMsg=Forbidden Operation");
    exit;
}

$id = intval($_GET['id']);

$section = $SecRepo->findById($id);


if (! $section ){
    header("Location:sectionsPage.php?errorMsg=No entries with the given Id");
    exit;
}

$section = $SecRepo->deleteById($id);

if (isset($section['errorMsg'])) {
    header('Location:sectionsPage.php?errorMsg='.$section['errorMsg']);
    exit;
}
else 
    header("Location:sectionsPage.php?successMsg=Successfull Operation");

?> 