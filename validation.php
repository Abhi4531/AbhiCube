
<?php
$email=$_POST['email'];
$password=$_POST['password'];

//step 1 - connect to the database
$conn = new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
//step 2 - create a SQL command
$sql = "select * from registration where email=:email";
//step 3 - bind the parameter andexecute
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);

$cmd->execute();
$register = $cmd->fetch();

//step4- validate the user
if(password_verify($password,$register['password'])){
    // excelent we have a valid password
    session_start();

    $_SESSION['email']=$register['email'];
    $_SESSION['username']= $register['username'];
    header('location:Administrator.php');
}
else{
    //user was not found or did not have a valid password
    header('location:loginpage.php?invalid=true');
    exit();

}

//Step 5 - disconnect from the DB
$conn=null;

?>
