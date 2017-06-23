<?php
$pageTitle = 'Registration';
require_once('header.php');
?>

<main class="container">
    <?php
if (!empty($_SESSION['email'])){

    //step 1 - connect to the database
    $conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //step 2 - create a SQL command
    $sql = "SELECT * FROM registration";

    //step 3 - prepare the SQL command
    $cmd = $conn->prepare($sql);

  try{  //step 4 - execute and store the results
    $cmd->execute();
    $registration = $cmd->fetchAll();

    //step 5 - disconnect from the DB
    $conn = null;

        //create a table and display the results
        echo '<h1>Users list </h1>
        <table class="table table-striped table-hover">
            <tr><th>Name</th>
                <th>Username</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>';

        echo '</tr>';

        foreach($registration as $registration)
        {
            echo '<tr><td>'.$registration['fname']. $registration['lname'].'</td>
                      <td>'.$registration['username'].'</td>
                      <td>'.$registration['mobile'].'</td>
                      <td>'.$registration['gender'].'</td>
                      <td>'.$registration['email'].'</td> 
                      <td><a href="Edit.php?email='.$registration['email'].'" 
                class="btn btn-primary" >Edit</a></td>
                    <td><a href="delete.php?email='.$registration['email'].'" 
                                class="btn btn-danger confirmation" >Delete</a></td>';

        }
        echo '</tr>';


        echo '</table></main>';
    }

  catch (Exception $e)
  {
      // use the built-in PHP function to send email

      mail('abhis5032@gmail.com','problem with database','there is some problem with the database');
      echo 'there is a problem we will fix it soon';
  }


    ?>
</main>
  <?php }  ?>
<?php require_once('fotter.php') ?>