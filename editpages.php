<?php

$pageTitle = 'Edit PAGES';
require_once('header.php');
?>
<main>

    <?php
    if (!empty($_SESSION['email'])) {

        // step 1 - connect to database
        $conn = new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // step 2 - create a sql command
        $sql = "select * from pages";

        // step 3 - prep the command and bind the parameters to avoid SQL injections
        $cmd = $conn->prepare($sql);
        $cmd->execute();

        // step 4 - store the rsults in a variable
        $pages = $cmd->fetchAll();

        // step 5 - close the DB connection
        $conn = null;

        // step 6 - display the results in a table
        echo '<table class="table table-bordered"><th>ID</th>
                                         <th>Title</th>
                                         <th>Content</th>
                                         <th>Edit</th> 
                                         <th>Delete</th></tr>';

        foreach ($pages as $page) {
            echo '<tr><td> ' . $page['id'] . '</td>
                                      <td >' . $page['title'] . '</td>
                                      <td >' . $page['content'] . '</td>
                                      <td ><a href="pageedit.php?id=' . $page['id'] . '"class="btn btn-primary">Edit</a></td>
                                      <td ><a href="deletepage.php?id=' . $page['id'] . '" class="btn btn-danger confirmation">Delete</a> </td>
                                      </tr>';
        }
    } ?>

</main>
<?php require_once('fotter.php') ?>
