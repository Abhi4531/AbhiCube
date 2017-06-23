<?php
$pageTitle = 'Registration';
require('header.php');
?>


<main>
    <?php
    if(!empty($_GET['errorMessage']))
        echo '<div class="alert alert-danger" id="message">Email already exist</div>';
    else
    {
        echo '<div class="alert alert-info" id="message">Add User Information</div>';
    }?>

    <h1>User Information</h1>
    <img class="dog1" src="635934218338281181541543925_movie-night-clipart-9cp4q9xcE.jpeg.jpg" style="float: left; margin-left: 950px;
    width: 500px; position: absolute;
    height:450px;">
    <form method="post" action="Saveregistration.php">

        <fieldset class="form-group">
            <label  for="fname" class="col-md-1">Name:</label>

            <input name="fname" id="fname" class="col-sm-2 input-sm"  required placeholder="First Name" style="margin-right:10px;" width="22px"/>

            <input name="lname" id="lname" class="col-sm-2 input-sm"  required placeholder="Last Name" />
        </fieldset >

        <fieldset class="form-group">
            <label id="email" class="col-sm-1" for="email">Email:</label>
            <input name="email" id="email" class="col-sm-4 input-sm" type="email" required placeholder="email" />
        </fieldset>

        <fieldset class="form-group">
            <label class="col-sm-1" for="password">Password:</label>
            <input name="password" id="password" type="password" class="col-sm-4 input-sm" required placeholder="Password" />
        </fieldset>

        <fieldset class="form-group">
            <label class="col-sm-1" for="confirm">Password:</label>
            <input name="confirm" id="confirm" type="password" class="col-sm-4 input-sm" required placeholder="confirm password" />
        </fieldset>

        <fieldset class="form-group">
            <label  for="month" class="col-sm-1">Date:</label>
            <select name="month" id="month" class="col-md-1 input-sm" style="margin-right:10px;">
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

            <input name="Day" id="Day" class="col-md-1 input-sm col-sm"  required placeholder="Day" style="margin-right:10px;" />

            <input name="year" id="year" class="col-md-1 input-sm col-sm"  required placeholder="Year" />
        </fieldset >


        <fieldset class="form-group">
            <label  for="username" class="col-sm-1">UserName:</label>
            <input name="username" id="username" class="col-md-1 input-sm" required placeholder="UserName" />
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
            <input name="mobile" id="mobile" class="col-md-2 input-sm" type="number" min="9000000000" max="9999999999" required placeholder="mobile number" />
        </fieldset >


        <button class="btn btn-success ">Register</button>
    </form>

</main>

<?php require_once('fotter.php') ?>