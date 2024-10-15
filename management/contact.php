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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="navbar.css">
    <title>Contact</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container-xl px-4 mt-4" dir="rtl">
    <nav class="nav nav-borders">
        <a class="nav-link active" href="contact.php">Contact</a>
        <a class="nav-link" href="statistics.php">Statistics</a>
        <a class="nav-link " href="orders.php">Orders</a>
        <a class="nav-link" href="products.php">Products</a>
        <a class="nav-link ms-0" href="users.php">Users</a>
    </nav>
    <hr class="mt-0 mb-4">
</div>

<div class="container py-1">
    <div class="card bg-dark text-light">
        <div class="card-header text-center">
            <strong>پیام های فروشگاه</strong>
        </div>
        <div class="card-body">

<?php
$tables = new tables();
$tables->contact_table();

if (isset($_SESSION['startup']))
{
	if ($_SESSION['alert_contact_not_found'])
	{
		$_SESSION['alert_contact_not_found'] = false;
		echo "<div class='container text-center align-items-center justify-content-between'><h1>پیامی برای نمایش وجود ندارد</h1></div>";
	}
    if ($_SESSION['alert_success_delete_contact'])
    {
        $_SESSION['alert_success_delete_contact'] = false;
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        پیام مورد نظر حذف شد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_failure_access'])
    {
        $_SESSION['alert_failure_access'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        دسترسی مدیرکل برای حذف این پیام یافت نشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_failure_delete_contact'])
    {
        $_SESSION['alert_failure_delete_contact'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        عملیات حذف پیام مورد نظر با خطا روبرو شد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>

<section class="p-1 mb-1">
    <div class="container">
        <div class="row text-center g-10">
            <div class="col-md py-2">
                <div class="card bg-dark text-light border-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <form action="../management" method="post">
                            <button class="btn btn-danger">صفحه اصلی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
    </div>
</div>