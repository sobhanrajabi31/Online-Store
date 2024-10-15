<?php
include '../../database.php';
$save = new save();
$users = new users();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_POST['btn_edit_user']))
    {
        if ($_FILES['upload_file']['size'] <= 2000000)
        {
            $image_type = strtolower(pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION));

            if ($image_type == "png")
            {
                $users->edit_user($_POST['telephone'], md5($_POST['password']), $_POST['address'], $_POST['email'], $_POST['display_name'], $_POST['access']);
                $save->save_user_image($_FILES['upload_file']['tmp_name'], 0);
            }
            else
            {
                $_SESSION['alert_edituser_not_image'] = true;
                header('location: edit_user_page?id='.$_GET['id'].'.php');
                die();
            }
        }
        else
        {
            $_SESSION['alert_edituser_image_under_2mb'] = true;
            header('location: edit_user_page?id='.$_GET['id'].'.php');
            die();
        }
        
        header('location: ../users.php');
    }
}
?>