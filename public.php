<?php
$title=$_GET['title'];
$pageTitle = $_GET['title'];
require_once('header.php');
?>
<main>

    <?php

    // step 1 - connect to database
$conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // step 2 - create a sql command
    $sql ="select * from pages where title=:title";


    // step 3 - prep the command and bind the parameters to avoid SQL injections
    $cmd = $conn->prepare($sql);
$cmd->bindParam(':title', $pageTitle, PDO::PARAM_STR, 60);

$cmd->execute();

    // step 4 - store the rsults in a variable
    $pages = $cmd->fetch();


echo '<h1>'.$pages["title"].'</h1>';
echo '<p>' .$pages["content"].'</p>';
    $conn = null;



 ?>
    <?php require_once('fotter.php') ?>

