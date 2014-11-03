<?php
session_start();
include "header.php";
if(!isset($_SESSION['username']))
{
    echo "<p style='padding-left: 45%'>Bitte zuerst <a href='login.php'>einloggen</a> ";
    exit;

}

if($_SESSION['username'] != "admin"){
    echo "<p style='padding-left: 45%'>Bitte zuerst als Admin <a href='login.php'>einloggen</a> ";
    exit;
}
if(isset($_POST['logout'])) {
    if ($_POST['logout'] == "logout") {
        header("Location login.php");
    }
}

if(isset($_POST['username'])){
    $un = $_POST['username'];
}else{
    $un = "";
}
if(isset($_POST['forename'])){
    $forename = $_POST['forename'];
}else{
    $forename = "";
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}else{
    $name = "";
}


?>

<!doctype html>
<html>
<head>
    <?php showheader(); ?>
</head>
    <link rel="stylesheet" media="screen" href="../css/index.css">
    <body class="page" >

    <form method="post" action="user.php" >
        <table border="0" cellspacing="1" cellpadding="5">
            <tr>
                <td>
                    Username:
                </td>
                <td >
                    <input type="text" size="45" maxlength="50" name="username" value="<?php echo $un?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Forename:
                </td>
                <td >
                    <input type="text" size="45" maxlength="50" name="forename" value="<?php echo $forename?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Name:
                </td>
                <td >
                    <input type="text" size="45" maxlength="50" name="name" value="<?php echo $name?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input type="password" size="45" maxlength="50" name="password" />
                </td>
            </tr>
            <tr>
                <td>
                    Repeat Password:
                </td>
                <td>
                    <input type="password" size="45" maxlength="50" name="repeatpassword" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class='btn' value="Add" name="adduser" />
                </td>
            </tr>





        </table>
    </form>

    </body>
</html>