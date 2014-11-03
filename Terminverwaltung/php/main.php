<?php
session_start();
include "functions.php";
include "header.php";
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

        <link rel="stylesheet" media="screen" href="../css/index.css">
<head>
    <?php showheader(); ?>
</head>
    <body class="page">


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
                        echo  "<thead>
                                    <tr>
                                        <th>".$arr_aufgabe[0]."</th>
                                        <th>".$arr_aufgabe[2]."</th>
                                        <th>".$arr_aufgabe[3]."</th>
                                        <th>".$arr_aufgabe[5]."</th>
                                        <th>".$arr_aufgabe[6]."</th>
                                    </tr>
                                </thead>";
                    }else {
                        if ($_SESSION['username'] == $arr_aufgabe[1]) {
                            echo "<tbody>
                                    <tr>
                                        <td class='tablecell'>" . $arr_aufgabe[0] . "</td>
                                        <td class='tablecell'>" . $arr_aufgabe[2] . "</td>
                                        <td class='tablecell'>" . $arr_aufgabe[3] . "</td>
                                        <td class='tablecell'>" . $arr_aufgabe[5] . "</td>
                                        <td class='tablecell'><input type='hidden' name='checked".$arr_aufgabe[0]."' value='0'><input type='checkbox' name='checked".$arr_aufgabe[0]."' value='1' ></td>

                                    </tr>
                                  </tbody>";


                        }
                    }
                    $counter = $counter + 1;



                }


               echo "</table>
                <input type='image' src='../icons/save_task.png' name='save' value='Save'>

                </form>";




                ?>


            <form method="post" action="add_task.php">

                <input type="image" src="../icons/add.png" />
            </form>

        </div>

    </body>


</html>
