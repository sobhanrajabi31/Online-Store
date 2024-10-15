<?php
include '../../database.php';
$order = new order();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_POST['btn_edit_order']))
    {
        global $connection;

        $query = "select * from orders where order_id='".$_SESSION['edit_order']."'";
        $query_result = mysqli_query($connection, $query);

        $row_find = mysqli_fetch_assoc($query_result);

        $edit_order = $row_find['order_id'];
        $select_product_id_ = $row_find['product_id_fk'];

        $query_find = "select * from products where product_id='$select_product_id_'";
        $query_find_result = mysqli_query($connection, $query_find);

        $row_back = mysqli_fetch_assoc($query_find_result);

        $amount_old = $_SESSION['amount_old'];

        if ($row_back['amount'] + $amount_old >= $_POST['select_amount'])
        {
            if ($_POST['select_amount'] != $amount_old)
            {
                $amount_back = (int)$row_back['amount'] + (int)$amount_old;

                $query_back = "update products set amount='$amount_back' where product_id=$select_product_id_";
                $query_back_result = mysqli_query($connection, $query_back);
    
                if (!$query_back_result)
                {
                    $_SESSION['alert_failure_editorder2'] = true;
                    header('location: edit_order_page.php?id='.$edit_order.'');
                    die();
                }

                $order->edit_order($_POST['select_product_id'], $_POST['select_user_id'], $_POST['select_amount'], $_POST['select_status'], $_POST['submit_date']);
            }
            header('location: ../orders.php');
        }
        else
        {
            $_SESSION['alert_not_enough_product_editorder2'] = true;
            header('location: edit_order_page.php?id='.$edit_order.'');
            die();
        }

        
    }
}
?>