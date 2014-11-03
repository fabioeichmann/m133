<?php

function showheader()
{
    if($_SESSION['username'] == 'admin') {
        echo "<h1 style='text-align: center;'>Aufgabenverwaltung</h1>
        <div id='nav'>
            <ul id='menu'>
                <li><a href='main.php' title='main'>Tasks</a></li>
                <li><a href='user.php' title='User'>User</a></li>
                <li><a href='Information.php' title='Information'>Information</a></li>
                <li><a href='login.php' title='Logout'>Logout</a></li>
            </ul>
</div>";
    }else{
        echo "<h1 style='text-align: center;'>Aufgabenverwaltung</h1>
        <div id='nav'>
            <ul id='menu'>
                <li><a href='main.php' title='main'>Tasks</a></li>
                <li><a href='Information.php' title='Information'>Information</a></li>
                <li><a href='login.php' title='Logout'>Logout</a></li>
            </ul>
</div>";
    }
}
?>