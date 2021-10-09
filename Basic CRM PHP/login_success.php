<?php
session_start();
include 'php/config.php';

$classes = DB::get('SELECT c.class_code, class_name, u.user_id
    FROM user_classes
JOIN class c on c.class_code = user_classes.class_code
JOIN users u on u.user_id = user_classes.user_id
WHERE u.user_id=?', array($_SESSION["user_id"]));

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container" style="width:500px;">

    <?php
    if (isset($_SESSION["user_id"])) {


        echo '<h3>Login Success, Welcome   ' . $_SESSION["user_name"], "<h3>from<h3/>", $_SESSION["user_department"];
        echo '<br /><br /> <a href="lead_page.php">Lead Page</a> <br /><br />  <br /><br /><br /><br /><a href="logout.php">Logout</a>';
        echo '<br> <br> Edit your <a href="user_edit.php>"</a> User information';
    } else {
        header("location:index.php");
    }
    ?>

</div>
<br/>
</body>
</html>
