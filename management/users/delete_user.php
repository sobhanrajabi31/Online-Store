<?php
include '../../database.php';
$users = new users();
$permissions = new permissions();

if (!$permissions->check_permission_manual())
    header('location: ../../notfound.html');
else
{
    if (isset($_GET['id']))
    {
        $users->delete_user($_GET['id']);
        header('location: ../users.php');
    }
}
?>