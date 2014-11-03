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

    if (isset($_POST['edit'])) {
        $userdata = file("logindata.txt");
        foreach($userdata as $datauser){
            $arr_userdata = explode(":",$datauser);
            if($_POST[$arr_userdata[1]] == 1){
                $arr[] =
            }
        }
        header("Location: edit_user.php?var=".$_POST['admin']);

    }elseif(isset($_POST['add'])){
        header("Location: add_user.php");
    }


if(isset($_POST['password']) and isset($_POST['repeatpassword'])){
    if(trim($_POST['password']) != trim($_POST['repeatpassword'])){
        echo "<meta http-equiv='refresh' content='1; URL=add_user.php'>";
            exit;
    }elseif(isset($_POST['adduser'])){

        $fp = fopen("logindata.txt", "a+");
        fwrite($fp,PHP_EOL.$_POST['username'].":".md5($_POST['password']).":".$_POST['forename'].":".$_POST['name']);
        fclose($fp);
        unset($_POST['password']);
        unset($_POST['forename']);
        unset($_POST['username']);
        unset($_POST['name']);
    }
}

if(isset($_POST['del'])){
    del_user();
}
?>

<!doctype html>
<html>

<link rel="stylesheet" media="screen" href="../css/index.css">
<head>
    <?php showheader(); ?>
</head>
<body class="page">
<div class="tabelle">
    <form method='post' action='user.php'>
    <table>

        <?php
        $fp = fopen("logindata.txt","a+");
        $data = file("logindata.txt");
        $counter = 1;
        foreach ($data as $user) {
            $arr_user = explode(":", $user);
            if($counter == 1) {
                echo  "<thead>
                                    <tr>
                                        <th>".$arr_user[0]."</th>
                                        <th>".$arr_user[2]."</th>
                                        <th>".$arr_user[3]."</th>
                                        <th><input type='image' src='../icons/mark_user.png'/></th>
                                    </tr>
                                </thead>";
            }else {

                    echo "<tbody>
                                    <tr>
                                        <td class='tablecell'>" . $arr_user[0] . "</td>
                                        <td class='tablecell'>" . $arr_user[2] . "</td>
                                        <td class='tablecell'>" . $arr_user[3] . "</td>

                                        <td class='tablecell'><input type='hidden' name='".$arr_user[0]."' value='0'><input type='checkbox' name='".$arr_user[0]."' value='1' ></td>

                                    </tr>
                                  </tbody>";



            }
            $counter = $counter + 1;



        }


        echo "</table>
                <input type='image' src='../icons/add.png' />
                <input type='image' src='../icons/del_user.png' name='del' value='Delete'>
                <input type='image' src='../icons/edit.png' name='edit' value='Edit'>
                </form>";




        ?>


</div>
</body>
</html>