<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    require('connect_db.php');
    require('adminlogin_tools.php');

    list ($check, $data) = validate( $dbc, $_POST['email'], $_POST['pass']);

    if ($check)
    {
        session_start();
        $_SESSION['admin_ID'] = $data['admin_ID'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];

        load('adminapprove.php');
    } else { $errors = $data;}

    mysqli_close($dbc);
}

include('adminlogin.php'); ?>