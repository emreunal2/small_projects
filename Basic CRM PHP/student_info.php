<?php
session_start();
include 'php/config.php';

$students = DB::get('SELECT *
FROM student
WHERE student_id=?', array($_GET["student_id"]));

$notes = DB::get('SELECT *
FROM notes
WHERE student_id=?', array($_GET["student_id"]));

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
        echo '<br><br /> <br><br />';

        foreach ($students as $student) {
            echo 'Name: ' . $student->student_name, '<br><br />';
            echo 'Mail: ' . $student->student_mail, '<br><br />';
            echo 'Phone Number: ' . $student->student_phone_number, '<br><br />';
            echo 'Is Registered: ' . $student->student_type, '<a href="register_mail.php?student_id=' . $_GET["student_id"] . '"> Send Register Mail</a><br>';
            echo 'Is Talked: ' . $student->student_is_talked,'<a href="info_mail.php?student_id=' . $_GET["student_id"] . '"> Send Info Mail </a>', '<br><br />';
            echo 'Submit Time: ' . $student->created_at, '<br><br />';
        }
        echo '<br><br><br><br>', 'NOTES:', '<br><br>';

        foreach ($notes as $note) {
            echo 'Note: ' . $note->note_description, '<br><br>';
            echo '--------------------------------------------- <br>';
        }
        echo '<a href="new_note.php?student_id=' . $student->student_id . '">Add new note </a>';
        echo '<br><br/><br><br/><br><br/><br><br/><a href="lead_page.php"> Return Back</a>';
        echo ' <br><a href="logout.php">Logout </a>';
    }
    else {
        header("location:index.php");
    }
    ?>
</div>
<br/>
</body>
</html>