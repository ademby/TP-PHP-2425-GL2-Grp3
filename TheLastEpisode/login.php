<?php require_once __DIR__ . "/core/autoLoader.php"; ?> 

<?php
$title = "Login";
?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>

    <?php require __DIR__ . "/fragments/navbar.php"; ?> 
    <!-- Titles -->
    <div class="container">
        <br>
        <h4>Accessing The SMS Platform requires logging in</h1>
        <br>
    </div>
    <!-- Form -->
    <div class = "container"> 
    <form method="post" action="processLogin.php" enctype="multipart/form-data">
        Username : <br><br>
        <input name="user" type="text" class="form-control">
        Password : <br><br>
        <input name="password" type="password" class="form-control">
        <br>
        <button class="btn btn-primary" type="submit">
            Login
        </button>
    </form>
    </div>
    <div class="container">
        <br>
    </div>
    <!-- GET Messages -->
    <?php include "./fragments/getResponse.php"?>
</body>   


<?php require __DIR__ . "/fragments/footer.php"; ?> 
