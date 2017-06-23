<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$username=$_POST['username'];
$confirm=$_POST['confirm'];
$password=$_POST['password'];
$email=$_POST['email'];
$month=$_POST['month'];
$Day=$_POST['Day'];
$year=$_POST['year'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$ok = true;

//check if the passwords match
if ($password != $confirm)
{
    echo 'The passwords do not match <br />';
    $ok = false;
}

if (strlen($password) < 8)
{
    echo 'The password is too short, must be 8 or more characters
                        <br />';
    $ok = false;
}

if (empty($email))
{
    echo 'You must enter an email address <br />';
    $ok = false;
}


//if the email and password are ok
if ($ok)
{


    //step 1 - connect to the database
    $conn = new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //step2 create the sql querry
    $sql = "Insert into registration values(:fname,:lname,:email,:password,:month,:Day,:year,:username,:gender,:mobile)";
    //step2.5- hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //prepare and execute sql
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':fname', $fname, PDO::PARAM_STR, 60);
    $cmd->bindParam(':lname', $lname, PDO::PARAM_STR, 60);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 255);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 60);
    $cmd->bindParam(':month', $month, PDO::PARAM_STR, 30);
    $cmd->bindParam(':year', $year, PDO::PARAM_INT);
    $cmd->bindParam(':Day', $Day, PDO::PARAM_INT);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 20);
    $cmd->bindParam(':gender', $gender, PDO::PARAM_STR, 20);
    $cmd->bindParam(':mobile', $mobile, PDO::PARAM_INT);


    try{
        $cmd->execute();
        $conn = null;
        header('location:login.php');
    }
    catch (Exception $e)
    {
        if (strpos($e->getMessage(),
                'Integrity constraint violation: 1062') == true){
            header('location:signup.php?errorMessage=email-already-exists');
        }
    }

    //Step 4 - disconnect from the DB


    //Step 5 - redirect to the login page
}

?>

