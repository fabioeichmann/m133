<?php
function finished()
{
    $data = file("data.txt");
    $fp = fopen("data.txt", "w");
    $counter = 1;

    foreach ($data as $aufgabe) {
        $arr_aufgabe = explode(":", $aufgabe);
        if($counter != 1 and $_SESSION['username'] == $arr_aufgabe[1] ) {

            if ($_POST['checked'. trim($arr_aufgabe[0])] == '1') {
                $aufgabe = NULL;
                fwrite($fp,$aufgabe);
            }else{
                fwrite($fp,$aufgabe);
            }

        }else{
            fwrite($fp,$aufgabe);
        }


        $counter = $counter + 1;
    }
    fclose($fp);

}

function del_user()
{
    $data = file("logindata.txt");
    $fp = fopen("logindata.txt", "w");
    $counter = 1;

    foreach ($data as $user) {
        $arr_user = explode(":", $user);
        if($counter != 1) {

            if ($_POST[trim($arr_user[0])] == '1') {
                $user = NULL;
                fwrite($fp,$user);
            }else{
                fwrite($fp,$user);
            }

        }else{
            fwrite($fp,$user);
        }


        $counter = $counter + 1;
    }
    fclose($fp);

}

function get_ID(){
    $data = file("data.txt");
    $id = 1;
    foreach ($data as $aufgabe) {
        $arr_aufgabe = explode(":", $aufgabe);
        if($id < $arr_aufgabe[0]){
            $id = $arr_aufgabe[0];
        }
    }

return $id+1;
}
?>