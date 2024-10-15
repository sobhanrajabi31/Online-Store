<?php
include 'database.php';

if (isset($_POST['btn_login']) and isset($_POST['telephone']))
{
    $forms = new forms();
    $forms->login($_POST['telephone'], md5($_POST['password']));
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
    <title>Login Page</title>
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<form action="" method="post">
    <section class="vh-100 gradient-custom p-4">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php

                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_login_wrong_telephone_or_password'])
                    {
                        $_SESSION['alert_login_wrong_telephone_or_password'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        شماره تلفن وارد شده یا رمز عبور اشتباه می باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }

                ?>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">LOGIN</h2>
                                <p class="text-white-50 mb-5">پنل ورود کاربران</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="tel" class="form-control form-control-lg text-center" placeholder="شماره تلفن" name="telephone" maxlength="11" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" class="form-control form-control-lg text-center" maxlength="100" placeholder="رمز عبور" name="password" required/>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="forgot_password.php">رمز عبور خود را فراموش کرده اید؟</a></p>

                                <button type="submit" name="btn_login" class="btn btn-outline-light btn-lg px-5">ورود</button>
                            </div>
                            <div>
                                <p class="mb-0">اکانتی برای ورود ندارید؟ <a href="register.php" class="text-white-50 fw-bold">ثبت نام</a></p>
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