<?php
session_start();
include 'php/config.php';

if (isset($_POST["Submit"])) {
    $student_name = $_POST["student_name"];
    $student_mail = $_POST["student_mail"];
    $student_phone_number = $_POST["student_phone_number"];

    if (!empty($student_name) || !empty($student_mail) || !empty($student_phone_number)) {

        $insert = DB::insert('INSERT INTO student
(student_name, student_mail, student_phone_number, student_type, student_is_talked)
VALUES (?,?,?,?,?)', array($student_name, $student_mail, $student_phone_number, 'Lead', 'No'));
    }

    header("Location: index.php");
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
    <h3 align="">Contact Us</h3><br/>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Name</label>
        <input type="text" name="student_name" class="form-control" required autofocus/>
        <br/>
        <label>Mail</label>
        <input type="email" name="student_mail" class="form-control" required/>
        <br/>
        <label>Phone Number</label>
        <input type="number" name="student_phone_number" class="form-control" required/>
        <br/>
        <input type="submit" name="Submit" class="btn btn-info" value="Submit"/>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php
        echo ' <br><a href="user_login.php">User Login </a>';
        ?>
    </form>
</div>
<br/>
</body>
</html>