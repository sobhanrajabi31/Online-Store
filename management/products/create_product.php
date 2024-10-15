<?php
include '../../database.php';
$product = new product();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_POST['btn_create_product']) and isset($_POST['product_name']))
    {
        $product->create_product($_POST['product_name'], $_POST['price'], $_POST['status'], $_POST['amount'], $_POST['description']);
        header('location: ../products.php');
    }
}
?>