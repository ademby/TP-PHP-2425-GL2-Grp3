<?php require_once __DIR__ . "/core/autoLoader.php"; ?>
<?php include_once __DIR__ . "/isAuthentified.php"; ?>
<?php

$isAdmin = ($_SESSION['user']=== "admin");

/**
 * Data retrieval
 */

$SecRepo = new SectionRepository();

if ( (! isset($_GET['id']) || ! is_numeric($_GET['id']) ) ){
    header("Location:sectionsPage.php?errorMsg=Forbidden Operation");
}

$id = intval($_GET['id']);

$data = $SecRepo->findById($id);


if (! $data ){
    header("Location:sectionsPage.php?errorMsg=No entries with the given Id");
}

$section = $data;
$StuRepo = new StudentRepository();
$students = $StuRepo->findAllBySection($section['designation']);
array_walk($students, function (&$item) {
    $item['image'] = '<img src="' . $item['imageURL'] . '" class="img-thumbnail rounded d-block" style="max-height: 100px; max-width: 100px;" alt="Check out permissions">';
    unset($item['imageURL']);
});

/**
 * Data retrieval - Done (GG)
 */

?> 

<?php
/**
 * Webpage creation
 */
$title = $section['designation'] . ' Students';

$table_fields = $StuRepo->tableColumns();
?> 

<?php require __DIR__ . "/fragments/head.php"; ?>
<body>

    <?php require __DIR__ . "/fragments/navbar.php"; ?>
    <!-- Titles -->
    <div class="container">
        <br>
        <h1>
            <?= htmlspecialchars($title); ?>
        </h1>
        <h4>
            <?= htmlspecialchars($section['description']); ?>
        </h4>
        <br>

    </div>
    <!-- GET Messages -->
    <?php include "./fragments/getResponse.php"?>
    <!-- Table -->
    <div class="container">
        <table id="table" class="display">
            <thead>
                <tr>
                    <?php foreach ($table_fields as $atom): ?>
                        <th><?= ucfirst(htmlspecialchars($atom)) ?></th>
                    <?php endforeach; ?>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $row): ?>
                    <tr>
                        <?php foreach ($row as $atom): ?>
                            <td><?= $atom ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="detailEtudiant.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-circle-info btn"></i></a>
                            <?php if ($isAdmin) :?>
                            <!-- WARNING : only for admin -->
                            <a href="updateEtudiant.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen btn"></i></a>
                            <a href="deleteEtudiant.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-trash btn"></i></a>
                            <?php endif?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </script>
        <?php include "./fragments/tablePlugin.php" ?>
    </div>
</body>
<?php require __DIR__ . "/fragments/footer.php"; ?>