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
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
include '../../database.php';
$permissions = new permissions();

if (!$permissions->check_permission_owner())
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
    <title>Create Manager</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<form action="create_manager.php" method="post" enctype="multipart/form-data">
    <section class="vh-100 gradient-custom text">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php 
                
                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_exist_createmanager'])
                    {
                        $_SESSION['alert_exist_createmanager'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        این شماره تلفن/ایمیل قبلا در سیستم ثبت شده است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_createmanager'])
                    {
                        $_SESSION['alert_failure_createmanager'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات ایجاد کاربر با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_createmanager_invalid_telephone'])
                    {
                        $_SESSION['alert_createmanager_invalid_telephone'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        شماره تلفن وارد شده نامعتبر است.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_createmanager_invalid_password'])
                    {
                        $_SESSION['alert_createmanager_invalid_password'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        حداقل کاراکتر تعیین شده برای رمز عبور برابر با 4 می باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_createmanager_not_image'])
                    {
                        $_SESSION['alert_createmanager_not_image'] = false;
                        echo '<div dir="rtl" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        فقط فرمت PNG قابل ارسال می باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_createmanager_image_under_2mb'])
                    {
                        $_SESSION['alert_createmanager_image_under_2mb'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        حجم عکس ارسالی باید کمتر از 2 مگابایت باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }

                ?>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">

                            <div class="mb-md-5 mt-md-4 pb-1">

                                <h2 class="fw-bold mb-2 text-uppercase">Create Manager</h2>
                                <p class="text-white-50 mb-5">پنل ایجاد مدیرکل</p>

                                <input class="form-outline form-white form-control form-control-sm mb-1" type="file" accept="image/png" name="upload_file" id="upload_file" required>
                                <label dir="rtl" class="mb-4" for="upload_file">PNG و کمتر از 2 مگابایت</label>

                                <div class="form-outline form-white mb-4">
                                    <input name="display_name" maxlength="100" type="text" id="display_name" placeholder="نام نمایشی" class="form-control form-control-sm text-center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="telephone" type="tel" id="telephone" placeholder="شماره تلفن" class="form-control form-control-sm text-center" maxlength="11" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="password" maxlength="100" type="password" id="password" placeholder="رمز عبور" class="form-control form-control-sm text-center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <select id="access" name="access" class="form-select text-center" aria-label=".form-select-sm example" required>
                                        <option selected value="">دسترسی</option>
                                        <option value="2">مدیرکل</option>
                                    </select>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="email" maxlength="100" type="email" id="email" placeholder="ایمیل" class="form-control form-control-sm text-center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="address" maxlength="200" type="text" id="address" placeholder="آدرس" class="form-control form-control-sm text-center" required/>
                                </div>

                                <button name="btn_create_manager" type="submit" class="btn btn-outline-light btn-lg px-5">ایجاد</button>

                                <div>
                                    <p class="mb-0 py-3"><a href="../users.php" class="text-white-50 fw-bold">بازگشت به صفحه اصلی</a>
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
