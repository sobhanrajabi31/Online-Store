<?php
include '../../database.php';
$product = new product();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_GET['id']))
    {
        $product->delete_product($_GET['id']);
        header('location: ../products.php');
    }
}
?>