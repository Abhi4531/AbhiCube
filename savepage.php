
<?php

$title = $_POST['title'];
$content = $_POST['content'];
$ok = true;

if (empty($title)){
    echo 'title cannot be empty <br />';
    $ok = false;
}


//if it looks like an ok user, save to the DB
if($ok)
    // step 1 - connect to database
{
    $conn =  new PDO("mysql:host=aws.computerstudi.es;dbname=gc200356101", 'gc200356101', 'DzCwN7okTG');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // step 2 - create a sql command
    $sql = "insert into pages(title, content) values(:title, :content)";

    // step 3 - prep the command and bind the parameters to avoid SQL injections
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
    $cmd->bindParam(':content', $content,PDO::PARAM_STR);

    $cmd->execute();
    $conn = null;
    header('location:login.php');


}
?>

