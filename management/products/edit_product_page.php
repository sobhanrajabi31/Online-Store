<?php
include '../../database.php';
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    global $connection;
    $query = "select * from products where product_id='".$_GET['id']."'";
    $query_result = mysqli_query($connection, $query);

    if (isset($_GET['id']))
    {
        if (mysqli_num_rows($query_result) > 0)
        {
            $row = mysqli_fetch_assoc($query_result);

            $product_id = $row['product_id'];
            $_SESSION['edit_product'] = $product_id;
            $product_name = $row['product_name'];
            $price = $row['price'];
            $status = $row['status'];
            $amount = $row['amount'];
            $description = $row['description'];
        }
        else
        {
            $_SESSION['alert_product_notfound'] = true;
            header('location: edit_product_page.php?id='.$_GET['id'].'');
            die();
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
    <title>Edit Product</title>
</head>
<body style="background: #6a11cb;background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<form action="edit_product.php" method="post" enctype="multipart/form-data">
    <section class="vh-100 gradient-custom text">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php 
                
                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_product_cannot_deactive'])
                    {
                        $_SESSION['alert_product_cannot_deactive'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        محصول ثبت شده در یک سفارش، نمیتواند غیرفعال شود.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_failure_editproduct'])
                    {
                        $_SESSION['alert_failure_editproduct'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات تغییر اطلاعات محصول با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_product_notfound'])
                    {
                        $_SESSION['alert_product_notfound'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        محصول مورد نظر جهت ویرایش اطلاعات یافت نشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_editproduct_not_image'])
                    {
                        $_SESSION['alert_editproduct_not_image'] = false;
                        echo '<div dir="rtl" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        فقط فرمت PNG قابل ارسال می باشد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($_SESSION['alert_editproduct_image_under_2mb'])
                    {
                        $_SESSION['alert_editproduct_image_under_2mb'] = false;
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

                                <h2 class="fw-bold mb-2 text-uppercase">Edit Product</h2>
                                <p class="text-white-50 mb-3">پنل تغییر اطلاعات محصول</p>

                                <input class="form-outline form-white form-control form-control-sm mb-1" type="file" accept="image/png" name="upload_file" id="upload_file" required>
                                <label dir="rtl" class="mb-2" for="upload_file">PNG و کمتر از 2 مگابایت</label>

                                <div class="form-outline form-white mb-1">
                                    <label class="form-label form-control-sm" for="product_name">نام محصول </label>
                                    <input name="product_name" maxlength="100" type="text" id="product_name" class="form-control form-control-sm text-center" value="<?php echo $product_name ?>" required/>
                                </div>

                                <div class="form-outline form-white mb-1">
                                    <label class="form-label form-control-sm" for="price">قیمت (تومان)</label>
                                    <input name="price" type="number" id="price" class="form-control form-control-sm text-center" min="1000" value="<?php echo $price ?>" required/>
                                </div>

                                <label class="form-label form-control-sm" for="status">وضعیت</label>
                                <?php
                                echo '<div class="form-outline form-white mb-1">';
                                echo '<select name="status" id="status" onselect="fn1()" class="form-select text-center" aria-label=".form-select-sm example" required>';

                                if ($status == 0)
                                    echo '<option selected value="0">غیرفعال</option>';
                                else
                                    echo '<option value="0">غیرفعال</option>';
                                if ($status == 1)
                                    echo '<option selected value="1">فعال</option>';
                                else
                                    echo '<option value="1">فعال</option>';

                                echo '</select>';
                                echo '</div>';
                                ?>

                                <label class="form-label form-control-sm" for="amount">تعداد</label>

                                <div class="form-outline form-white mb-1">
                                    <input name="amount" id="amount" type="number" min="0" class="form-control form-control-sm text-center" value="<?php echo $amount ?>" required/>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label class="form-label form-control-sm" for="description">توضیحات محصول</label>
                                    <input name="description" maxlength="200" type="text" id="description" class="form-control form-control-sm text-center" value="<?php echo $description ?>" required/>
                                </div>

                                <button name="btn_edit_product" type="submit" class="btn btn-outline-light btn-lg px-5">تغییر</button>

                                <div>
                                    <p class="mb-0 py-3"><a href="../products.php" class="text-white-50 fw-bold">بازگشت به صفحه اصلی</a>
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
