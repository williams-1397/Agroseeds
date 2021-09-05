<?php
    include_once 'database.php';
    error_reporting(E_ERROR | E_PARSE);
    session_start();

	//log out code for user session.
    if(isset($_SESSION['login_user']))
    {
        if(session_destroy())
        {

            echo "<script>alert('You are sucessfully Log out!')
            window.location.href='index.php';</script>";
        }

    }
    else
    {
        echo "<script>window.location.href='404.php';</script>";
    }
?>