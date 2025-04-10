<?php require_once __DIR__ . "/core/autoLoader.php"; ?>
<?php include_once __DIR__ . "/isAuthentified.php"; ?>
<?php include "./isAdmin.php";?>
<?php

/**
 * Steps:
 * 1.   Check : id exists and numeric
 * 2.   Check : id valid (database)
 * 3--->If POST -> process
 *   \->else  ---> render
 */

/**
 * 1. Check : id exists and numeric
 */

if ( (! isset($_GET['id']) || ! is_numeric($_GET['id']) ) ){
    header("Location:index.php?errorMsg=Forbidden Operation");
    exit;
}

$id = intval($_GET['id']);

/**
 * 2.   Check : id valid (database)
 */

$SecRepo = new SectionRepository();

$section = $SecRepo->findById($id);


if (! $section ){
    header("Location:sectionsPage.php?errorMsg=No entries with the given Id");
    exit;
}

/**
 * 3. Switch
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /**
     *  Plan A : process request 
     */
    $updateParams = [];
    foreach($_POST as $k=>$v) :
        if ( $v != "" ) :
            $updateParams[$k] = $v;
        endif;
    endforeach;

    $section = $SecRepo->update($id,$updateParams);

    if (isset($section['errorMsg'])){
        header('Location:updateSection.php?id='.$id.'&errorMsg='.$section['errorMsg']);
        exit;
    }
    else 
        header("Location:sectionsPage.php?successMsg=Successfull Operation");
    exit;
}

/**
 *  Plan B : render form (login like)
 */

$title = "Updating Section Data";

?>

<?php require __DIR__ . "/fragments/head.php"; ?> 
<body>

    <?php require __DIR__ . "/fragments/navbar.php"; ?> 
    <!-- Titles -->
    <div class="container">
        <br>
        <h4><?=$title?></h1>
        <em>An empty field has no effect (Column remains unchanged)</em>
        <br><br><br>
    </div>
    <!-- Form -->
    <div class = "container"> 
    <form method="post" action="updateSection.php?id=<?=$id?>" enctype="multipart/form-data">
        <?php foreach($section as $k=>$v): ?>
        <?php if ($k != "id") :?>
        <strong><?=ucfirst($k)?></strong> (Old : <i><?=$v?></i>) <br>
        <input name="<?=$k?>" type="text" class="form-control">
        <?php endif ; endforeach ?>
        <button class="btn btn-primary" type="submit">
            Update
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
