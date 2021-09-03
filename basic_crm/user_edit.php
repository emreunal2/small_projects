<?php
session_start();
include 'php/config.php';

if (isset($_SESSION["user_id"])) {

} else {
    header("location:index.php");
}
