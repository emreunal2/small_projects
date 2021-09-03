<?php
session_start();
include 'php/config.php';
$students = DB::get('SELECT * from student ORDER BY created_at DESC');

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
    foreach ($students as $student) {
        echo '<br><br />' . $student->student_name, ' ' . $student->student_mail,
            '<a href="student_info.php?student_id=' . $student->student_id . '"> Details</a>';
    }
    }
    else {
        header("location:index.php");
    }
    ?>

    <?php
    echo ' <br><br/><br><br/><br><br/><br><br/><a href="logout.php">Logout</a>';
    ?>
</div>
<br/>
</body>
</html>