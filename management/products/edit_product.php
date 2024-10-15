<?php
include '../../database.php';
$save = new save();
$product = new product();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_POST['btn_edit_product']))
    {
        if ($_FILES['upload_file']['size'] <= 2000000)
        {
            $image_type = strtolower(pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION));

            if ($image_type == "png")
            {
                $product->edit_product($_POST['product_name'], $_POST['price'], $_POST['status'], $_POST['amount'], $_POST['description']);
                $save->save_product_image($_FILES['upload_file']['tmp_name'], $_SESSION['edit_product']);
            }
            else
            {
                $_SESSION['alert_editproduct_not_image'] = true;
                header('location: edit_product_page?id='.$_SESSION['edit_product'].'.php');
                die();
            }
        }
        else
        {
            $_SESSION['alert_editproduct_image_under_2mb'] = true;
            header('location: edit_product_page?id='.$_SESSION['edit_product'].'.php');
            die();
        }
        header('location: ../products.php');
    }
}
?>