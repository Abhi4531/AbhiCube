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
$mobile=$_POST['mobile'];
$ok = true;


//check if the passwords match



//if the email and password are ok
if ($ok)
{
    if (!empty($email))
    {
        //step 1 - connect to the database
        $conn = new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //step2 create the sql querry
        if(empty($password)) {
            $sql = "UPDATE registration
                SET fname = :fname, lname = :lname,month = :month,year = :year,Day = :Day, username=:username,mobile=:mobile 
                WHERE email = :email";
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':fname', $fname, PDO::PARAM_STR, 60);
            $cmd->bindParam(':lname', $lname, PDO::PARAM_STR, 60);
            $cmd->bindParam(':email', $email, PDO::PARAM_STR, 255);
            $cmd->bindParam(':month', $month, PDO::PARAM_STR, 30);
            $cmd->bindParam(':year', $year, PDO::PARAM_INT);
            $cmd->bindParam(':Day', $Day, PDO::PARAM_INT);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 20);
            $cmd->bindParam(':mobile', $mobile, PDO::PARAM_INT);

        }
        else {
            $sql = "UPDATE registration
                SET fname = :fname, lname = :lname, password = :password,month = :month,year = :year,Day = :Day, username=:username,mobile=:mobile 
                WHERE email = :email";


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
            $cmd->bindParam(':mobile', $mobile, PDO::PARAM_INT);
        }
        try{
            $cmd->execute();
            $conn = null;
            header('location:Administrator.php');
        }

        catch (Exception $e)
        {
            // use the built-in PHP function to send email

            mail('abhis5032@gmail.com','problem with database','there is some problem with the database');
            echo 'there is a problem we will fix it soon';
        }
    }

    //Step 4 - disconnect from the DB


    //Step 5 - redirect to the login page
}

?>

