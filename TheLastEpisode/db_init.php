<?php require_once __DIR__ . "/core/autoLoader.php"; ?> 

<?php
/**
 * To set up the database we need for this exercice,
 * make sure to have XAMPP working correctly (including phpMyAdmin).
 * The only step :
 * - Open this URL only once : localhost/db_init.php
 */

/**
 * Modify these only if you know what you're doing.
 */
$host = 'localhost';
$username = 'root';
$password = '';

/**
 * Data to be inserted in the eventual database, feel free to add what u want
 */
try{

$sections = [
    new Section('GL' , 'Genie Logiciel'),
    new Section('RT' , 'Reseau Telecommunication'),
    new Section('IIA', 'Informatique Industrielle et Automatique'),
    new Section('IMI', 'Instrumentation et Maintenance Industrielle'),
    new Section('BIO', 'Biologie Industrielle'),
    new Section('CH' , 'Chimie Industrielle'),
    new Section('MPI', 'Mathematique-Physique-Informatiques'),
    new Section('CBA', 'Chime-Biologie-Appliquees'),
    new Section('CS' , 'Computer Science'),
    new Section('DS' , 'Data Science'),
    new Section('MIQ', 'Metrologie et Ingenierie de la Qualite')
];

$students = [
    new Student("Italo"  , new DateTime("05-05-2005"), 'images/italo.jpg'  , 'GL' ),
    new Student("Jeffrey", new DateTime("04-04-2004"), 'images/jeffrey.jpg', 'RT' ),
    new Student("Justin" , new DateTime("03-03-2003"), 'images/justin.jpg' , 'IMI'),
    new Student("Olly"   , new DateTime("02-02-2002"), 'images/olly.jpg'   , 'GL' ),
    new Student("Elizeu" , new DateTime("02-02-2002"), 'images/elizeu.jpg' , 'GL' ),
    new Student("Midas"  , new DateTime("02-02-2002"), 'images/midas.jpg'  , 'RT' ),
    new Student("Saung"  , new DateTime("02-02-2002"), 'images/saung.jpg'   , 'RT' ),
];

$users = [
    new User("admin","admin@insat.tn","0000","admin"),
    new User("user","user@insat.tn","1111","user")
];

    echo "HI<br>";
    $cnx = new PDO("mysql:host=$host;charset=utf8",$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
    echo "Connected to the MySQLServer<br>";

    $dbName = "insat_db";

    $cnx->exec("CREATE DATABASE IF NOT EXISTS `$dbName`");
    echo "Created the `$dbName` database<br>";

    $cnx->exec("USE `$dbName`");
    echo "Using the `$dbName` database<br>";

    $dropTableSection =    "DROP TABLE IF EXISTS `section`";

    $dropTableStudent =    "DROP TABLE IF EXISTS `student`";

    $dropTableUser =    "DROP TABLE IF EXISTS `user`";

    $createTableSection =
    "CREATE TABLE IF NOT EXISTS `section` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `designation` VARCHAR(10) NOT NULL,
        `description` VARCHAR(100) NOT NULL,
        UNIQUE KEY `unique_designation` (`designation`)
    )";

    $createTableStudent =
    "CREATE TABLE IF NOT EXISTS `student` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(30) NOT NULL,
        `birthday` DATE NOT NULL,
        `imageURL` VARCHAR(100) NOT NULL, 
        `section` VARCHAR(10) NOT NULL,
        CONSTRAINT `fk_student_section` FOREIGN KEY (`section`) REFERENCES `section` (`designation`) ON UPDATE CASCADE ON DELETE RESTRICT
    )";

    $createTableUser =
    "CREATE TABLE IF NOT EXISTS `user` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(30) NOT NULL UNIQUE,
        `email` VARCHAR(30) NOT NULL UNIQUE,
        `password` VARCHAR(30) NOT NULL,
        `role` VARCHAR(30) NOT NULL
    )";

    $cnx->exec($dropTableStudent);
    $cnx->exec($dropTableSection);
    $cnx->exec($dropTableUser);

    $cnx->exec($createTableSection);
    echo "Created the `section` Table<br>";
    $cnx->exec($createTableStudent);
    echo "Created the `student` Table<br>";
    $cnx->exec($createTableUser);
    echo "Created the `user` Table<br>";

    ///Here the inserts
    $sectionQuery = $cnx->prepare("INSERT INTO `section` (`designation`, `description`) VALUES (?, ?)");
    foreach ($sections as $s) {
        $sectionQuery->execute([$s->designation, $s->description]);
    }

    $studentQuery = $cnx->prepare("INSERT INTO student (name, birthday, imageURL, section) VALUES (?, ?, ?, ?)");
    foreach ($students as $s) {
        $studentQuery->execute([$s->name, $s->birthday->format('Y-m-d'), $s->imageURL, $s->section]);
    }

    $userQuery = $cnx->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
    foreach ($users as $s) {
        $userQuery->execute([$s->username, $s->email, $s->password, $s->role]);
    }
    //exit; //uncomment if you wanna see 
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

header("Location:index.php?init=true");

?>