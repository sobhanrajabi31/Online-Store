<?php
include '..\database.php';
$statistics = new statistics();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="navbar.css">
    <title>Statistics</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders" dir="rtl">
        <a class="nav-link" href="contact.php">Contact</a>
        <a class="nav-link active" href="statistics.php">Statistics</a>
        <a class="nav-link" href="orders.php">Orders</a>
        <a class="nav-link" href="products.php">Products</a>
        <a class="nav-link ms-0" href="users.php">Users</a>    
    </nav>
    <hr class="mt-0 mb-4">
</div>

<div class="container py-1">
    <div class="card bg-dark text-light">
        <div class="card-header text-center">
            <strong>آمار فروشگاه</strong>
        </div>
        <div class="card-body">

<section class="p-1">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md">
                <div class="card bg-dark text-light border-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-shield-shaded"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            کاربران
                        </h3>
                        <p class="card-text">
                            <?php
                            echo $statistics->show_manage_team();
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light border-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            محصولات
                        </h3>
                        <p class="card-text">
                            <?php
                            echo $statistics->products_details();
                            ?>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md mb-4">
                <div class="card bg-dark text-light border-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-cash"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            سفارشات
                        </h3>
                        <p class="card-text">
                            <?php
                            echo $statistics->products_prices();
                            ?>
                            <br>
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light border-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            فعال ترین
                        </h3>
                        <p class="card-text">
                            <?php
                            echo $statistics->most_active_user();
                            ?>
                            <br>
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md py-2">
                <div class="card bg-dark text-light border-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <form action="../management/index.php" method="post">
                            <button class="btn btn-danger">صفحه اصلی</button>
                        </form>
                    </div>
                </div>
            </div>
</section>
        </div>
    </div>
</div>
</form>
</body>
</html>



