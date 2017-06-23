

<?php
$pageTitle = 'Logo Change';
require_once('header.php');
?>
<?php if (!empty($_SESSION['email'])){
echo'
<form method="post" action="savelogo.php" enctype="multipart/form-data">
   <h1>LOGO</h1>
<img src="geometric-cube-abstract-logo-by-Vexels.svg" width="500px" height="500px"/><br><br>
    <fieldset class="form-group">
        <label for="logoFile" class="col-sm-2">logo Image</label>
        <input name="logoFile" id="coverFile" type="file"/>
    </fieldset>
    <button class="btn btn-success col-sm-offset-2">Save</button>
</form>';
}
?>

