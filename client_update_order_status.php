<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['login_user']))
{
$sql = "UPDATE `order1` SET `status`='CANCELLED_BY_CLIENT' WHERE o_id='" . $_GET['o_id'] . "'";
if (mysqli_query($conn, $sql)) {
	echo "<script>alert('ORDER CANCELLED suceessfully!')
	window.location.href='client_show_order_history.php';</script>";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
else
{
	echo "<script>window.location.href='404.php';</script>";
}
?>