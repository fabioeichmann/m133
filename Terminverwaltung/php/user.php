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
        $i = 0;
        $arr = "";
        foreach($userdata as $datauser){
            $arr_userdata = explode(":",$datauser);
            if(isset($arr_userdata)) {
                if (isset($_POST[$arr_userdata[0]])) {
                    if ($_POST[$arr_userdata[0]] == 1) {
                        if ($i == 1) {
                            $arr = $arr . $arr_userdata[0];
                        } else {
                            $arr = $arr . $arr_userdata[0] . ",";
                        }
                    }

                }
            }else
            {
                echo "tst";
            }
            $i = $i + 1;
        }
        if(substr_count($arr,",") == 0){
            header("Location: edit_user.php?var=".$arr);
        }else{

            echo "<script type='text/javascript'>";
            echo " alert('Es kann nur ein User editiert werden');";
            echo "</script>";

        }

    }elseif(isset($_POST['add'])){
        header("Location: add_user.php");
    }


if(isset($_POST['password']) and isset($_POST['repeatpassword'])){
    if(trim($_POST['password']) != trim($_POST['repeatpassword'])){
        if($_GET['var'] == 'add'){
            echo "<meta http-equiv='refresh' content='1; URL=add_user.php'>";
            exit;
        }/*elseif($_GET['var'] == 'edit'){
            echo "<meta http-equiv='refresh' content='1; URL=edit_user.php?var=".$arr."'>";
            exit;
        }*/
    }elseif(isset($_POST['adduser'])){

        $fp = fopen("logindata.txt", "a+");
        fwrite($fp,PHP_EOL.$_POST['username'].":".md5($_POST['password']).":".$_POST['forename'].":".$_POST['name']);
        fclose($fp);
        unset($_POST['password']);
        unset($_POST['repeatpassword']);
        unset($_POST['forename']);
        unset($_POST['username']);
        unset($_POST['name']);
    }
    /*else{
        $daten = file('logindata.txt');        // Datei einlesen
        $fp = fopen('logindata.txt', 'w');            // Datei neu erstellen
        foreach ($daten as $zeile){
            $felder = explode(':', $zeile);        // Zeile aufteilen
            if (strcmp($felder[0], $_POST['username'])){    // Wenn gesuchte Zeile
                $felder[0] = $_POST['username'];
                $felder[1] = md5($_POST['password']);// 2. Feld ändern
                $felder[2] = $_POST['forename'];
                $felder[3] = $_POST['name'];
                $zeile = implode('-', $felder);    // Zeile wieder zusammensetzen
            }
            fwrite($fp, PHP_EOL.$zeile);                // Zeile schreiben
        }
        fclose($fp);

        unset($_POST['password']);
        unset($_POST['oldpassword']);
        unset($_POST['repeatpassword']);
        unset($_POST['forename']);
        unset($_POST['username']);
        unset($_POST['name']);
    }*/


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
                <input type='image' src='../icons/add.png' name='add' value='Add'/>
                <input type='image' src='../icons/del_user.png' name='del' value='Del'>
                <input type='image' src='../icons/edit.png' name='edit' value='Edit'>
                </form>";




        ?>



</body>
</html>