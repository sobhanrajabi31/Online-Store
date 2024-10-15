<?php
include '../../database.php';
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    global $connection;
    $query = "select * from orders where order_id='".$_GET['id']."'";
    $query_result = mysqli_query($connection, $query);

    if (isset($_GET['id']))
    {
        if (mysqli_num_rows($query_result) > 0)
        {
            $row = mysqli_fetch_assoc($query_result);
            $edit_order = $row['order_id'];
            $_SESSION['edit_order'] = $edit_order;
            $select_product_id_ = $row['product_id_fk'];
            $select_user_id_ = $row['user_id_fk'];
            $amount_old = $_SESSION['amount_old'] = $row['amount'];
            $status_ = $row['status'];
            $submit_date_ = $row['submit_date'];
        }
        else
        {
            $_SESSION['alert_order_notfound'] = true;
            header('location: edit_order.php?id='.$_GET['id'].'');
            die();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
    <title>Edit Order</title>
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<form action="edit_order.php" method="post">
    <section class="vh-100 gradient-custom text">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php 
                
                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_not_enough_product_editorder'])
                    {
                        $_SESSION['alert_not_enough_product_editorder'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        تعداد انتخاب شده از تعداد موجودی محصول بیشتر است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_counting_editorder'])
                    {
                        $_SESSION['alert_failure_counting_editorder'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات محاسبه موجودی محصول با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_editorder'])
                    {
                        $_SESSION['alert_failure_editorder'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات تغییر اطلاعات سفارش با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_editorder2'])
                    {
                        $_SESSION['alert_failure_editorder2'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات محاسبه موجودی محصول با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

                    }
                    if ($_SESSION['alert_not_enough_product_editorder2'])
                    {
                        $_SESSION['alert_not_enough_product_editorder2'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        تعداد انتخاب شده از تعداد موجودی محصول بیشتر است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_order_notfound'])
                    {
                        $_SESSION['alert_order_notfound'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        سفارش مورد نظر جهت ویرایش اطلاعات یافت نشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                
                ?>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-2 text-center">

                            <div class="mb-md-5 mt-md-4 pb-0">

                                <h2 class="fw-bold mb-2 text-uppercase">Edit Order</h2>
                                <p class="text-white-50 mb-2">پنل تغییر سفارش</p>

                                <label class="form-label form-control-sm" for="select_product_id">کد محصول</label>

                                <?php
                                global $connection;

                                $query = "select * from products where status='1' and amount >= 0 and product_id=$select_product_id_";
                                $query_result = mysqli_query($connection, $query);
                                $product_id = "";
                                $product_name = "";
                                echo " <div class='form-outline form-white mb-1'>";
                                echo "<select id='select_product_id' name='select_product_id' class='form-select text-center' aria-label='.form-select-sm example' required>";
                                while ($row = mysqli_fetch_assoc($query_result))
                                {
                                    $product_id = $row['product_id'];
                                    $product_name = $row['product_name'];
                                    if ($product_id == $select_product_id_)
                                        echo "<option selected value='$product_id'>#$product_id | $product_name</option>";
                                    else
                                        echo "<option value='$product_id'>#$product_id | $product_name</option>";
                                }
                                echo "</select>";
                                echo "</div>";
                                ?>

                                <label class="form-label form-control-sm" for="select_user_id">کد کاربر</label>

                                <?php
                                global $connection;

                                $query = "select * from users";
                                $query_result = mysqli_query($connection, $query);
                                $user_id = "";
                                $display_name = "";
                                $telephone = "";
                                echo " <div class='form-outline form-white mb-1'>";
                                echo "<select name='select_user_id' class='form-select text-center' aria-label='.form-select-sm example' required>";
                                while ($row = mysqli_fetch_assoc($query_result))
                                {
                                    $user_id = $row['user_id'];
                                    $display_name = $row['display_name'];
                                    $telephone = $row['telephone'];
                                    if ($user_id == $select_user_id_)
                                        echo "<option selected value='$user_id'>#$user_id | $telephone | $display_name</option>";
                                    else
                                        echo "<option value='$user_id'>#$user_id | $telephone | $display_name</option>";
                                }
                                echo "</select>";
                                echo "</div>";
                                ?>

                                <label class="form-label form-control-sm" for="select_amount">تعداد</label>

                                <div class="form-outline form-white mb-1">
                                    <input name="select_amount" id="select_amount" type="number" min="1" class="form-control form-control-sm text-center" value="<?php echo $amount_old ?>" required/>
                                </div>

                                <label class="form-label form-control-sm" for="select_user_id">وضعیت</label>

                                <?php
                                    echo '<div class="form-outline form-white mb-1">';
                                    echo '<select name="select_status" class="form-select text-center" aria-label=".form-select-sm example" required>';

                                    if ($status_ == 0)
                                        echo '<option selected value="0">پرداخت نشده</option>';
                                    else
                                        echo '<option value="0">پرداخت نشده</option>';
                                    if ($status_ == 1)
                                        echo '<option selected value="1">پرداخت شده</option>';
                                    else
                                        echo '<option value="1">پرداخت شده</option>';

                                    echo '</select>';
                                    echo '</div>';
                                ?>

                                <div class="form-outline form-white mb-4 datetimepicker">
                                    <label class="form-label form-control-sm" for="submit_date">تاریخ</label>
                                    <input name="submit_date" type="datetime-local" id="submit_date" value = "<?php echo $submit_date_ ?>" class="form-control form-control-sm" style="text-align: center" required/>
                                </div>

                                <button name="btn_edit_order" type="submit" class="btn btn-outline-light btn-lg px-5">تغییر</button>

                                <div>
                                    <p class="mb-0 py-3"><a href="../orders.php" class="text-white-50 fw-bold">بازگشت به صفحه اصلی</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

</body>
</html>
