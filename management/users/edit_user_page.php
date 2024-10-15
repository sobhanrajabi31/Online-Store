
<?php
include '../../database.php';
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    global $connection;
    $query = "select * from users where user_id='".$_GET['id']."'";
    $query_result = mysqli_query($connection, $query);

    if (isset($_GET['id']))
    {
        if ($_SESSION['user_id'] == $_GET['id'])
        {
            $_SESSION['alert_failure_edituser_self'] = true;
            header('location: ../users.php');
            die();
        }
        else
        {
            if (mysqli_num_rows($query_result) > 0)
            {
                $row = mysqli_fetch_assoc($query_result);

                $my_access = $_SESSION['access'];
                $user_id = $row['user_id'];
                $_SESSION['edit_user'] = $user_id;
                $display_name = $row['display_name'];
                $telephone = $row['telephone'];
                $password = $row['password'];
                $access = $row['access'];
                $email = $row['email'];
                $address = $row['address'];

                if ($_SESSION['access'] <= $row['access'])
                {
                    $_SESSION['alert_failure_edituser_access'] = true;
                    header('location: ../users.php');
                    die();
                }
            }
            else
            {
                $_SESSION['alert_failure_edituser_notfound'] = true;
                header('location: ../users.php');
                die();
            }
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
    <title>Edit User</title>
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<form action="edit_user.php" method="post" enctype="multipart/form-data">
    <section class="vh-100 gradient-custom text">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php 
                
                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_failure_edituser'])
                    {
                        $_SESSION['alert_failure_edituser'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات تغییر اطلاعات کاربر با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_edituser_self'])
                    {
                        $_SESSION['alert_failure_edituser_self'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        شما نمیتوانید حساب خود را ویرایش کنید.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_edituser_access'])
                    {
                        $_SESSION['alert_failure_edituser_access'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        شما اجازه ویرایش یک کاربر با این سطح دسترسی را ندارید.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_edituser_notfound'])
                    {
                        $_SESSION['alert_failure_edituser_notfound'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        کاربر مورد نظر جهت ویرایش اطلاعات یافت نشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_edituser_not_image'])
                    {
                        $_SESSION['alert_edituser_not_image'] = false;
                        echo '<div dir="rtl" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        فقط فرمت PNG قابل ارسال می باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_edituser_image_under_2mb'])
                    {
                        $_SESSION['alert_edituser_image_under_2mb'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        حجم عکس ارسالی باید کمتر از 2 مگابایت باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                
                ?>
                <div class="col-12 col-md-5 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-3 text-center">

                            <div class="mb-md-4 mt-md-3 pb-1">

                                <h2 class="fw-bold mb-1 text-uppercase">Edit User</h2>
                                <p class="text-white-50 mb-1">پنل تغییر اطلاعات کاربر</p>

                                <input class="form-outline form-white form-control form-control-sm mb-1" type="file" accept="image/png" name="upload_file" id="upload_file" required>
                                <label dir="rtl" class="mb-4" for="upload_file">PNG و کمتر از 2 مگابایت</label>

                                <div class="form-outline form-white mb-0">
                                    <label class="form-label form-control-sm" for="display_name">نام نمایشی</label>
                                    <input name="display_name" maxlength="100" type="text" id="display_name" class="form-control form-control-sm text-center" style="text-align: center" value="<?php echo $display_name ?>" required/>
                                </div>

                                <div class="form-outline form-white mb-0">
                                    <label class="form-label form-control-sm" for="telephone">شماره تلفن</label>
                                    <input name="telephone" type="tel" id="telephone" class="form-control form-control-sm text-center" style="text-align: center" value="<?php echo $telephone ?>" maxlength="11" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" required/>
                                </div>

                                <div class="form-outline form-white mb-0">
                                    <label class="form-label form-control-sm" for="password">پسورد</label>
                                    <input name="password" maxlength="100" type="password" id="password" class="form-control form-control-sm" style="text-align: center" required/>
                                </div>

                                <label class="form-label form-control-sm" for="access">دسترسی</label>

                                <?php
                                echo '<div class="form-outline form-white mb-0">';
                                echo '<select name="access" id="access" class="form-select text-center" aria-label=".form-select-sm example" required>';
                                for ($i = 0; $i < $my_access; $i++)
                                {
                                    if ($i == 0)
                                        if ($i == $access)
                                            echo '<option selected value="'.$i.'">کاربر</option>';
                                        else
                                            echo '<option value="'.$i.'">کاربر</option>';
                                    if ($i == 1)
                                        if ($i == $access)
                                            echo '<option selected value="'.$i.'">ادمین</option>';
                                        else
                                            echo '<option value="'.$i.'">ادمین</option>';
                                    if ($i == 2)
                                        if ($i == $access)
                                            echo '<option selected value="'.$i.'">مدیرکل</option>';
                                        else
                                            echo '<option value="'.$i.'">مدیرکل</option>';
                                }
                                echo '</select>';
                                echo '</div>';
                                ?>

                                <div class="form-outline form-white mb-0">
                                    <label class="form-label form-control-sm" for="email">ایمیل</label>
                                    <input name="email" maxlength="100" type="email" id="email" class="form-control form-control-sm" style="text-align: center" value="<?php echo $email ?>" required/>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label class="form-label form-control-sm" for="address">آدرس</label>
                                    <input name="address" maxlength="200" type="text" id="address" class="form-control form-control-sm" style="text-align: center" value="<?php echo $address ?>" required/>

                                </div>

                                <button name="btn_edit_user" type="submit" class="btn btn-outline-light btn-lg px-5">تغییر</button>

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
