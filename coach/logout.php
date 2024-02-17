<?php 
// session_start();

// session_unset();
// session_destroy();

// header("Location: index.php");

require '../config/constants.php';
session_start();

unset($_SESSION["coach"]);
unset($_SESSION["coach_loc"]);

header("Location: login.php");