<?php
session_start();
include 'php/config.php';
if (isset($_POST["Submit"])) {
    $new_note = $_POST["new_note"];


    if (!empty($new_note)) {

        $insert = DB::insert('INSERT INTO notes (note_description, student_id) VALUES (?,?)', array($new_note, $_GET["student_id"]));
    }

    header("Location: lead_page.php");
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
    <h3 align="">New Note</h3><br/>
    <form method="post">
        <input type="text" name="new_note" class="form-control" required autofocus/>
        <br/>
        <input type="submit" name="Submit" class="btn btn-info" value="Submit"/>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php
        echo '<br><br/><br><br/><br><br/><br><br/><a href="student_info.php?student_id=' . $_GET["student_id"] . '"> Return Back</a>';
        echo ' <br><a href="logout.php">Logout </a>';
        ?>
    </form>
</div>
<br/>
</body>
</html>
