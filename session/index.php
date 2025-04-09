<?php require __DIR__ . "/core/autoLoader.php"; ?> 

<?php 
$title = "Session Management";
$sessionManager = new SessionManager();
$message = $sessionManager->run();
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>
    <div class="container">
        <h1> <?= htmlspecialchars($title); ?> </h1>
        <p> <?= htmlspecialchars($message); ?> </p>
        <form method="post">
            <button type="submit" name="reset">Reset Session</button>
        </form>
    </div>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?> 