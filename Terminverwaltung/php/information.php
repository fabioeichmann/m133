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

?>
<!doctype html>
<html>
<link rel="stylesheet" media="screen" href="../css/index.css">
<head>
    <?php showheader(); ?>
</head>
<body class="page">
<table>
    <thead>
       <th>ICONS</th>
    </thead>
    <tr>
       <td><div>Icon made by <a href="http://www.typicons.com" title="Stephen Hutchings">Stephen Hutchings</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div></td>
    </tr>
    <tr>
       <td> <div>Icon made by <a href="http://picol.org" title="Picol">Picol</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div></td>
    </tr>
</table>


</body>

</html>

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 03.11.2014
 * Time: 13:18
 */ 