<?php if (isset($_GET['errorMsg'])) { ?>
    <div class="container alert alert-danger">
        <?= $_GET['errorMsg'] ?>.
    </div>
<?php } ?>

<?php if (isset($_GET['successMsg'])) { ?>
    <div class="container alert alert-success">
        <?= $_GET['successMsg'] ?>.
    </div>
<?php } ?>