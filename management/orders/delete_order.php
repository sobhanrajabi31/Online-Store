<?php
include '../../database.php';
$cart = new cart();
$order = new order();
$permissions = new permissions();

if (isset($_POST['btn_delete_order_cart']))
{
    $cart->delete_order_cart($_GET['id']);
    header('location: ../../cart.php');
}
else
{
    if (!$permissions->check_permission_manual())
        header('location: ../../notfound.html');
    else
    {
        if (isset($_GET['id']))
        {
            $order->delete_order($_GET['id']);
            header('location: ../orders.php');
        }
    }
}
?>