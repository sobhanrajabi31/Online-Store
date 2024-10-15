<?php
include '..\database.php';
$permissions = new permissions();
if (!$permissions->check_permission_manual())
    header('location: ../notfound.html');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <title>Manage</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
        <p class="navbar-brand"><strong>Management</strong></p>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <form action="users.php" method="post">
                    <li class="nav-item">
                        <button name="btn_users" class="nav-link" type="submit">Users</button>
                    </li>
                </form>
                <form action="products.php" method="post">
                    <li class="nav-item">
                        <button name="btn_products" class="nav-link" type="submit">Products</button>
                    </li>
                </form>
                <form action="orders.php" method="post">
                    <li class="nav-item">
                        <button name="btn_orders" class="nav-link" type="submit">Orders</button>
                    </li>
                </form>
                <form action="statistics.php" method="post">
                    <li class="nav-item">
                        <button name="btn_contact" class="nav-link" type="submit">Statistics</button>
                    </li>
                </form>
                <form action="contact.php" method="post">
                    <li class="nav-item">
                        <button name="btn_contact" class="nav-link" type="submit">Contact</button>
                    </li>
                </form>
            </ul>
        </div>
    </div>
</nav>

<section class="bg-dark text-light p-5 p-lg-0 text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h1>Online Shop <span class="text-warning">Manage System</span></h1>
                <p class="lead my-4">
                    این قسمت از فروشگاه فقط در دسترس کارکنان فروشگاه می باشد و <span class="text-danger">امنیت فروشگاه</span> شما را تضمین می کند
                </p>

                <form action="../logout.php?access=logout" class="py-2" method="post">
                    <button name="btn_logout" class="btn btn-secondary btn-lg" type="submit">خروج از حساب کاربری</button>
                </form>

                <form action="../index.php" class="py-2" method="post">
                    <button name="btn_statistics" class="btn btn-danger btn-lg">بازگشت به صفحه اصلی</button>
                </form>
            </div>
            <img class="img-fluid w-30 d-none d-sm-block" src="../image/manage.svg" alt="" width="500px" height="500px">
        </div>
    </div>
</section>

<section class="p-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-person"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            کاربران
                        </h3>
                        <p class="card-text">
                            مدیریت کاربران، ادمین ها و مدیران کل
                        </p>
                        <form action="users.php" method="post">
                            <button name="btn_users" type="submit" class="btn btn-primary">ورود به قسمت کاربران</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-cart2"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            محصولات
                        </h3>
                        <p class="card-text">
                            ویرایش، حذف و افزودن محصولات
                        </p>
                        <form action="products.php" method="post">
                            <button name="btn_products" type="submit" class="btn btn-primary">ورود به قسمت محصولات</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            سفارشات
                        </h3>
                        <p class="card-text">
                            ویرایش، حذف و افزودن سفارشات
                        </p>
                        <form action="orders.php" method="post">
                            <button name="btn_orders" type="submit" class="btn btn-primary">ورود به قسمت سفارشات</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-camera"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            آمار فروشگاه
                        </h3>
                        <p class="card-text">
                            آمار مربوط به سفارشات، محصولات و کاربران
                        </p>
                        <form action="statistics.php" method="post">
                            <button name="btn_orders" type="submit" class="btn btn-primary">ورود به قسمت آمار</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            تماس ها
                        </h3>
                        <p class="card-text">
                            نمایش پیغام های کاربران به صورت کامل
                        </p>
                        <form action="contact.php" method="post">
                            <button name="btn_orders" type="submit" class="btn btn-primary">ورود به قسمت تماس ها</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="p-5 bg-dark text-white text-center position-relative">
    <div class="container">
        <p class="lead">Copyright &copy; 2024 Online Shop</p>
        <a href="#" class="position-absolute bottom-0 end-0 p-5">
            <i class="bi bi-arrow-up-circle h1"></i>
        </a>
    </div>
</footer>

</body>
</html>

