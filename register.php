<?php
include 'database.php';

if (isset($_POST['btn_register']) and isset($_POST['telephone']))
{
    $forms = new forms();
    $forms->register($_POST['telephone'], md5($_POST['password']), $_POST['address'], $_POST['email'], $_POST['display_name']);
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
    <link rel="stylesheet" href="style.css">
    <title>Register Page</title>
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<form action="register.php" method="post">
    <section class="vh-100 gradient-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php

                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_register_wrong_telephone_or_password'])
                    {
                        $_SESSION['alert_register_wrong_telephone_or_password'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        این شماره تلفن/ایمیل قبلا در سیستم ثبت شده است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_register'])
                    {
                        $_SESSION['alert_failure_register'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات ثبت نام با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_register_invalid_telephone'])
                    {
                        $_SESSION['alert_register_invalid_telephone'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        شماره تلفن وارد شده نامعتبر است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    
                    if ($_SESSION['alert_register_invalid_password'])
                    {
                        $_SESSION['alert_register_invalid_password'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        حداقل کاراکتر تعیین شده برای رمز عبور برابر با 4 می باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }       

                ?>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-3">

                                <h2 class="fw-bold mb-2 text-uppercase">register</h2>
                                <p class="text-white-50 mb-5">پنل ثبت نام کاربران</p>

                                <div class="form-outline form-white mb-4">
                                    <input name="display_name" type="text" maxlength="100" class="form-control form-control-sm text-center" placeholder="نام نمایشی" style="text-align: center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="telephone" type="tel" class="form-control form-control-sm text-center" placeholder="شماره تلفن" style="text-align: center" maxlength="11" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="password" maxlength="100" type="password" class="form-control form-control-sm text-center" placeholder="پسورد" style="text-align: center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="email" maxlength="100" type="email" class="form-control form-control-sm text-center" placeholder="ایمیل" style="text-align: center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="address" type="text" maxlength="200" class="form-control form-control-sm text-center" placeholder="آدرس" style="text-align: center" required/>
                                </div>

                                <button name="btn_register" type="submit" class="btn btn-outline-light btn-lg px-5">ورود</button>
                            </div>
                            <div>
                                <p class="mb-0">قبلا ثبت نام کرده اید؟ <a href="login.php" class="text-white-50 fw-bold">ورود</a>
                                </p>
                            </div>
                            <div>
                                <p class="mb-0"><a href="index.php" class="text-white-50 fw-bold">بازگشت به صفحه اصلی</a>
                                </p>
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


