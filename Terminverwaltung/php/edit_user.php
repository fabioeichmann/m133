<?php
session_start();
include "header.php";
include "functions.php";
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

$userdata = file("logindata.txt");

foreach($userdata as $datauser){
    $arr_userdata = explode(":",$datauser);
    if($arr_userdata[0] == $_GET['var']) {
        $un = $arr_userdata[0];
        $forename = $arr_userdata[2];
        $name = $arr_userdata[3];
    }
}
?>

<!doctype html>
<html>

<link rel="stylesheet" media="screen" href="../css/index.css">
<head>
    <?php showheader(); ?>
</head>
<body class="page">
<form method="post" action="user.php?var=edit" >
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
       <!-- <tr>
            <td>
                Old Password:
            </td>
            <td>
                <input type="password" size="45" maxlength="50" name="oldpassword" />
            </td>
        </tr> -->
        <tr>
            <td>
                New Password:
            </td>
            <td>
                <input type="password" size="45" maxlength="50" name="password" />
            </td>
        </tr>
        <tr>
            <td>
                Repeat New Password:
            </td>
            <td>
                <input type="password" size="45" maxlength="50" name="repeatpassword" />
            </td>
        </tr>
        <tr>
            <td>
                <input type='image' src='../icons/save_task.png' name='save' value='Save_user'>
            </td>
        </tr>





    </table>
</form>

</body>
</html>