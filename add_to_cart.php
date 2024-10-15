<?php
include 'database.php';

if (isset($_SESSION['telephone']) and isset($_POST['btn_add_to_cart']))
{
	$product_id = $_GET['id'];
	$user_id = $_SESSION['user_id'];
	$amount = $_POST['amount'];
	$status = 0;
	$submit_date = date("Y-m-d H:i:s");

	$order = new order();
	$order->create_order($product_id, $user_id, $amount, $status, $submit_date);
	header('location: cart.php');
}
else
{
	// coalr : *C* reate *O* rder *A* fter *L* ogin / *R* egister
	
	$_SESSION['coalr']['product_id'] = $_GET['id'];
	$_SESSION['coalr']['amount'] = $_POST['amount'];
	$_SESSION['coalr']['status'] = 0;
	$_SESSION['coalr']['submit_date'] = date("Y-m-d H:i:s");
	$_SESSION['coalr']['add_status'] = true;
	
	header('location: login.php');
}

?>