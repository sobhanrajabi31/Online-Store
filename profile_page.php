<?php
include 'database.php';

if (!isset($_SESSION['telephone']))
    header('location: login.php');
else
{
    global $connection;

    $query = "select * from users where telephone='".$_SESSION['telephone']."'";
    $query_result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($query_result);

    $display_name_ = $row['display_name'];
    $email_ = $row['email'];
    $telephone_ = $row['telephone'];
    $address_ = $row['address'];
}
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
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
</head>
<body style="background-color: #eee;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="profile_page.php">پروفایل</a>
        <a class="nav-link" href="security_page.php">امنیت</a>
        <a class="nav-link" href="cart.php">سبد خرید</a>
        <a class="nav-link" href="index.php">صفحه اصلی</a>
    </nav>
    <hr class="mt-0 mb-4">
<form action="profile.php" method="post" enctype="multipart/form-data">
	<div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">تصویر پروفایل</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="image/users/<?php echo $_SESSION['avatar'] ?>">
                    <div class="small text-muted mb-4">PNG و کمتر از 2 مگابایت</div>

                    <input class="form-outline form-white form-control form-control-sm mb-1" type="file" name="upload_file" id="upload_file" required>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">اطلاعات شخصی</div>
                <div class="card-body">
                        <div class="mb-3">
                            <label class="small mb-1" for="display_name">نام نمایشی</label>
                            <input class="form-control" id="display_name" maxlength="100" name="display_name" type="text" value="<?php echo $display_name_ ?>" required>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">ایمیل</label>
                                <input class="form-control" id="email" maxlength="100" name="email" type="email" value="<?php echo $email_ ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="telephone">تلفن همراه</label>
                                <input class="form-control" id="telephone" maxlength="11" name="telephone" type="tel" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" value="<?php echo $telephone_ ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="address">آدرس</label>
                            <input class="form-control" id="address" maxlength="200" name="address" type="text" value="<?php echo $address_ ?>" required>
                        </div>

                        <button class="btn btn-primary" type="submit" name="btn_change_profile">ذخیره تغییرات</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<?php

if (isset($_SESSION['startup']))
{
    if ($_SESSION['alert_change_profile'])
    {
        $_SESSION['alert_change_profile'] = false;
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        اطلاعات وارد شده با موفقیت تغییر کرد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_email_or_telephone_exist'])
    {
        $_SESSION['alert_email_or_telephone_exist'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        ایمیل یا شماره تلفن وارد شده قبلا در سیستم ثبت شده است.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        
    }
    if ($_SESSION['alert_failure_profile'])
    {
        $_SESSION['alert_failure_profile'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        عملیات تغییر اطلاعات پروفایل با خطا روبرو شد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_profile_invalid_telephone'])
    {
        $_SESSION['alert_profile_invalid_telephone'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        شماره تلفن وارد شده نامعتبر است.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_profile_invalid_password'])
    {
        $_SESSION['alert_profile_invalid_password'] = false;
        $_SESSION['alert_failure_profile'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        حداقل کاراکتر تعیین شده برای رمز عبور برابر با 4 می باشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_editprofile_not_image'])
    {
        $_SESSION['alert_editprofile_not_image'] = false;
        echo '<div dir="rtl" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        فقط فرمت PNG قابل ارسال می باشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($_SESSION['alert_editprofile_image_under_2mb'])
    {
        $_SESSION['alert_editprofile_image_under_2mb'] = false;
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        حجم عکس ارسالی باید کمتر از 2 مگابایت باشد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>

</body>
</html>