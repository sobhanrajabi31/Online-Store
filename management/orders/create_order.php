<?php
include '../../database.php';
$order = new order();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_POST['btn_create_order']) and isset($_POST['select_product_id']))
    {
        $order->create_order($_POST['select_product_id'], $_POST['select_user_id'], $_POST['select_amount'], $_POST['select_status'], $_POST['submit_date']);
        header('location: ../orders.php');
    }
}
?>