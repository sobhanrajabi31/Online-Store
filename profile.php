<?php
include 'database.php';
$save = new save();
$profile = new profile();

if (isset($_SESSION['telephone']) and isset($_POST['btn_change_profile']))
{
	if (strlen($_POST['telephone']) < 11)
    {
        $_SESSION['alert_profile_invalid_telephone'] = true;
        die();  
    }

    if ($_FILES['upload_file']['size'] <= 2000000)
    {
        $image_type = strtolower(pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION));

        if ($image_type == "png")
        {
            $profile->edit_profile($_POST['display_name'], $_POST['email'], $_POST['telephone'], $_POST['address']);
            $save->save_user_image($_FILES['upload_file']['tmp_name'], 1);
        }
        else
        {
            $_SESSION['alert_editprofile_not_image'] = true;
            header('location: profile_page.php');
            die();
        }
    }
    else
    {
        $_SESSION['alert_editprofile_image_under_2mb'] = true;
        header('location: profile_page.php');
        die();
    }
    header('location: profile_page.php');
}
else
	header('location: notfound.html');

?>