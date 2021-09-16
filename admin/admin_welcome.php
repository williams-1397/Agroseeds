<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <center>
        <div class="container">
            <br>
            <div align="right" >
        <a style="padding:12px;" class="btn btn-danger"href="logout.php" >Logout</a>
        </div>

        <h2>Welcome to Admin Page..</h2>
        <br>
        <br>
        <a class="btn btn-info" href='admin_add_new_product.php'>ADD NEW PRODUCT</a>
        <br>
        <br>
        <a class="btn btn-info" href='admin_show_available_product.php' >SHOW ALL PRODUCT</a>
        <br>
        <br>
        <a class="btn btn-info" href='admin_show_order.php' >SHOW ALL ORDERS</a>
        <br>
        <br>
        <a class="btn btn-info" href='admin_show_users.php'>SHOW ALL USERS</a>
        <br>
        <br>
        <a class="btn btn-info" href='admin_show_users_log.php' ">SHOW USERS LOG</a>
        </div>
        </center>
    </body>
</html>
<?php
}
else
{
    echo "<script>alert('PLEASE LOGIN FIRST')
      window.location.href='index.php';</script>";
  }
?>