<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "notes Etudiants";
$students = [
    new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant("Skander", [15, 9, 8, 16])
];
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>
    <div class="container">
        <h1>
            <?= htmlspecialchars($title); ?> 
        </h1>
    </div>
    <div class="row">
    <?php /* 
    foreach ($students as $student): ?>
        <div class="col-md-6">
            <?php $student->display(); ?>
        </div>
    <?php endforeach; 
    */ ?>
    </div>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 