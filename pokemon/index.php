<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "Pokemon Wars";
require __DIR__ . "/core/main.php";
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>
    <div class="container">
        <h1><?= htmlspecialchars($title); ?></h1>
    </div>
    <?php require __DIR__ . "/views/pick.php"; ?>
    <?php require __DIR__ . "/views/faceoff.php"; ?>
    <?php require __DIR__ . "/views/fight.php"; ?>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 