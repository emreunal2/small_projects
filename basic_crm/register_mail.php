<?php
session_start();
include 'php/config.php';

if (isset($_SESSION["user_id"])) {
    $update = DB::exec('UPDATE student SET student_type = ? WHERE student_id = ?', array('Student', $_GET["student_id"]));

    echo 'Register Mail sended return back';
    echo '<br><br/><br><br/><br><br/><br><br/><a href="student_info.php?student_id=' . $_GET["student_id"] . '"> Student Info</a>';
    echo '<br/> <a href="lead_page.php">Lead Page</a> <br /><a href="logout.php">Logout</a>';
} else {
    header("location:index.php");
}
