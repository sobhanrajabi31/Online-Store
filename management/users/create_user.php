<?php
include '../../database.php';
$save = new save();
$users = new users();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_POST['btn_create_user']) and isset($_POST['telephone']))
    {
        if (strlen($_POST['telephone']) < 11)
        {
            $_SESSION['alert_createuser_invalid_telephone'] = true;
            header('location: create_user_page.php');
            die();
        }
        if (strlen($_POST['password']) < 4)
        {
            $_SESSION['alert_createuser_invalid_password'] = true;
            header('location: create_user_page.php');
            die();
        }
        global $connection;

        if ($_FILES['upload_file']['size'] <= 2000000)
        {
            $image_type = strtolower(pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION));

            if ($image_type == "png")
            {
                $users->create_user($_POST['telephone'], md5($_POST['password']), $_POST['address'], $_POST['email'], $_POST['display_name']);
                $save->save_user_image($_FILES['upload_file']['tmp_name'], 0);
            }
            else
            {
                $_SESSION['alert_createuser_not_image'] = true;
                header('location: create_user_page.php');
                die();
            }
        }
        else
        {
            $_SESSION['alert_createuser_image_under_2mb'] = true;
            header('location: create_user_page.php');
            die();
        }
        
        header('location: ../users.php');
    }
}
?>