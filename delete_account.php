<?php
include 'database.php';
$profile = new profile();

if (isset($_SESSION['telephone']) and isset($_POST['btn_delete_account']))
{
	if ($_SESSION['password'] == md5($_POST['confirm_delete_password']))
	{
		$profile->delete_account($_GET['id']);
	}
	else
	{
		$_SESSION['alert_wrong_confirm_password'] = true;
		header('location: security_page.php');
	}
}
else
	header('location: notfound.html');