<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "Gestion de Session";
$sessionManager = new SessionManager();
$message = $sessionManager->run();
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body class="d-flex flex-column min-vh-100">
    <div class="container flex-grow-1 py-4">
        <h1> <?= htmlspecialchars($title); ?> </h1>
        <div class="alert alert-info"> 
                <?= htmlspecialchars($message); ?> 
        </div>
        <form method="post" class="text-center">
            <button type="submit" name="reset" class="btn btn-danger">Réinitialiser la session</button>
        </form>
    </div>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 