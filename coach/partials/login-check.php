<?php
require '../config/constants.php';

session_start();

if (!isset($_SESSION['coach'])) {
    header("Location: login.php");
}
?>