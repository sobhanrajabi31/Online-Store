<?php
include 'database.php';
$cart = new cart();

if (!isset($_SESSION['telephone']))
    header('location: login.php')
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">
    <title>Cart</title>
</head>
<body style="background-color: #eee;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders" dir="rtl">
        <a class="nav-link ms-0" href="profile_page.php">پروفایل</a>
        <a class="nav-link" href="security_page.php">امنیت</a>
        <a class="nav-link active" href="cart.php">سبد خرید</a>
        <a class="nav-link" href="index.php">صفحه اصلی</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="card bg-dark text-light">
        <div class="card-body">
            <?php

            if (isset($_SESSION['telephone']))
            {
                $cart->orders_cart_history();
                $cart->orders_table_cart();

                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_order_cart_history_not_found'])
                    {
                        $_SESSION['alert_order_cart_history_not_found'] = false;
                        echo "<div class='container text-center align-items-center justify-content-between'><h1>تاریخچه ای برای نمایش وجود ندارد</h1></div>";
                    }
                    if ($_SESSION['alert_order_cart_not_found'])
                    {
                        $_SESSION['alert_order_cart_not_found'] = false;
                        echo "<div class='container text-center align-items-center justify-content-between'><h1>سفارشی برای نمایش وجود ندارد</h1></div>";
                    }
                    if ($_SESSION['alert_failure_payment'])
                    {
                        $_SESSION['alert_failure_payment'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات پرداخت سفارش با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
            }
            else
                header('location: login.php');
            ?>
        </div>
        </div>
    </div>
</div>

</body>
</html>