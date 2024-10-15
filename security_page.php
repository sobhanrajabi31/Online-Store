<?php
include 'database.php';

if (!isset($_SESSION['telephone']))
    header('location: login.php')
?>

<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="security.css">
    <title>Security</title>
</head>
<body style="background-color: #eee;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<section>
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="profile_page.php">پروفایل</a>
        <a class="nav-link active" href="security_page.php">امنیت</a>
        <a class="nav-link" href="cart.php">سبد خرید</a>
        <a class="nav-link" href="index.php">صفحه اصلی</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">عوض کردن رمز عبور | <a href="forgot_password.php">بازیابی رمز عبور</a></div>
                    <div class="card-body">
                        <form action="security.php" method="post">
                            <div class="mb-3">
                                <label class="small mb-1" for="current_password">رمز عبور فعلی</label>
                                <input class="form-control" maxlength="100" id="current_password" name="current_password" type="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="new_password">رمز عبور جدید</label>
                                <input class="form-control" maxlength="100" id="new_password" name="new_password" type="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="confirm_password">تکرار رمز عبور جدید</label>
                                <input class="form-control" maxlength="100" id="confirm_password" name="confirm_password" type="password" required>
                            </div>
                                <button class="btn btn-primary" type="submit" name="btn_change_password">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">حذف حساب کاربری</div>
                        <div class="card-body">
                            <p>با حذف حساب کاربری، تمامی اطلاعات مربوطه شما در فروشگاه حذف می شود. اگر مطمئن هستید که می خواهید حساب خود را حذف کنید، بر روی دکمه زیر کلیک کنید.</p>
                            <form action="delete_account.php" method="post">
                                <input class="form-control-md" maxlength="100" type="password" pattern=".{4, 100}" name="confirm_delete_password" placeholder="رمز عبور تایید را وارد کنید" required>
                                <button class="btn btn-danger-soft text-danger" type="submit" name="btn_delete_account">حذف حساب کاربری</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<?php

if (isset($_SESSION['startup']))
{
    if ($_SESSION['alert_change_password'])
    {
        $_SESSION['alert_change_password'] = false;
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        رمز وارد شده با موفقیت تغییر کرد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_wrong_confirm_password'])
    {
        $_SESSION['alert_wrong_confirm_password'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        رمز تایید برای حذف اکانت اشتباه می باشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_new_password!=confirm_password'])
    {
        $_SESSION['alert_new_password!=confirm_password'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        پسورد جدید با تکرار پسورد جدید مطابقت ندارد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_wrong_old_password'])
    {
        $_SESSION['alert_wrong_old_password'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        پسورد فعلی وارد شده اشتباه می باشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_security_invalid_password'])
    {
        $_SESSION['alert_security_invalid_password'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        حداقل کاراکتر تعیین شده برای رمز عبور برابر با 4 می باشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>

</body>
</html>