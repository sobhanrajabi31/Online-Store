<?php
session_start();
date_default_timezone_set('Asia/Tehran');

$connection = mysqli_connect('localhost', 'root', '', 'project');

if (!$connection)
    die("<h1>Cannot connect to database</h1>");

class errors
{
    function load_errors()
    {
        $_SESSION['startup'] = true;
        
        // (Profile / Security => Errors)
        
        $_SESSION['alert_change_profile'] = false;
        $_SESSION['alert_change_password'] = false;
        $_SESSION['alert_delete_account'] = false;
        $_SESSION['alert_wrong_confirm_password'] = false;
        $_SESSION['alert_new_password!=confirm_password'] = false;
        $_SESSION['alert_wrong_old_password'] = false;
        $_SESSION['alert_email_or_telephone_exist'] = false;
        $_SESSION['alert_failure_profile'] = false;
        $_SESSION['alert_profile_invalid_telephone'] = false;
        $_SESSION['alert_profile_invalid_password'] = false;
        $_SESSION['alert_security_invalid_password'] = false;
        $_SESSION['alert_editprofile_not_image'] = false;
        $_SESSION['alert_editprofile_image_under_2mb'] = false;

        // (Login => Errors)

        $_SESSION['alert_login_wrong_telephone_or_password'] = false;

        // (Register => Errors)

        $_SESSION['alert_register_wrong_telephone_or_password'] = false;
        $_SESSION['alert_failure_register'] = false;

        $_SESSION['alert_register_invalid_telephone'] = false;
        $_SESSION['alert_register_invalid_password'] = false;

        // (Data Tables => Errors)

        $_SESSION['alert_users_not_found'] = false;
        $_SESSION['alert_products_not_found'] = false;
        $_SESSION['alert_orders_not_found'] = false;
        $_SESSION['alert_contact_not_found'] = false;

        // (CreateUser => Errors)
        
        $_SESSION['alert_exist_createuser'] = false;
        $_SESSION['alert_failure_createuser'] = false;

        $_SESSION['alert_createuser_invalid_telephone'] = false;
        $_SESSION['alert_createuser_invalid_password'] = false;

        $_SESSION['alert_createuser_not_image'] = false;
        $_SESSION['alert_createuser_image_under_2mb'] = false;

        // (CreateAdmin => Errors)

        $_SESSION['alert_exist_createadmin'] = false;
        $_SESSION['alert_failure_createadmin'] = false;

        $_SESSION['alert_createadmin_invalid_telephone'] = false;
        $_SESSION['alert_createadmin_invalid_password'] = false;

        $_SESSION['alert_createadmin_not_image'] = false;
        $_SESSION['alert_createadmin_image_under_2mb'] = false;

        // (CreateManager => Errors)

        $_SESSION['alert_exist_createmanager'] = false;
        $_SESSION['alert_failure_createmanager'] = false;

        $_SESSION['alert_createmanager_invalid_telephone'] = false;
        $_SESSION['alert_createmanager_invalid_password'] = false;

        $_SESSION['alert_createmanager_not_image'] = false;
        $_SESSION['alert_createmanager_image_under_2mb'] = false;

        // (EditUser => Errors)

        $_SESSION['alert_failure_edituser'] = false;

        $_SESSION['alert_failure_edituser_self'] = false;
        $_SESSION['alert_failure_edituser_access'] = false;
        $_SESSION['alert_failure_edituser_notfound'] = false;

        $_SESSION['alert_edituser_not_image'] = false;
        $_SESSION['alert_edituser_image_under_2mb'] = false;


        // (DeleteUser => Errors)

        $_SESSION['alert_failure_users_delete_self'] = false;
        $_SESSION['alert_failure_users_delete_access'] = false;
        $_SESSION['alert_failure_users_delete_order'] = false;
        $_SESSION['alert_success_delete_user'] = false;
        $_SESSION['alert_failure_delete_user'] = false;

        // (CreateProduct => Errors)

        $_SESSION['alert_failure_createproduct'] = false;

        // (EditProduct => Errors)

        $_SESSION['alert_product_cannot_deactive'] = false;
        $_SESSION['alert_failure_editproduct'] = false;
        $_SESSION['alert_product_notfound'] = false;

        $_SESSION['alert_editproduct_not_image'] = false;
        $_SESSION['alert_editproduct_image_under_2mb'] = false;

        // (DeleteProduct => Errors)

        $_SESSION['alert_exist_product_in_orders'] = false;
        $_SESSION['alert_success_delete_product'] = false;
        $_SESSION['alert_failure_delete_product'] = false;

        // (CreateOrder => Errors)

        $_SESSION['alert_not_enough_product_createorder'] = false;
        $_SESSION['alert_failure_createorder'] = false;
        $_SESSION['alert_failure_counting_order'] = false;

        // (EditOrder => Errors)

        $_SESSION['alert_not_enough_product_editorder'] = false;
        $_SESSION['alert_not_enough_product_editorder2'] = false;
        $_SESSION['alert_failure_editorder'] = false;
        $_SESSION['alert_failure_editorder2'] = false;
        $_SESSION['alert_failure_counting_editorder'] = false;
        $_SESSION['alert_order_notfound'] = false;

        // (DeleteOrder => Errors)
        $_SESSION['alert_success_delete_order'] = false;
        $_SESSION['alert_failure_delete_order'] = false;

        // (Cart Data Tables => Errors)

        $_SESSION['alert_order_cart_not_found'] = false;
        $_SESSION['alert_order_cart_history_not_found'] = false;

        // (Purchase => Errors)

        $_SESSION['alert_failure_payment'] = false;

        // (Contact => Messages)

        $_SESSION['alert_contact_sent'] = false;
        $_SESSION['alert_failure_access'] = false;
        $_SESSION['alert_failure_delete_contact'] = false;
        $_SESSION['alert_success_delete_contact'] = false;
    }
}

class statistics
{
    function show_manage_team() // تعداد کاربران به تفکیک مدیران و مشتری
    {
        global $connection;

        $query_check = "select * from users";
        $query_check_result = mysqli_query($connection, $query_check);

        if (mysqli_num_rows($query_check_result) > 0)
        {
            $query_1 = "select access, count(access) as a from users group by access";
            $query_result_1 = mysqli_query($connection, $query_1);
    
            $users = 0;
            $admins = 0;
            $managers = 0;
            $owners = 0;
            $all_users = 0;
    
            while($row = mysqli_fetch_assoc($query_result_1))
            {
                $all_users += $row['a'];
    
                if ($row['access'] == 0)
                    $users = $row['a'];
    
                if ($row['access'] == 1)
                    $admins = $row['a'];
    
                if ($row['access'] == 2)
                    $managers = $row['a'];
    
                if ($row['access'] == 3)
                    $owners = $row['a'];
    
            }
            echo "کل کاربران: " . $all_users . "<br>";
            echo "مالک فروشگاه: " . $owners . "<br>";
            echo "مدیرکل: " . $managers . "<br>";
            echo "ادمین: " . $admins . "<br>";
            echo "کاربران: " . $users . "<br>";
        }
        else
        {
            echo 'کاربری یافت نشد';
            echo '<br>';
            echo '<br>';
        }
    }

    function products_details() // تعداد محصولات به تفکیک فعال و غیرفعال و تعداد سفارشات
    {
        global $connection;

        $query_check = "select * from products";
        $query_check_result = mysqli_query($connection, $query_check);

        if (mysqli_num_rows($query_check_result) > 0)
        {
            $query_2 = "select status, count(status) as b from products group by status";
            $query_3 = "select order_id, count(order_id) as c from orders,products where products.product_id=orders.product_id_fk";
    
            $query_result_2 = mysqli_query($connection, $query_2);
            $query_result_3 = mysqli_query($connection, $query_3);
    
            $active = 0;
            $not_active = 0;
    
            while($row = mysqli_fetch_assoc($query_result_2))
            {
                if ($row['status'] == 0)
                    $not_active = $row['b'];
                if ($row['status'] == 1)
                    $active = $row['b'];
            }
    
            $row_order = mysqli_fetch_assoc($query_result_3);
    
            $all_orders = $row_order['c'];
            $all_products = $active + $not_active;
    
            echo "کل سفارشات: " . $all_orders . "<br>";
            echo "کل محصولات: " . $all_products . "<br>";
            echo "فعال ها: " . $active . "<br>";
            echo "غیرفعال ها: " . $not_active . "<br>";
        }
        else
        {
            echo 'محصولی یافت نشد';
            echo '<br>';
            echo '<br>';
        }
    }

    function products_prices() // تعداد سفارشات و مبلغ کل آن
    {
        global $connection;

        $query_check = "select * from orders";
        $query_check_result = mysqli_query($connection, $query_check);

        if (mysqli_num_rows($query_check_result) > 0)
        {
            $query_3 = "select order_id, count(order_id) as c from orders,products where products.product_id=orders.product_id_fk";
            $query_4 = "select sum(orders.price) as d from orders";
        
            $query_result_3 = mysqli_query($connection, $query_3);
            $query_result_4 = mysqli_query($connection, $query_4);
        
            $row_order = mysqli_fetch_assoc($query_result_3);
        
            $all_orders = $row_order['c'];
        
            $row_price = mysqli_fetch_assoc($query_result_4);
            $all_prices = $row_price['d'];
        
            echo "کل سفارشات: " . $all_orders . "<br>";
            echo "کل هزینه ها: " . number_format($all_prices) . "<br>";
        }
        else
            echo 'سفارشی یافت نشد';

    }

    function most_active_user() // فعال ترین کاربر
    {
        global $connection;

        $query_check = "select * from users,orders";
        $query_check_result = mysqli_query($connection, $query_check);

        if (mysqli_num_rows($query_check_result) > 0)
        {
            $query_5 = "select display_name, telephone, count(user_id) as tedad from users,orders where users.user_id=orders.user_id_fk group by user_id, telephone, display_name order by tedad,orders.price desc limit 1";
            $query_result_5 = mysqli_query($connection, $query_5);

            $row = mysqli_fetch_assoc($query_result_5);

            echo "نام: " . $row['display_name'] . "<br>";
            echo "شماره تلفن: " . $row['telephone'] . "<br>";
        }
        else
            echo 'کاربری برای نمایش وجود ندارد';
    }
}

class permissions
{
    function check_permission_manual()
    {
        if (isset($_SESSION['telephone']) and (($_SESSION['access'] == 1 or $_SESSION['access'] == 2 or $_SESSION['access'] == 3)))
            return true;
    }

    function check_permission_manager()
    {
        if (isset($_SESSION['telephone']) and (($_SESSION['access'] == 2 or $_SESSION['access'] == 3)))
            return true;
    }

    function check_permission_owner()
    {
        if (isset($_SESSION['telephone']) and $_SESSION['access'] == 3)
            return true;
    }
}

class forms
{
    function login($telephone, $password)
    {
        $errors = new errors();
        $errors->load_errors();

        global $connection;
        $query = "select * from users where telephone='$telephone' and password='$password'";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) < 1)
        {
            $_SESSION['alert_login_wrong_telephone_or_password'] = true;
            header('location: login.php');
            die();
        }
        else
        {
            $row = mysqli_fetch_assoc($query_result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['access'] = $row['access'];
            $_SESSION['avatar'] = $row['avatar'];
            $_SESSION['telephone'] = $row['telephone'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['display_name'] = $row['display_name'];
            
            
            $_SESSION['coalr']['user_id'] = $_SESSION['user_id'];

            if ($_SESSION['coalr']['add_status'] == true)
            {
                $_SESSION['coalr']['add_status'] = false;
                $order = new order();
                $order->create_order($_SESSION['coalr']['product_id'], $_SESSION['coalr']['user_id'], $_SESSION['coalr']['amount'], $_SESSION['coalr']['status'], $_SESSION['coalr']['submit_date']);
                header('location: cart.php');
            }
            else
            {
                if ($_SESSION['access'] > 0)
                    header('location: management');
                else
                    header('location: profile_page.php');
            }

        }
    }

    function register($telephone, $password, $address, $email, $display_name)
    {
        $errors = new errors();
        $errors->load_errors();

        if (strlen($_POST['telephone']) < 11)
        {
            $_SESSION['alert_register_invalid_telephone'] = true;
            header('location: register.php');
            die();  
        }
        else if (strlen($_POST['password']) < 4)
        {
            $_SESSION['alert_register_invalid_password'] = true;
            header('location: register.php');
            die();
        }
        
        global $connection;
        $query = "select * from users where telephone='$telephone' or email='$email'";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_register_wrong_telephone_or_password'] = true;
            header('location: register.php');
            die();
        }
        else
        {
            $query_insert = "insert into users values(null, '{$display_name}', DEFAULT, '{$email}', '{$telephone}', '{$address}', 0, '{$password}')";
            $query_result_insert = mysqli_query($connection, $query_insert);

            $query_select = "select * from users where telephone='{$telephone}'";
            $query_result_select = mysqli_query($connection, $query_select);

            $row = mysqli_fetch_assoc($query_result_select);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['avatar'] = $row['avatar'];
            $_SESSION['access'] = 0;
            $_SESSION['telephone'] = $telephone;
            $_SESSION['password'] = $password;
            $_SESSION['address'] = $address;
            $_SESSION['email'] = $email;
            $_SESSION['display_name'] = $display_name;

            $_SESSION['coalr']['user_id'] = $_SESSION['user_id'];

            if ($_SESSION['coalr']['add_status'] == true)
            {
                $_SESSION['coalr']['add_status'] = false;
                $order = new order();
                $order->create_order($_SESSION['coalr']['product_id'], $_SESSION['coalr']['user_id'], $_SESSION['coalr']['amount'], $_SESSION['coalr']['status'], $_SESSION['coalr']['submit_date']);
                header('location: cart.php');
            }
            else
            {
                if ($query_result_insert)
                    header('location: profile_page.php');
                else
                {
                    $_SESSION['alert_failure_register'] = true;
                    header('location: register.php');
                    die();
                }
            }
        }
    }
}

class tables
{
    function users_table()
    {
        global $connection;
        $query = "select * from users";
        $query_result = mysqli_query($connection, $query);


        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_users_not_found'] = false;

            echo '<div class="col-md-12 col-lg-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-dark table-striped table-hover text-center align-items-center justify-content-between">';

            echo '<th>کد کاربر</th>';
            echo '<th>نام نمایشی</th>';
            echo '<th>شماره تلفن</th>';
            echo '<th>رمز عبور</th>';
            echo '<th>آواتار</th>';
            echo '<th>ایمیل</th>';
            echo '<th>آدرس</th>';
            echo '<th>دسترسی</th>';
            echo '<th>ویرایش</th>';
            echo '<th>حذف</th>';

            $hide_char = false;

            if ($_SESSION['access'] != 3)
                $hide_char = true;

            while ($row = mysqli_fetch_assoc($query_result))
            {
                if ($hide_char)
                {
                    $password = "";
                    for($i = 0; $i < strlen($row['password']); $i++)
                        $password .= '*';
                }
                else
                    $password = $row['password'];

                $access = $row['access'];
                if ($row['access'] == 0)
                    $access = 'کاربر';
                else if ($row['access'] == 1)
                    $access = 'ادمین';
                else if ($row['access'] == 2)
                    $access = 'مدیرکل';
                else if ($row['access'] == 3)
                    $access = 'مالک فروشگاه';

                if ($_SESSION['user_id'] == $row['user_id'])
                { // Show logged account with different color
                    echo '<tr class="table-secondary">';
                    echo '<td>'."#".$row["user_id"].'</td>';
                    echo '<td>'.$row["display_name"].'</td>';
                    echo '<td>'."+98 ".$row["telephone"].'</td>';
                    echo '<td>'.$password.'</td>';
                    echo '<td><img width="25px" height="25px" src="../image/users/'.$row['avatar'].'"></td>';
                    echo '<td>'.$row["email"].'</td>';
                    echo '<td>'.$row["address"].'</td>';
                    echo '<td>'.$access.'</td>';
                    echo '<td><a href="users/edit_user_page.php?id='.$row["user_id"].'"><i class="bi bi-pencil-square"></i></a></td>';
                    echo '<td><a href="users/delete_user.php?id='.$row["user_id"].'"><i class="bi bi-x-octagon"></i></a></td>';
                    echo '</tr>';
                }
                else
                {
                    echo '<tr>';
                    echo '<td>'."#".$row["user_id"].'</td>';
                    echo '<td>'.$row["display_name"].'</td>';
                    echo '<td>'."+98 ".$row["telephone"].'</td>';
                    echo '<td>'.$password.'</td>';
                    echo '<td><img width="25px" height="25px" src="../image/users/'.$row['avatar'].'"></td>';
                    echo '<td>'.$row["email"].'</td>';
                    echo '<td>'.$row["address"].'</td>';
                    echo '<td>'.$access.'</td>';
                    echo '<td><a href="users/edit_user_page.php?id='.$row["user_id"].'"><i class="bi bi-pencil-square"></i></a></td>';
                    echo '<td><a href="users/delete_user.php?id='.$row["user_id"].'"><i class="bi bi-x-octagon"></i></a></td>';
                    echo '</tr>';
                }
            }

            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        else
            $_SESSION['alert_users_not_found'] = true;
    }

    function products_table()
    {
        global $connection;
        $query = "select * from products";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_products_not_found'] = false;

            echo '<div class="container py-1">';
            echo '<div class="col-md-12 col-lg-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-dark table-striped table-hover text-center align-items-center justify-content-between">';

            echo '<th>کد محصول</th>';
            echo '<th>نام محصول</th>';
            echo '<th>قیمت</th>';
            echo '<th>وضعیت</th>';
            echo '<th>تعداد</th>';
            echo '<th>تصویر</th>';
            echo '<th>توضیحات</th>';
            echo '<th>ویرایش</th>';
            echo '<th>حذف</th>';

            while ($row = mysqli_fetch_assoc($query_result))
            {
                if ($row['status'] == 0)
                    $status = '<span class="text-danger">غیرفعال</span>';
                else if ($row['status'] == 1)
                    $status = '<span class="text-success">فعال</span>';

                echo '<tr>';
                echo '<td>'."#".$row["product_id"].'</td>';
                echo '<td>'.$row["product_name"].'</td>';
                echo '<td>'.number_format($row["price"])."T".'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td>'.$row['amount'].'</td>';
                
                
                echo '<td><a href="../image/products/'.$row['picture'].'"><img width="25px" height="25px" src="../image/products/'.$row['picture'].'"></a></td>';
                echo '<td>'.$row["description"].'</td>';
                echo '<td><a href="products/edit_product_page.php?id='.$row["product_id"].'"><i class="bi bi-pencil-square"></i></a></td>';
                echo '<td><a href="products/delete_product.php?id='.$row["product_id"].'"><i class="bi bi-x-octagon"></i></a></td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        else
            $_SESSION['alert_products_not_found'] = true;
    }

    function orders_table()
    {
        global $connection;
        $query = "select * from orders";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_orders_not_found'] = false;

            echo '<div class="container py-1">';
            echo '<div class="col-md-12 col-lg-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-dark table-striped table-hover text-center align-items-center justify-content-between">';

            echo '<th>کد سفارش</th>';
            echo '<th>کد محصول</th>';
            echo '<th>کد کاربر</th>';
            echo '<th>نام محصول</th>';
            echo '<th>تعداد</th>';
            echo '<th><div data-toggle="tooltip" data-placement="top" title="هزینه یک محصول * تعداد سفارش">هزینه کل</div></th>';
            echo '<th>وضعیت</th>';
            echo '<th>تاریخ ثبت سفارش</th>';
            echo '<th>تاریخ پرداخت سفارش</th>';
            echo '<th>کد پرداخت</th>';
            echo '<th>کد رهگیری</th>';
            echo '<th>ویرایش</th>';
            echo '<th>حذف</th>';

            while ($row = mysqli_fetch_assoc($query_result))
            {
                $status = $row['status'];
                if ($row['status'] == 0)
                    $status = '<span class="text-danger">پرداخت نشده</span>';
                else if ($row['status'] == 1)
                    $status = '<span class="text-success">پرداخت شده</span>';

                $query_product = "select * from products where product_id=".$row["product_id_fk"]."";
                $query_product_result = mysqli_query($connection, $query_product);

                $row_product = mysqli_fetch_assoc($query_product_result);

                echo '<tr>';
                echo '<td>'."#".$row["order_id"].'</td>';
                echo '<td>'."#".$row["product_id_fk"].'</td>';
                echo '<td>'."#".$row["user_id_fk"].'</td>';
                echo '<td>'.$row_product["product_name"].'</td>';
                echo '<td>'.$row["amount"].'</td>';
                echo '<td>'.number_format($row["price"])."T".'</td>';
                echo '<td>'.$status.'</td>';

                if ($row['submit_date'] == null or $row['submit_date'] == '0000-00-00 00:00:00')
                    echo '<td>تاریخی ثبت نشده است</td>';
                else if ($row['submit_date'] != null)
                    echo '<td>'.$row['submit_date'].'</td>';

                if ($row['payment_date'] == null or $row['payment_date'] == '0000-00-00 00:00:00')
                    echo '<td>تاریخی ثبت نشده است</td>';
                else if ($row['payment_date'] != null)
                    echo '<td>'.$row['payment_date'].'</td>';

                if ($row['status'] == 0 and ($row['payment_id'] == null))
                    echo '<td>-</td>';
                else if ($row['payment_id'] != null)
                    echo '<td>'.$row['payment_id'].'</td>';

                if ($row['status'] == 0 and ($row['tracking_id'] == null))
                    echo '<td>-</td>';
                else if ($row['tracking_id'] != null)
                    echo '<td>'.$row['tracking_id'].'</td>';


                if ($row['status'] == 0)
                {
                    echo '<td><a href="orders/edit_order_page.php?id='.$row["order_id"].'"><i class="bi bi-pencil-square"></i></a></td>';
                    echo '<td><a href="orders/delete_order.php?id='.$row["order_id"].'"><i class="bi bi-x-octagon"></i></a></td>';
                }
                else
                {
                    echo '<td><p><i class="bi bi-pencil-square"></i></p></td>';
                    echo '<td><p><i class="bi bi-x-octagon"></i></p></td>';
                }

                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        else
            $_SESSION['alert_orders_not_found'] = true;
    }

    function contact_table()
    {
        global $connection;
        $query = "select * from contact";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_contact_not_found'] = false;

            echo '<div class="container py-1">';
            echo '<div class="col-md-12 col-lg-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-dark table-striped table-hover text-center align-items-center justify-content-between">';

            echo '<th>کد پیام</th>';
            echo '<th>نام و نام خانوادگی</th>';
            echo '<th>شماره تلفن</th>';
            echo '<th>ایمیل</th>';
            echo '<th>پیام</th>';
            echo '<th>حذف</th>';

            while ($row = mysqli_fetch_assoc($query_result))
            {
                // $query_message = "select * from contact where message_id=".$row["messsage_id"]."";
                // $query_message_result = mysqli_query($connection, $query_message);

                // $row_product = mysqli_fetch_assoc($query_message_result);

                echo '<tr>';
                echo '<td>'."#".$row["message_id"].'</td>';
                echo '<td>'.$row["username"].'</td>';
                if ($row['telephone'] != "")
                    echo '<td>'.$row["telephone"].'</td>';
                else
                    echo '<td>-</td>';
                echo '<td>'.$row["email"].'</td>';
                echo '<td>'.$row["message"].'</td>';
                echo '<td><a href="../delete_contact.php?id='.$row["message_id"].'"><i class="bi bi-x-octagon"></i></a></td>';

                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        else
            $_SESSION['alert_contact_not_found'] = true;
    }
}

class users
{
    function create_user($telephone, $password, $address, $email, $display_name)
    {
        global $connection;
        $query = "select * from users where telephone='$telephone' or email='$email'";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_exist_createuser'] = true;
            header('location: create_user_page.php');
            die();
        }
        else
        {
            $query_insert = "insert into users values(null, '{$display_name}', null, '{$email}', '{$telephone}', '{$address}', 0, '{$password}')";
            $query_result_insert = mysqli_query($connection, $query_insert);

            if ($query_result_insert)
                header('location: ../users.php');
            else
            {
                $_SESSION['alert_failure_createuser'] = true;
                header('location: create_user_page.php');
                die();
            }
        }
    }

    function create_admin($telephone, $password, $address, $email, $display_name)
    {
        global $connection;
        $query = "select * from users where telephone='$telephone' or email='$email'";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_exist_createadmin'] = true;
            header('location: create_admin_page.php');
            die();
        }
        else
        {
            $query_insert = "insert into users values(null, '{$display_name}', null, '{$email}', '{$telephone}', '{$address}', 1, '{$password}')";
            $query_result_insert = mysqli_query($connection, $query_insert);

            if ($query_result_insert)
                header('location: management/users.php');
            else
            {
                $_SESSION['alert_failure_createadmin'] = true;
                header('location: create_admin_page.php');
                die();
            }
        }
    }

    function create_manager($telephone, $password, $address, $email, $display_name)
    {
        global $connection;
        $query = "select * from users where telephone='$telephone' or email='$email'";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_exist_createmanager'] = true;
            header('location: create_manager_page.php');
            die();
        }
        else
        {
            $query_insert = "insert into users values(null, '{$display_name}', null, '{$email}', '{$telephone}', '{$address}', 2, '{$password}')";
            $query_result_insert = mysqli_query($connection, $query_insert);

            if ($query_result_insert)
                header('location: management/users.php');
            else
            {
                $_SESSION['alert_failure_createmanager'] = true;
                header('location: create_manager_page.php');
                die();
            }
        }
    }

    function edit_user($telephone, $password, $address, $email, $display_name, $access)
    {
        global $connection;

        $edit_user = $_SESSION['edit_user'];

        $query = "update users set telephone='$telephone', password='$password', address='$address', email='$email', display_name='$display_name', access='$access' where user_id='$edit_user'";
        $query_result = mysqli_query($connection, $query);

        if ($query_result)
            header('location: ../users.php');
        else
        {
            $_SESSION['alert_failure_edituser'] = true;
            header('location: edit_user_page.php?id='.$edit_user.'');
            die();
        }
    }

    function delete_user($id)
    {
        global $connection;
        $query = "select * from users where user_id='".$_GET['id']."'";
        $query_result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($query_result);

        if ($_SESSION['user_id'] == $id)
        {
            $_SESSION['alert_failure_users_delete_self'] = true;
            header('location: ../users.php');
            die();
        }
        else
        {
            if ($_SESSION['access'] <= $row['access'])
            {
                $_SESSION['alert_failure_users_delete_access'] = true;
                header('location: ../users.php');
                die();
            }
            else
            {
                $query_select = "select * from users,orders where users.user_id=orders.user_id_fk and users.user_id='$id'";
                $query_select_result = mysqli_query($connection, $query_select);

                if (mysqli_num_rows($query_select_result) > 0)
                {
                    $_SESSION['alert_failure_users_delete_order'] = true;
                    header('location: ../users.php');
                    die();
                }
                else
                {
                    $query_delete = "delete from users where user_id='$id'";
                    $result = mysqli_query($connection, $query_delete);
                    
                    if ($result)
                    {
                        rename(('../../image/users/' . $id . '.png'), ('../../image/users/deleted/' . $id . '.png'));

                        $_SESSION['alert_success_delete_user'] = true;
                        header('location: ../users.php');
                        die();
                    }
                    else
                    {
                        $_SESSION['alert_failure_delete_user'] = true;
                        header('location: ../users.php');
                        die();
                    }
                }

            }
        }
    }
}

class product
{
    function create_product($product_name, $price, $status, $amount, $description)
    {
        global $connection;

        $query_insert = "insert into products values(null, '$product_name', '$price', '$status', '$amount', DEFAULT, '$description')";
        $query_result_insert = mysqli_query($connection, $query_insert);

        if (!$query_result_insert)
        {
            $_SESSION['alert_failure_createproduct'] = true;
            header('location: create_product_page.php');
            die();
        }
        else
            header('location: management/products.php');
    }

    function edit_product($product_name, $price, $status, $amount, $description)
    {
        global $connection;

        $edit_product = $_SESSION['edit_product'];

        $query_select = "select * from products,orders where products.product_id=orders.product_id_fk and products.product_id='$edit_product'";
        $query_select_result = mysqli_query($connection, $query_select);

        if (mysqli_num_rows($query_select_result) > 0 and $status == 0)
        {
            $_SESSION['alert_product_cannot_deactive'] = true;
            header('location: edit_product_page.php?id='.$edit_product.'');
            die();
        }

        $query = "update products set product_name='$product_name', price='$price', status='$status', amount='$amount', description='$description' where product_id='$edit_product'";
        $query_result = mysqli_query($connection, $query);

        if ($query_result)
            header('location: ../products.php');
        else
        {
            $_SESSION['alert_failure_editproduct'] = true;
            header('location: edit_product_page.php?id='.$edit_product.'');
            die();
        }
    }

    function delete_product($id)
    {
        global $connection;

        $query_select = "select * from products,orders where products.product_id=orders.product_id_fk and products.product_id='$id'";
        $query_select_result = mysqli_query($connection, $query_select);

        if (mysqli_num_rows($query_select_result) > 0)
        {
            $_SESSION['alert_exist_product_in_orders'] = true;
            header('location: ../products.php');
            die();
        }
        else
        {
            $query_delete = "delete from products where product_id='$id'";
            $result = mysqli_query($connection, $query_delete);
            
            if ($result)
            {
                rename(('../../image/products/' . $id . '.png'), ('../../image/products/deleted/' . $id . '.png'));

                $_SESSION['alert_success_delete_product'] = true;
                header('location: ../products.php');
                die();
            }
            else
            {
                $_SESSION['alert_failure_delete_product'] = true;
                header('location: ../products.php');
                die();
            }
        }
    }
}

class order
{
    function create_order($product_id, $user_id, $amount, $status, $submit_date)
    {
        global $connection;

        $query_amount = "select amount from products where product_id='$product_id'";
        $query_amount_result = mysqli_query($connection, $query_amount);

        $row_amount = mysqli_fetch_assoc($query_amount_result);

        if (($row_amount['amount'] - $amount) < 0)
        {
            $_SESSION['alert_not_enough_product_createorder'] = true;
            header('location: create_order_page.php');
            die();
        }
        else
        {
            $finally_amount = (int)$row_amount['amount'] - (int)$amount;

            $query_update_amount = "update products set amount='$finally_amount' where product_id='$product_id'";
            $query_update_amount_result = mysqli_query($connection, $query_update_amount);

            if (!$query_update_amount_result)
            {
                $_SESSION['alert_failure_counting_order'] = true;
                header('location: create_order_page.php');
                die();
            }
        }

        $query_select = "select * from products where product_id='$product_id'";
        $query_select_result = mysqli_query($connection, $query_select);

        $row_select = mysqli_fetch_assoc($query_select_result);

        $amount_price = $amount;
        $product_price = $row_select['price'];

        $finally_price = (int)$product_price * (int)$amount_price;

        $query_insert = "insert into orders values(null, '$product_id', '$user_id', '$finally_price', '$amount', '$status', '$submit_date', null, null, null)";
        $query_insert_result = mysqli_query($connection, $query_insert);

        if ($query_insert_result)
            header('location: orders.php');
        else
        {
            $_SESSION['alert_failure_createorder'] = true;
            header('location: create_order_page.php');
            die();
        }
    }

    function edit_order($product_id, $user_id, $amount, $status, $submit_date)
    {
        global $connection;

        $edit_order = $_SESSION['edit_order'];

        $query_amount = "select amount from products where product_id='$product_id'";
        $query_amount_result = mysqli_query($connection, $query_amount);

        $row_amount = mysqli_fetch_assoc($query_amount_result);

        if (($row_amount['amount'] - $amount) < 0)
        {
            $_SESSION['alert_not_enough_product_editorder'] = true;
            header('location: edit_order_page.php?id='.$edit_order.'');
            die();
        }
        else
        {
            $finally_amount = (int)$row_amount['amount'] - (int)$amount;

            $query_update_amount = "update products set amount='$finally_amount' where product_id='$product_id'";
            $query_update_amount_result = mysqli_query($connection, $query_update_amount);

            if ($query_update_amount_result)
                header('location: orders.php');
            else
            {
                $_SESSION['alert_failure_counting_editorder'] = true;
                header('location: edit_order_page.php?id='.$edit_order.'');
                die();
            }

            $query_select = "select * from products where product_id='$product_id'";
            $query_select_result = mysqli_query($connection, $query_select);
        
            $row_select = mysqli_fetch_assoc($query_select_result);
        
            $amount_price = $amount;
            $product_price = $row_select['price'];
        
        
            $finally_price = (int)$product_price * (int)$amount_price;
        
            $edit_order = $_SESSION['edit_order'];
        
            $query = "update orders set product_id_fk='$product_id', user_id_fk='$user_id', price='$finally_price', amount='$amount', status='$status', submit_date='$submit_date' where order_id='$edit_order'";
            $query_result = mysqli_query($connection, $query);
        
            if ($query_result)
                header('location: ../orders.php');
            else
            {
                $_SESSION['alert_failure_editorder'] = true;
                header('location: edit_order_page.php?id='.$edit_order.'');
                die();
            }
        }
    }

    function delete_order($id)
    {
        global $connection;

        $query = "select * from orders where order_id=$id";
        $query_result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($query_result);
        $row_amount_orders = $row['amount'];

        if ($row['status'] == 0)
        {
            $product_id = $row['product_id_fk'];

            $query_select = "select * from products where product_id=$product_id";
            $query_select_result = mysqli_query($connection, $query_select);

            $row = mysqli_fetch_assoc($query_select_result);

            $query = "delete from orders where order_id='$id'";
            $result = mysqli_query($connection, $query);
            if ($result)
            {
                $row_amount_products = $row['amount'];
                $amount = $row_amount_orders + $row_amount_products;

                $query_insert = "update products set amount=$amount where product_id=$product_id";
                $query_insert_result = mysqli_query($connection, $query_insert);
            
                $_SESSION['alert_success_delete_order'] = true;
                header('location: ../orders.php');
                die();
            }
            else
            {
                $_SESSION['alert_failure_delete_order'] = true;
                header('location: ../orders.php');
                die();
            }
        }
    }
}

class cart 
{
    function orders_table_cart()
    {
        global $connection;
        $query = "select * from orders, users where users.user_id={$_SESSION['user_id']} and users.user_id=orders.user_id_fk and status=0";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_order_cart_not_found'] = false;

            echo '<div id="show_list">';
            echo '<div class="container py-1">';
            echo '<div class="card bg-dark text-light border-light">';
            echo '<div class="card-header text-center">';
            echo '<a class="btn btn-light" data-bs-toggle="collapse" href="#list">لیست سفارشات</a>';
            echo '</div>';
            echo '<div id="list" class="collapse show" data-bs-parent="#show_list">';
            echo '<div class="card-body">';
            echo '<div class="col-md-12 col-lg-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-dark table-striped table-hover text-center align-items-center justify-content-between">';

            echo '<th>کد سفارش</th>';
            echo '<th>کد محصول</th>';
            echo '<th>کد کاربر</th>';
            echo '<th>نام محصول</th>';
            echo '<th>تصویر محصول</th>';
            echo '<th>تعداد</th>';
            echo '<th><div data-toggle="tooltip" data-placement="top" title="هزینه یک محصول * تعداد سفارش">هزینه کل</div></th>';
            echo '<th>وضعیت</th>';
            echo '<th>تاریخ ثبت سفارش</th>';
            echo '<th>تاریخ پرداخت سفارش</th>';
            echo '<th>کد پرداخت</th>';
            echo '<th>کد رهگیری</th>';
            echo '<th>حذف</th>';

            while ($row = mysqli_fetch_assoc($query_result))
            {
                $status = $row['status'];
                if ($row['status'] == 0)
                    $status = '<span class="text-danger">پرداخت نشده</span>';
                else if ($row['status'] == 1)
                    $status = '<span class="text-success">پرداخت شده</span>';

                $query_product = "select * from products where product_id=".$row["product_id_fk"]."";
                $query_product_result = mysqli_query($connection, $query_product);

                $row_product = mysqli_fetch_assoc($query_product_result);

                echo '<tr>';
                echo '<td>'."#".$row["order_id"].'</td>';
                echo '<td>'."#".$row["product_id_fk"].'</td>';
                echo '<td>'."#".$row["user_id_fk"].'</td>';
                echo '<td>'.$row_product["product_name"].'</td>';
                echo '<td><a href="../image/products/'.$row_product['picture'].'"><img width="25px" height="25px" src="../image/products/'.$row_product['picture'].'"></a></td>';
                echo '<td>'.$row["amount"].'</td>';
                echo '<td>'.number_format($row["price"])."T".'</td>';
                echo '<td>'.$status.'</td>';

                if ($row['submit_date'] == null or $row['submit_date'] == '0000-00-00 00:00:00')
                    echo '<td>تاریخی ثبت نشده است</td>';
                else if ($row['submit_date'] != null)
                    echo '<td>'.$row['submit_date'].'</td>';

                if ($row['status'] == 0 and ($row['payment_date'] == null or $row['payment_date'] == '0000-00-00 00:00:00'))
                    echo '<td>تاریخی ثبت نشده است</td>';
                else if ($row['payment_date'] != null)
                    echo '<td>'.$row['payment_date'].'</td>';

                if ($row['status'] == 0 and ($row['payment_id'] == null))
                    echo '<td>-</td>';
                else if ($row['payment_id'] != null)
                    echo '<td>'.$row['payment_id'].'</td>';

                if ($row['status'] == 0 and ($row['tracking_id'] == null))
                    echo '<td>-</td>';
                else if ($row['tracking_id'] != null)
                    echo '<td>'.$row['tracking_id'].'</td>';



                if ($row['status'] == 0)
                {
                    echo '<td><form action="management/orders/delete_order.php?id='.$row["order_id"].'" method="post">
                    <button name="btn_delete_order_cart" type="submit" class="btn btn-primary"><i class="bi bi-x-octagon"></i></a></td></button>
                    </form></td>';
                }
                else
                    echo '<td><button name="btn_delete_order_cart" type="submit" class="btn btn-primary" disabled><i class="bi bi-x-octagon"></i></a></td></button></td>';

                echo '</tr>';
            }

            echo '</table>';

            $query_check = "select * from orders, users where users.user_id={$_SESSION['user_id']} and users.user_id=orders.user_id_fk and status=0";
            $query_check_result = mysqli_query($connection, $query_check);

            if (mysqli_num_rows($query_check_result) > 0)
            {
                $query_factor = "select sum(orders.price) as factor from orders, users where users.user_id={$_SESSION['user_id']} and users.user_id=orders.user_id_fk and status=0";
                $query_factor_result = mysqli_query($connection, $query_factor);

                $row_factor = mysqli_fetch_assoc($query_factor_result);

                $factor = number_format($row_factor['factor']) . " تومان";

                echo '<form action="payment.php" method="post">
                <div class="container p-3 text-center">
                    <button name="btn_purchase" class="button btn btn-success">مبلغ قابل پرداخت: '.$factor.'</button>
                </div>
                </form>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        else
            $_SESSION['alert_order_cart_not_found'] = true;
    }

    function orders_cart_history()
    {
        global $connection;
        $query = "select * from orders, users where users.user_id={$_SESSION['user_id']} and users.user_id=orders.user_id_fk and status=1";
        $query_result = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_result) > 0)
        {
            $_SESSION['alert_order_cart_history_not_found'] = false;

            echo '<div id="history">';
            echo '<div class="container py-1">';
            echo '<div class="card bg-dark text-light border-light">';
            echo '<div class="card-header text-center">';
            echo '<a class="btn btn-light" data-bs-toggle="collapse" href="#show_history">تاریخچه پرداخت</a>';
            echo '</div>';
            echo '<div id="show_history" class="collapse show" data-bs-parent="#history">';
            echo '<div class="card-body">';
            echo '<div class="col-md-12 col-lg-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-dark table-striped table-hover text-center align-items-center justify-content-between">';

            echo '<th>کد سفارش</th>';
            echo '<th>کد محصول</th>';
            echo '<th>کد کاربر</th>';
            echo '<th>نام محصول</th>';
            echo '<th>عکس محصول</th>';
            echo '<th>تعداد</th>';
            echo '<th><div data-toggle="tooltip" data-placement="top" title="هزینه یک محصول * تعداد سفارش">هزینه کل</div></th>';
            echo '<th>وضعیت</th>';
            echo '<th>تاریخ ثبت سفارش</th>';
            echo '<th>تاریخ پرداخت سفارش</th>';
            echo '<th>کد پرداخت</th>';
            echo '<th>کد رهگیری</th>';

            while ($row = mysqli_fetch_assoc($query_result))
            {
                $status = $row['status'];
                if ($row['status'] == 0)
                    $status = '<span class="text-danger">پرداخت نشده</span>';
                else if ($row['status'] == 1)
                    $status = '<span class="text-success">پرداخت شده</span>';

                $query_product = "select * from products where product_id=".$row["product_id_fk"]."";
                $query_product_result = mysqli_query($connection, $query_product);

                $row_product = mysqli_fetch_assoc($query_product_result);

                echo '<tr>';
                echo '<td>'."#".$row["order_id"].'</td>';
                echo '<td>'."#".$row["product_id_fk"].'</td>';
                echo '<td>'."#".$row["user_id_fk"].'</td>';
                echo '<td>'.$row_product["product_name"].'</td>';
                echo '<td><a href="../image/products/'.$row_product['picture'].'"><img width="25px" height="25px" src="../image/products/'.$row_product['picture'].'"></a></td>';
                echo '<td>'.$row["amount"].'</td>';
                echo '<td>'.number_format($row["price"])."T".'</td>';
                echo '<td>'.$status.'</td>';

                if ($row['submit_date'] == null or $row['submit_date'] == '0000-00-00 00:00:00')
                    echo '<td>تاریخی ثبت نشده است</td>';
                else if ($row['submit_date'] != null)
                    echo '<td>'.$row['submit_date'].'</td>';

                if ($row['status'] == 1 and ($row['payment_date'] == null or $row['payment_date'] == '0000-00-00 00:00:00'))
                    echo '<td>تاریخی ثبت نشده است</td>';
                else if ($row['payment_date'] != null)
                    echo '<td>'.$row['payment_date'].'</td>';

                if ($row['status'] == 0 and ($row['payment_id'] == null))
                    echo '<td>-</td>';
                else if ($row['payment_id'] != null)
                    echo '<td>'.$row['payment_id'].'</td>';

                if ($row['status'] == 0 and ($row['tracking_id'] == null))
                    echo '<td>-</td>';
                else if ($row['tracking_id'] != null)
                    echo '<td>'.$row['tracking_id'].'</td>';

                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        else
            $_SESSION['alert_order_cart_history_not_found'] = true;
    }

    function delete_order_cart($id)
    {
        global $connection;

        $query = "select * from orders where order_id=$id";
        $query_result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($query_result);
        $row_amount_orders = $row['amount'];

        if ($row['status'] == 0)
        {
            $product_id = $row['product_id_fk'];

            $query_select = "select * from products where product_id=$product_id";
            $query_select_result = mysqli_query($connection, $query_select);

            $row = mysqli_fetch_assoc($query_select_result);

            $row_amount_products = $row['amount'];
            $amount = $row_amount_orders + $row_amount_products;

            $query_insert = "update products set amount=$amount where product_id=$product_id";
            $query_insert_result = mysqli_query($connection, $query_insert);
        }

        $query = "delete from orders where order_id='$id'";
        mysqli_query($connection, $query);
        $tables = new tables();
        $tables->orders_table();
    }

    function payment()
    {
        // in ghesmat ba api takmil mishavad

        global $connection;

        $payment_date = date("Y-m-d H:i:s");

        $query = "update orders,users set status=1, payment_date='$payment_date', payment_id='".rand()."', tracking_id='".rand()."' where users.user_id={$_SESSION['user_id']} and users.user_id=orders.user_id_fk and status=0";
        $query_result = mysqli_query($connection, $query);

        if ($query_result)
            header('location: cart.php');
        else
        {
            $_SESSION['alert_failure_payment'] = true;
            header('location: cart.php');
            die();
        }
    }
}

class contact
{
    function contact($username, $telephone, $email, $message)
    {
        global $connection;

        $query = "insert into contact values(null, '$username', '$telephone', '$email', '$message')";
        $query_result = mysqli_query($connection, $query);


        if ($query_result)
        {
            $_SESSION['alert_contact_sent'] = true;
            header('location: aboutus.php');
            die();
        }
    }

    function delete_contact($message_id)
    {
        global $connection;

        $query = "delete from contact where message_id='$message_id'";
        $query_result = mysqli_query($connection, $query);

        if ($query_result)
        {
            $_SESSION['alert_success_delete_contact'] = true;
            header('location: management/contact.php');
            die();
        }
        else
        {
            $_SESSION['alert_failure_delete_contact'] = true;
            header('location: management/contact.php');
            die();
        }
    }
}

class profile
{
    function edit_profile($display_name, $email, $telephone, $address)
    {
        global $connection;

        $query_check = "select * from users where telephone='$telephone' or email='$email'";
        $query_check_result = mysqli_query($connection, $query_check);

        $row = mysqli_fetch_assoc($query_check_result);

        if (mysqli_num_rows($query_check_result) > 0 and ($_SESSION['telephone'] != $row['telephone'] or $_SESSION['email'] != $row['email']))
        {
            $_SESSION['alert_email_or_telephone_exist'] = true;
            header('location: profile_page.php');
            die();
        }

        $query = "update users set display_name='$display_name', email='$email', telephone='$telephone', address='$address' where telephone='".$_SESSION['telephone']."'";
        $query_result = mysqli_query($connection, $query);

        $query_select = "select * from users where telephone='$telephone'";
        $query_select_result = mysqli_query($connection, $query_select);

        $row = mysqli_fetch_assoc($query_select_result);

        $_SESSION['display_name'] = $row['display_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telephone'] = $row['telephone'];
        $_SESSION['address'] = $row['address'];

        if ($query_result)
        {
            $_SESSION['alert_change_profile'] = true;
        }
        else
        {
            $_SESSION['alert_failre_profile'] = true;
            header('location: profile_page.php');
            die();
        }
    }

    function change_password($new_password)
    {
        global $connection;

        $query = "update users set password='$new_password' where telephone='".$_SESSION['telephone']."'";
        $query_result = mysqli_query($connection, $query);

        $_SESSION['password'] = $new_password;

        if ($query_result)
        {
            $_SESSION['alert_change_password'] = true;
            header('location: security_page.php');
            die();
        }
        else
        {
            $_SESSION['alert_failre_profile'] = true;
            header('location: security_page.php');
            die();
        }
    }

    function delete_account()
    {
        global $connection;

        $query_delete_orders = "delete from orders where user_id_fk='".$_SESSION['user_id']."'";
        $query_delete_orders_result = mysqli_query($connection, $query_delete_orders);

        $query_delete_users = "delete from users where telephone='".$_SESSION['telephone']."'";
        $query_delete_users_result = mysqli_query($connection, $query_delete_users);

        if ($query_delete_orders_result and $query_delete_users_result)
        {
            $_SESSION['alert_delete_account'] = true;

            rename(('image/users/' . $_SESSION['user_id'] . '.png'), ('image/users/deleted/' . $_SESSION['user_id'] . '.png'));

            unset($_SESSION['avatar']);
            unset($_SESSION['access']);
            unset($_SESSION['telephone']);
            unset($_SESSION['password']);
            unset($_SESSION['address']);
            unset($_SESSION['email']);
            unset($_SESSION['display_name']);
            unset($_SESSION['user_id']);

            header('location: index.php');
        }
    }
}

class save
{
    function save_user_image($temp_directory, $profile)
    {
        global $connection;
        
        $query = "select * from users where telephone='".$_POST['telephone']."'";
        $query_result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($query_result);

        $directory = @'../../image/users/';
        $file_name = ($row['user_id'] . ".png");

        if ($profile == 1)
            $directory = @'image/users/';

        $query_update = "update users set avatar='$file_name' where telephone='".$_POST['telephone']."'";
        $query_update_result = mysqli_query($connection, $query_update);

        $check = move_uploaded_file($temp_directory, ($directory . $file_name));
        if ($check)
            $_SESSION['avatar'] = $file_name;
    }

    function save_product_image($temp_directory, $id)
    {
        global $connection;
        
        $query = "select * from products where product_id='".$id."'";
        $query_result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($query_result);

        $directory = @'../../image/products/';
        $file_name = ($id . ".png");

        $query_update = "update products set picture='$file_name' where product_id='".$id."'";
        $query_update_result = mysqli_query($connection, $query_update);

        $check = move_uploaded_file($temp_directory, ($directory . $file_name));
    }
}

?>