<?php
include 'database.php';
$contact = new contact();
$permissions = new permissions();

if (!$permissions->check_permission_manager())
{
	$_SESSION['alert_failure_access'] = true;
	header('location: management/contact.php');
	die();
}
else
	$contact->delete_contact($_GET['id']);

?>