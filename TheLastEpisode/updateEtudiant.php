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

if ( (! isset($_GET['id']) )|| (! is_numeric($_GET['id']) ) ){
    header("Location:index.php?errorMsg=Forbidden Operation");
    exit;
}

$id = intval($_GET['id']);

/**
 * 2.   Check : id valid (database)
 */

$StuRepo = new StudentRepository();

$student = $StuRepo->findById($id);


if (! $student ){
    header("Location:studentsPage.php?errorMsg=No entries with the given Id");
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
    if (isset($_FILES['image']) && ($_FILES['image']['size'] > 0)) {
        if(! str_starts_with($_FILES['image']['type'], "image")){
            $student = [];
            $student['errorMsg'] = "Please provide an image, not something else";   
            header('Location:updateEtudiant.php?id='.$id.'&errorMsg='.$student['errorMsg']);
            exit;
        }
        $newFilePath = "images/".$_FILES['image']['name'];
        $newFilePath = str_replace(' ', '_', $newFilePath);
        if ( ! move_uploaded_file($_FILES['image']['tmp_name'], $newFilePath) ){
            $student = [];
            $student['errorMsg'] = "Unable to store the image, check server's permissions";   
            header('Location:updateEtudiant.php?id='.$id.'&errorMsg='.$student['errorMsg']);
            exit;
        }
        $updateParams['imageURL'] = $newFilePath;
    }

    $student = $StuRepo->update($id,$updateParams);

    if (isset($student['errorMsg'])){
        header('Location:updateEtudiant.php?id='.$id.'&errorMsg='.$student['errorMsg']);
        exit;
    }
    else 
        header("Location:studentsPage.php?successMsg=Successfull Operation");
    exit;
}

/**
 *  Plan B : render form (login like)
 */

$title = "Updating Student Data";

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
    <form method="post" action="updateEtudiant.php?id=<?=$id?>" enctype="multipart/form-data">
        <?php foreach($student as $k=>$v): ?>
        <?php if ($k != "id" && $k != "imageURL") :?>
        <strong><?=ucfirst($k)?></strong> (Old : <i><?=$v?></i>) <br>
        <input name="<?=$k?>" type="text" class="form-control">
        <?php elseif ($k != "id" && $k == "imageURL") :?>
        <strong>Image</strong> insert old image here somehow<br>
        <input name="image" type="file" class="form-control">
        <?php endif ?>
        <?php endforeach ?>
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
