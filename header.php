<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="style.css" />
</head>


<body>
<header>
    <h1 class="side" style="width: 50%"><a href="abhicube.com"><img class="logo11" src="geometric-cube-abstract-logo-by-Vexels.svg" height="100px" width="100px" / >AbhiCube</a></h1>
    <nav class="nav navbar-inverse">
        <ul class="nav navbar-nav">
          <?php  if (empty($_SESSION['email'])) {
?>
                    <!--creates a page from the database and make it a hyperlink-->
                    <?php


                        //connect to the database
                        $conn = new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //create a SQL command
                        $sql = "SELECT * FROM pages";
                        //prepare the SQL command
                        $cmd = $conn->prepare($sql);
                        //execute and store the results
                        $cmd->execute();
                        $pages = $cmd->fetchAll();
                        //disconnect
                        $conn = null;
                        //create a hyperlink from the database
                        foreach ($pages as $page) {
                            echo "<li class='nav-item' ><a href='public.php?title=" . $page['title'] . "'>" . $page["title"] . "</li></a>";

                        }
                    }
                    ?>

                    <?php
                    session_start();
                    if (empty($_SESSION['email']))
                    {
                        echo '<li class="nav-item"><a href="Register.php">Register</a></li>
                              <li class="nav-item"><a href="login.php">Login</a></li>';
                    }
                    //private / logged in links
                    else
                    {

                        echo '<li class="nav-item"><a href="Add%20webpage.php">ADD WEB PAGE</a> </li>
                           <li class="nav-item"><a href="editpages.php">EDIT WEB PAGE</a></li>
                           <li class="nav-item"> <a href="Administrator.php">USERS</a> </li>
                           <li class="nav-item"><a href="adduser.php" >ADD USER</a> </li>
                           <li class="nav-item"><a href="logout.php">Public view</a></li>';
                    }
                    ?>
                </ul>
        </nav>

</header>