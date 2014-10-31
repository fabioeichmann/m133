<?php
session_start();
include "finished.php";
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



if(isset($_POST['save'])){
    finished();
}
?>



<!doctype html>
<html>
    <body >


        <form method="post" action="login.php" style="padding-left: 90%">
            <input type="submit" value="Logout" name="logout">
        </form>
        <?php
        if($_SESSION['username'] == 'admin') {
            echo "<form method='post' action='user.php'>
                <input type='submit' value='Add User' name='user'>
              </form>";
        }
        ?>

        <div class="tabelle">
            <table>

                <?php
                echo "<form method='post' action='main.php'>";
                $fp = fopen("data.txt","a+");
                $data = file("data.txt");
                $counter = 1;
                foreach ($data as $aufgabe) {
                    $arr_aufgabe = explode(":", $aufgabe);
                    if($counter == 1) {
                        echo  "<tr style = 'border: thick' >
                        <td class='tablecelltitle' >".$arr_aufgabe[0]."</td>
                        <td class='tablecelltitle' >".$arr_aufgabe[2]."</td >
                        <td class='tablecelltitle' >".$arr_aufgabe[3]."</td >
                        <td class='tablecelltitle' >".$arr_aufgabe[5]."</td >
                        <td class='tablecelltitle' >".$arr_aufgabe[6]."</td >
                    </tr >";
                    }else {
                        if ($_SESSION['username'] == $arr_aufgabe[1]) {
                            echo "<tr style='border: thick'>
                            <td class='tablecell'>" . $arr_aufgabe[0] . "</td>
                            <td class='tablecell'>" . $arr_aufgabe[2] . "</td>
                            <td class='tablecell'>" . $arr_aufgabe[3] . "</td>
                            <td class='tablecell'>" . $arr_aufgabe[5] . "</td>
                            <td class='tablecell'><input type='hidden' name='checked".$arr_aufgabe[0]."' value='0'><input type='checkbox' name='checked".$arr_aufgabe[0]."' value='1' ></td>
                            </tr>";


                        }
                    }
                    $counter = $counter + 1;



                }







                ?>

            </table>
            <input type='submit' name='save' value='Save'>

            </form>
            <form method="post" action="add_task.php">
                <input type="submit" name="task" value="Add Task">
            </form>

        </div>

    </body>


</html>
