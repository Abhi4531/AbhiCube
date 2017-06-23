<?php
$pageTitle = 'Registration';
require_once('header.php');
?>

<main>
    <?php
    if (!empty($_GET['email'])) {
        $email = $_GET['email'];

    }else
    {

    }

    //to decide if the album is an edit, we look at the albumID
    if (!empty($email))
    {
        //Step 1 connect to the DB
        $conn = new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Step 2 create the SQL query
        $sql = "SELECT * FROM registration WHERE email = :email";

        //Step 3 prepare and execute the SQL
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR,255);

        //Step 4 update the variables
        $cmd->execute();

        $registration = $cmd->fetch();
        $email=$registration['email'];
        $fname=$registration['fname'];
        $lname=$registration['lname'];
        $Day = $registration['Day'];
        $username=$registration['username'];
        $mobile=$registration['mobile'];
        $month=$registration['month'];
        $year=$registration['year'];

        //Step 5 close the DB connection
        $conn=null;
    }
    ?>


    <h1>Edit User</h1>
    <img class="dog1" src="635934218338281181541543925_movie-night-clipart-9cp4q9xcE.jpeg.jpg" style="float: left; margin-left: 950px;
    width: 500px; position: absolute;
    height:450px;">
    <form method="post" action="editpage.php">

        <fieldset class="form-group">
            <label  for="fname" class="col-md-1">Name:</label>

            <input name="fname" id="fname" class="col-sm-2 input-sm" value="<?php echo $fname?>"  required placeholder="First Name" />
            <input name="lname" id="lname" class="col-sm-2 input-sm" value="<?php echo $lname?>" required placeholder="Last Name" />
        </fieldset >


        <input name="email" id="email" class="col-sm-4 input-sm" type="hidden"   value="<?php echo $email?>" />

        <fieldset class="form-group">
            <label class="col-sm-1" for="password">Password:</label>
            <input name="password" id="password" type="password" class="col-sm-4 input-sm"  placeholder="Password" />
        </fieldset>

        <fieldset class="form-group">
            <label class="col-sm-1" for="confirm">Password:</label>
            <input name="confirm" id="confirm" type="password" class="col-sm-4 input-sm"placeholder="confirm password" />
        </fieldset>

        <fieldset class="form-group">
            <label  for="month" class="col-sm-1">Date:</label>
            <select name="month" id="month" value="<?php echo $month?>" class="col-md-1 input-sm" style="margin-right:10px;">
                <?php
                //Step 1 - connect to the DB
                $conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Step 2 - create the SQL statement
                $sql = "SELECT * FROM months";
                //Step 3 - prepare & execute the SQL statement
                $cmd = $conn->prepare($sql);
                $cmd->execute();
                //step 4 store in variable
                $months = $cmd->fetchAll();
                //Step 5 - loop and display
                foreach ($months as $month)
                {      echo '<option>'.$month['month'].'</option>';
                }
                //Step 5 - disconnect from the DB
                $conn = null;
                ?>
            </select>

            <input name="Day" id="Day" class="col-md-1 input-sm col-sm"  value="<?php echo $Day?>" required placeholder="Day" style="margin-right:10px;" />

            <input name="year" id="year" class="col-md-1 input-sm col-sm" value="<?php echo $year ?>"  required placeholder="Year" />
        </fieldset >


        <fieldset class="form-group">
            <label  for="username" class="col-sm-1">UserName:</label>
            <input name="username" id="username" value="<?php echo $username?>" class="col-md-1 input-sm" required placeholder="UserName" />
        </fieldset >



        <fieldset class="form-group">
            <label  for="mobile" class="col-sm-1">Mobile NO:</label>
            <input name="mobile" id="mobile" value="<?php echo $mobile?>" class="col-md-2 input-sm " type="number"  required placeholder="mobile number" />
        </fieldset >


        <button class="btn btn-success ">Register</button>
    </form>

</main>
<?php require_once('fotter.php') ?>
