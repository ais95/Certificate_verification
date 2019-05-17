<?php
session_start();
session_destroy();
unset($_SESSION["id"]);
unset($_SESSION["user_email"]);
unset($_SESSION["user_password"]);
header("Location:../index.php");
?>