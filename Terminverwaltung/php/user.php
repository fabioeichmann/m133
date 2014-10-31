<?php
session_start();
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
        header("login.php");
    }
}
if(isset($_POST['password']) and isset($_POST['repeatpassword'])){
    if($_POST['password'] != $_POST['repeatpassword']){
        echo "WRONG";
    }elseif(isset($_POST['adduser'])){
        $fp = fopen("logindata.txt", a);
        fwrite($fp,$_POST['username'].":".$_POST['password']);
        fclose($fp);
    }
}

$un = $_POST['username'];
?>

<!doctype html>
<html>
    <body >


    <form method="post" action="login.php" style="padding-left: 90%">
        <input type="submit" value="Logout" name="logout">
    </form>

    <form action="<?php echo $PHP_SELF; ?>" method="post">
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
                    <input type="submit" value="Add" name="adduser" />
                </td>
            </tr>





        </table>
    </form>

    </body>
</html>