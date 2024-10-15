<?php
include 'database.php';
$cart = new cart();

if (isset($_SESSION['telephone']) and isset($_POST['btn_purchase']))
{
	$cart->payment();
}
else
	header('location: notfound.html')

?>