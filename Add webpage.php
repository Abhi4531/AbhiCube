
    <?php
$pageTitle = 'Registration';
require_once('header.php');
      if (!empty($_SESSION['email'])){

        ?>
<main class="main" style="margin-top: 100px">

<form class="container" method="post" action="savepage.php">
    <fieldset class="form-group">
        <label class="col-sm-2 input-sm" for="title" >Title</label>
        <input class="col-sm-2 input-sm" type="text" name="title" >
    </fieldset>
    <fieldset class="form-group">
        <label class="col-sm-2 input-sm" for="content" >Content</label>
        <textarea  class="form-control" rows="5" name="content"></textarea>
    </fieldset>
    <fieldset class="form-group">
    <button type="submit">Save</button>
    </fieldset>
</form>
</main>

<?php } ?>
<?php require_once('fotter.php') ?>

