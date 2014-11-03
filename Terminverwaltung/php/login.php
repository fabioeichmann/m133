<?php
session_start();
session_destroy();
session_start();
if(isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}
if(isset($_POST['password'])){
    $_SESSION['password'] = md5($_POST['password']);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" media="screen" href="../css/index.css">
<head>
    <title>Login</title>
</head>
<body class="page">
<h1 style="text-align: center;">Aufgabenverwaltung - LOGIN</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <table border="0" width="200" cellspacing="5">
        <tr>
            <td>Loginname:</td>
            <td><input type="text" name="username" />
        </tr>
        <tr>
            <td>Passwort:</td>
            <td><input type="password" name="password">
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class='btn' value="anmelden" />
        </tr>

    </table>
</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 27.10.2014
 * Time: 16:10
 */

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['username']) and isset($_POST['password'])) {
            $array_login = file("logindata.txt");
            $login_korrekt = 0;
            foreach ($array_login as $login) {
                $zeichen = explode(":", $login);
                if ($login_korrekt == 0) {
                    if ($_POST['username'] == $zeichen[0]) {
                        if (trim(md5($_POST['password'])) == trim($zeichen[1])) {
                            $login_korrekt = 1;

                            header("Location: main.php");


                        } else {
                            $login_korrekt = 0;


                        }
                    } else {
                        $login_korrekt = 0;

                    }
                }
            }
        }

    }


?>