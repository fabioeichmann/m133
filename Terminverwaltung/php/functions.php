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
                unset($aufgabe);
                fwrite($fp,"");
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