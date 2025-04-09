<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "Gestion de Session";
$sessionManager = new SessionManager();
$message = $sessionManager->run();
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>
    <div class="container">
        <h1> <?= htmlspecialchars($title); ?> </h1>
        <p> <?= htmlspecialchars($message); ?> </p>
        <form method="post">
            <button type="submit" name="reset">Réinitialiser la session</button>
        </form>
    </div>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 