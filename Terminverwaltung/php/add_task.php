<?php
session_start();

if(!isset($_SESSION['username']))
{
    echo "<p style='padding-left: 45%'>Bitte zuerst <a href='login.php'>einloggen</a> ";
    exit;

}
if(isset($_POST['logout'])) {
    if ($_POST['logout'] == "logout") {
        header("login.php");
    }
}

?>



<!doctype html>
<html>
<body >


<form method="post" action="login.php" style="padding-left: 90%">
    <input type="submit" value="Logout" name="logout">
</form>