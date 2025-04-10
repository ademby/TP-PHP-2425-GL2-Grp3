<?php
$title = "INSAT SMS";
?>

<?php require __DIR__ . "/fragments/head.php"; ?>

<body class="index">

  <?php require __DIR__ . "/fragments/navbar.php"; ?>

  <div class="wrapper">
    <div class="hero">
      <div class="row">
        <div class="large-12 columns">
          <h1><img src="/dashboard/images/xampp-logo.svg" />SMS <span>Student Management System</span></h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <h2>Welcome to SMS 1.0</h2>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <p>
          <b>The</b> solution to all your management problems.
        </p>
        <p>
          <br>
          He have set things up for you, just follow this link :
          <a href="./db_init.php"> Initialize Database</a>
          <br><br>
          (It will create a database, add the required tables and insert data.)
          <br>
          Consider reinitializing the database if you have deleted a lot of data.
        </p>
        <?php if (isset($_GET['init'])) { ?>
          <div class="container alert alert-success">
              Successfully initializing the database. Does it work ? Don't touch it... No no no, touch it, touch it... just kidding.
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</body>

<?php require __DIR__ . "/fragments/footer.php"; ?>