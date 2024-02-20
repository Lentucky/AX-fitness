<?php 
require 'config/constants.php';
session_start();

unset($_SESSION["customer"]);


header("Location: index.php");
?>