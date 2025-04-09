<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "Home";
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>
<div class="container">
        <h1>
            <?= htmlspecialchars($title); ?> 
        </h1>
    </div>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 