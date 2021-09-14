<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
  $sql = "DELETE FROM user WHERE id='" . $_GET["id"] . "'";
  if (mysqli_query($conn, $sql))
  {
    echo "<script>alert('record deleted suceessfully!')
		window.location.href='admin_show_users.php';</script>";
  }
  else
  {
    echo "<script>alert('record not deleted.!')
		window.location.href='admin_show_users.php';</script>";
  }
  mysqli_close($conn);
}
else
{
  echo "<script>alert('PLEASE LOGIN FIRST')
	window.location.href='index.php';</script>";
}
?>