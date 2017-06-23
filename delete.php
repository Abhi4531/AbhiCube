<?php
//Step 1 - connect to the DB
$conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');

//Step 2 - Create SQL query
$sql = "DELETE FROM registration WHERE email = :email";

//Step 3 - prepare & execute the SQL
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $_GET['email'], PDO::PARAM_INT);
$cmd->execute();

//Step 4 - disconnect from the DB
$conn=null;

//Step 5 - redirect to the albums.php page
header('location:Administrator.php');
?>