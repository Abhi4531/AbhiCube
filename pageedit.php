<?php
$pageTitle = 'Registration';
require_once('header.php');
?>
<?php

// step 1 - connect to database
$conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//Step 2 - Create SQL query
$sql = "Select * from pages WHERE  id= :id";

//Step 3 - prepare & execute the SQL
$cmd = $conn->prepare($sql);
$cmd->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$cmd->execute();

// step 4 - store the reults in a variable
$pages = $cmd->fetchAll();
$title=$pages['title'];
echo $title;
$content=$pages['content'];
$conn = null;

?>
<form class="container" method="post" action="savepage.php">
    <fieldset class="form-group">
        <label class="col-sm-2 input-sm" for="title" >Title</label>
        <input class="col-sm-2 input-sm" type="text" name="title" value="<?php echo $title?>"  >
    </fieldset>
    <fieldset class="form-group">
        <label class="col-sm-2 input-sm" for="content" >Content</label>
        <textarea  class="form-control" rows="5" name="content" value="<?php echo $content?>" ></textarea>
    </fieldset>
    <fieldset class="form-group">
        <button type="submit">Save</button>
    </fieldset>
</form>


<?php require_once('fotter.php') ?>
