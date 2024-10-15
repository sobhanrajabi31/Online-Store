<?php
include 'database.php';

if ($_GET['access'] == 'logout' and isset($_SESSION['telephone']))
{
    unset($_SESSION['user_id']);
	unset($_SESSION['access']);
	unset($_SESSION['telephone']);
	unset($_SESSION['password']);
	unset($_SESSION['address']);
	unset($_SESSION['email']);
	unset($_SESSION['display_name']);
    unset($_SESSION['user_id']);

    header('location: index.php');
}
else
    header('location: notfound.html')

?>
