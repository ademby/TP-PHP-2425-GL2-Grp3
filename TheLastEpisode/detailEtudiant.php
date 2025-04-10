<?php require_once __DIR__ . "/core/autoLoader.php"; ?>
<?php include_once __DIR__ . "/isAuthentified.php"; ?>
<?php

$isAdmin = ($_SESSION['user']=== "admin");

/**
 * Data retrieval
 */

$StuRepo = new StudentRepository();

if ( (! isset($_GET['id']) || ! is_numeric($_GET['id']) ) ){
    header("Location:studentsPage.php?errorMsg=Forbidden Operation");
    exit;
}

$id = intval($_GET['id']);

$data = $StuRepo->findById($id);


if (! $data ){
    header("Location:studentsPage.php?errorMsg=No entries with the given Id");
    exit;
}

/**
 * Webpage creation
 */

$title = $data['name'] . '\'s Profile';
$data['image'] = '<img src="' . $data['imageURL'] . '" class="img-thumbnail rounded d-block" style="max-height: 300px; max-width: 300px;" alt="Check out permissions">';
unset($data['imageURL']);

?> 

<?php require __DIR__ . "/fragments/head.php"; ?>

<body>

    <?php require __DIR__ . "/fragments/navbar.php"; ?>

    <div class="container">
        <br>
        <h1>
            <?= htmlspecialchars($title); ?>
        </h1>
        <br>
        <?= $data['image']?>
        <?php foreach ($data as $k=>$v): if($k != 'image' && $k != 'id') { ?>
        <p><b><?= ucfirst(htmlspecialchars($k))?></b>  : <?=htmlspecialchars($v)?> </p>
        <?php } endforeach; ?>
    </div>


</body>
<?php require __DIR__ . "/fragments/footer.php"; ?>