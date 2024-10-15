<?php
include '../../database.php';
$permissions = new permissions();

if (!$permissions->check_permission_manual())
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

    <script src=”https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js”></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Create Product</title>
</head>
<body>

<form action="create_product.php" method="post">
    <section class="vh-100 gradient-custom text">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <?php 
                
                if (isset($_SESSION['startup']))
                {
                    if ($_SESSION['alert_failure_createproduct'])
                    {
                        $_SESSION['alert_failure_createproduct'] = false;
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        عملیات ایجاد محصول با خطا روبرو شد.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }

                ?>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">

                            <div class="mb-md-5 mt-md-4 pb-1">

                                <h2 class="fw-bold mb-2 text-uppercase">Create Product</h2>
                                <p class="text-white-50 mb-5">پنل ایجاد محصول</p>

                                <div class="form-outline form-white mb-4">
                                    <input name="product_name" maxlength="100" type="text" id="product_name" placeholder="نام محصول" class="form-control form-control-sm text-center" required/>
                                </div>

                                <form>
                                    <div class="form-outline form-white mb-4">
                                        <input name="price" type="number" id="price" placeholder="قیمت به تومان" class="form-control form-control-sm text-center" min="1000" required/>
                                    </div>
                                </form>

                                <div class="form-outline form-white mb-4">
                                        <select name='status' id="status" class='form-select text-center' aria-label='.form-select-sm example' required>
                                            <option selected>وضعیت</option>
                                            <option value="0">غیرفعال</option>
                                            <option value="1">فعال</option>
                                        </select>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="amount" id="amount" type="number" min="0" placeholder="تعداد" class="form-control form-control-sm text-center" required/>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="description" maxlength="200" type="text" id="description" placeholder="توضیحات" class="form-control form-control-sm text-center" required/>
                                </div>

                                <button name="btn_create_product" type="submit" class="btn btn-outline-light btn-lg px-5">ایجاد</button>

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
