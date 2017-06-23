<?php
$pageTitle = 'login';
require_once('header.php');
?>


<?php
if (!empty($_GET['invalid']))
    echo '<div class="alert alert-danger" id="message">Either email or password was incorrect</div>';
else
    echo '<div class="alert alert-info" id="message">Please log into your account</div>';
?>

<h1>Login</h1>
<img class="dog1" src="635934218338281181541543925_movie-night-clipart-9cp4q9xcE.jpeg.jpg" style="float: left; margin-left: 950px;
    width: 500px; position: absolute;
    height:450px;">
<form method="post" action="validation.php" >
    <fieldset class="form-group">
        <label id="email" class="col-sm-1" for="email">Email:</label>
        <input name="email" id="email" class="col-sm-4" type="email" required placeholder="email" />
    </fieldset>

    <fieldset class="form-group">
        <label class="col-sm-1" for="password">Password:</label>
        <input name="password" id="password" type="password" class="col-sm-4" required placeholder="Password" />
    </fieldset>

    <fieldset class="form-group col-sm-offset-1">
        <button type="submit" class="btn btn-success  "> Login</button>
        <p><A href="signup.php">Create Account</A> / <a href="forget.php">Forget password</a></p></form>

</fieldset>
</form>
<?php require_once('fotter.php') ?>