<?php
$pageTitle = 'Add Admin';
require_once('header.php');
?>
<?php
 if (!empty($_SESSION['email'])){

if(!empty($_GET['errorMessage']))
    echo '<div class="alert alert-danger" id="message">Email already exist</div>';
else
{
    echo '<div class="alert alert-info" id="message">Add User Information</div>';
}
?>
<h1>User Information</h1>
<form method="post" action="signupregister.php">
    <img class="dog1" src="635934218338281181541543925_movie-night-clipart-9cp4q9xcE.jpeg.jpg" style="float: left; margin-left: 950px;
    width: 500px; position: absolute;
    height:400px;">        <fieldset class="form-group">
        <label  for="fname" class="col-md-1">Name:</label>

        <input name="fname" id="fname" class="col-md-2"  required placeholder="First Name" style="margin-right:10px;"/>

        <input name="lname" id="lname" class="col-md-2 "  required placeholder="Last Name" />
    </fieldset >

    <fieldset class="form-group">
        <label id="email" class="col-sm-1" for="email">Email:</label>
        <input name="email" id="email" class="col-sm-4" type="email" required placeholder="email" />
    </fieldset>

    <fieldset class="form-group">
        <label class="col-sm-1" for="password">Password:</label>
        <input name="password" id="password" type="password" class="col-sm-4" required placeholder="Password" />
    </fieldset>

    <fieldset class="form-group">
        <label class="col-sm-1" for="confirm">Password:</label>
        <input name="confirm" id="confirm" type="password" class="col-sm-4" required placeholder="confirm password" />
    </fieldset>

    <fieldset class="form-group">
        <label  for="month" class="col-md-1">Date:</label>
        <select name="month" id="month" class="col-md-1" style="margin-right:10px;">
            <?php
            //Step 1 - connect to the DB
            $conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Step 2 - create the SQL statement
            $sql = "SELECT * FROM months";
            //Step 3 - prepare & execute the SQL statement
            $cmd = $conn->prepare($sql);
            try {

                $cmd->execute();
                //step 4 store in variable
                $months = $cmd->fetchAll();
                //Step 5 - loop and display
                foreach ($months as $month) {
                    echo '<option>' . $month['month'] . '</option>';
                }
                //Step 5 - disconnect from the DB
                $conn = null;
            }
            catch (Exception $e)
            {
                // use the built-in PHP function to send email

                mail('abhis5032@gmail.com','problem with database','there is some problem with the database');
                echo 'there is a problem we will fix it soon';
            }

            ?>
        </select>

        <input name="Day" id="Day" class="col-md-1"  required placeholder="Day" style="margin-right:10px;" />

        <input name="year" id="year" class="col-md-1 "  required placeholder="Year" />
    </fieldset >


    <fieldset class="form-group">
        <label  for="username" class="col-sm-1">UserName:</label>
        <input name="username" id="username" required placeholder="UserName" />
    </fieldset >

    <fieldset class="form-group ">
        <label  for="gender" class="col-sm-1">Gender</label>

        <label class="radio-inline">
            <input type="radio" id="gender" value="Male" name="gender">Male
        </label>
        <label class="radio-inline">
            <input type="radio" id="gender" value="Female" name="gender">Female
        </label>
        <label class="radio-inline">
            <input type="radio" id="gender" value="Others" name="gender">Others
        </label>
    </fieldset >

    <fieldset class="form-group">
        <label  for="mobile" class="col-sm-1">Mobile NO:</label>
        <input name="mobile" id="mobile" class="col-md-2" type="number" min="9000000000" max="9999999999" required placeholder="mobile number" />
    </fieldset >


    <button class="btn btn-success ">Add User</button>
</form>

</main>
<?php } ?>
<?php require_once('fotter.php') ?>
