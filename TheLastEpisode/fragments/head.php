<?php
session_start();
$connected = false;
if (isset($_SESSION['user'])) {
    $connected = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (!isset($title))
        $title = "SMS"
    ?>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- The following is for the XAMPP Theme -->
    <link href="/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script> -->
    <link href="/images/favicon.png" rel="icon" type="image/png" />

</head>