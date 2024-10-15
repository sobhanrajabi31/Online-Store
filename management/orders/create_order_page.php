<?php
include '../../database.php';
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
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
    <title>Create Order</title>
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<form action="create_order.php" method="post">
    <section class="vh-100 gradient-custom text">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php 
                
                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_not_enough_product_createorder'])
                    {
                        $_SESSION['alert_not_enough_product_createorder'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        تعداد انتخاب شده از تعداد موجودی محصول بیشتر است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_counting_order'])
                    {
                        $_SESSION['alert_failure_counting_order'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات محاسبه موجودی محصول با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_createorder'])
                    {
                        $_SESSION['alert_failure_createorder'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات ایجاد سفارش با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                
                ?>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">

                            <div class="mb-md-5 mt-md-4 pb-1">

                                <h2 class="fw-bold mb-2 text-uppercase">Create Order</h2>
                                <p class="text-white-50 mb-5">پنل ایجاد سفارش</p>

                                <?php
                                global $connection;

                                $query = "select * from products where status='1' and amount > 0";
                                $query_result = mysqli_query($connection, $query);
                                $product_id = "";
                                $product_name = "";
                                echo " <div class='form-outline form-white mb-4'>";
                                echo "<select id='select_product_id' name='select_product_id' class='form-select text-center' aria-label='.form-select-sm example' required>";
                                echo "<option value=''>کد محصول</option>";
                                while ($row = mysqli_fetch_assoc($query_result))
                                {
                                    $product_id = $row['product_id'];
                                    $product_name = $row['product_name'];
                                    echo "<option value='$product_id'>#$product_id | $product_name</option>";
                                }
                                echo "</select>";
                                echo "</div>";
                                ?>

                                <?php
                                global $connection;

                                $query = "select * from users";
                                $query_result = mysqli_query($connection, $query);
                                $user_id = "";
                                $display_name = "";
                                $telephone = "";
                                echo " <div class='form-outline form-white mb-4'>";
                                echo "<select name='select_user_id' class='form-select text-center' aria-label='.form-select-sm example' required>";
                                echo "<option value=''>کد کاربر</option>";
                                while ($row = mysqli_fetch_assoc($query_result))
                                {
                                    $user_id = $row['user_id'];
                                    $display_name = $row['display_name'];
                                    $telephone = $row['telephone'];
                                    echo "<option value='$user_id'>#$user_id | $telephone | $display_name</option>";
                                }
                                echo "</select>";
                                echo "</div>";
                                ?>

                                <div class="form-outline form-white mb-4">
                                    <input name="select_amount" id="select_amount" type="number" min="1" placeholder="تعداد" class="form-control form-control-sm text-center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <select name="select_status" class="form-select text-center" aria-label=".form-select-sm example" required>
                                        <option value="">وضعیت</option>
                                        <option value="0">پرداخت نشده</option>
                                        <option value="1">پرداخت شده</option>
                                    </select>
                                </div>

                                <div class="form-outline form-white mb-4 datetimepicker">
                                    <input name="submit_date" type="datetime-local" id="submit_date" placeholder="تاریخ ثبت سفارش" class="form-control form-control-sm" style="text-align: center" required/>
                                </div>

                                <button name="btn_create_order" type="submit" class="btn btn-outline-light btn-lg px-5">ایجاد</button>

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
