<?php
session_start();
include 'php/config.php';

if (isset($_POST["login"])) {
    $user_name = $_POST["user_name"];
    $user_department = $_POST["user_department"];

    $user = DB::getRow('SELECT * FROM users WHERE user_name = ? AND user_department = ?', array($user_name, $user_department));


    print_r($user);

    if (!empty($user)) {
        $_SESSION["user_name"] = $user->user_name;
        $_SESSION["user_department"] = $user->user_department;
        $_SESSION["user_phone_number"] = $user->user_phone_number;
        $_SESSION["user_id"] = $user->user_id;
        header("location:login_success.php");
    }
}

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
    if (isset($message)) {
        echo '<label class="text-danger">' . $message . '</label>';
    }
    ?>
    <h3 align="">Log in</h3><br/>
    <form method="post">
        <label>Username</label>
        <input type="text" name="user_name" class="form-control"/>
        <br/>
        <label>User Department</label>
        <input type="password" name="user_department" class="form-control"/>
        <br/>
        <input type="submit" name="login" class="btn btn-info" value="Login"/>
    </form>
</div>
<br/>
</body>
</html>