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
        header("Location: login.php");
    }
}

$id = get_ID();

?>



<!doctype html>
<html>
<head>
    <?php showheader(); ?>
</head>
<link rel="stylesheet" media="screen" href="../css/index.css">
<body class="page">




<form action="add_task.php" method="post">
    <table border="0" cellspacing="1" cellpadding="5">
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $id; ?>
            </td>
        </tr>

        <tr>
            <td>
                Datum:
            </td>
            <td>
                <input type="text" size="10" maxlength="8" name="date" value="" />
            </td>
        </tr>

        <tr>
            <td>
                Beschreibung:
            </td>
            <td>
                <input type="text" size="45" maxlength="50" name="description" value="" />
            </td>
        </tr>

        <tr>
            <td>
                Ort:
            </td>
            <td>
                <input type="text" size="45" maxlength="50" name="location" value="" />
            </td>
        </tr>
        <tr>
            <td>
                Wichtig:
            </td>
            <td>
                <input type="hidden" name="important" value="N"><input type="checkbox" name="important" value="J" />
            </td>
        </tr>

    </table>
    <input type="image" src="../icons/save_task.png" name="addtask" value="Add">

</form>

<?php
if(isset($_POST['addtask'])) {
    $fp = fopen("data.txt", "a");
    $string = "";
    if (isset($_SESSION['username'])) {
        $string = $string . $_SESSION['username'] . ":";

    } else {
        $string = $string . "default:";
    }
    if (isset($_POST['date'])) {
        $string = $string . $_POST['date'] . ":";
    } else {
        $string = $string . ":";
    }

    if (isset($_POST['description'])) {
        $string = $string . $_POST['description'] . ":";
    } else {
        $string = $string . ":";
    }

    if (isset($_POST['important'])) {
        $string = $string . $_POST['important'] . ":";
    } else {
        $string = $string . ":";
    }

    if (isset($_POST['location'])) {
        $string = $string . $_POST['location'];
    } else {
        $string = $string . ":";
    }
    $string = PHP_EOL . $id . ":" . $string;
    fwrite($fp, $string);
    fclose($fp);
    header("Location: main.php");
}
?>

