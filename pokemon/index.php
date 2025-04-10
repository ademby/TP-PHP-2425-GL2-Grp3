<?php
// Enable error reporting
error_reporting(E_ALL); // Report all types of errors
ini_set('display_errors', 1); // Display errors on the screen
?>

<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "Pokemon Wars";
require_once __DIR__ . "/core/main.php";
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>
    <div class="container">
        <h1><?= htmlspecialchars($title); ?></h1>
        <?php
        //require __DIR__ . "/views/tmp.php";
        require __DIR__ . "/views/pick.php";
        
        if ($show_faceoff) {
            require __DIR__ . "/views/faceoff.php";
        }
        if ($show_fight) {
            require __DIR__ . "/views/fight.php";
        }
        ?>
    </div>

</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 