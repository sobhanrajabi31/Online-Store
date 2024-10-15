<?php
include 'database.php';
$profile = new profile();

if (isset($_SESSION['telephone']) and isset($_POST['btn_change_password']))
{
	if ($_SESSION['password'] == md5($_POST['current_password']))
		if (md5($_POST['new_password']) == md5($_POST['confirm_password']))
		{
			if (strlen($_POST['new_password']) < 4)
			{
				$_SESSION['alert_security_invalid_password'] = true;
				header('location: security_page.php');
				die();
			}
			$profile->change_password(md5($_POST['new_password']));
		}
		else
		{
			$_SESSION['alert_new_password!=confirm_password'] = true;
			header('location: security_page.php');
		}
	else
	{
		$_SESSION['alert_wrong_old_password'] = true;
		header('location: security_page.php');
	}
}
else
	header('location: notfound.html');


?>