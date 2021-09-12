<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
$result = mysqli_query($conn,"SELECT * FROM order1");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> ORDER PAGE</title>
 <link rel="stylesheet" href="style.css">
 </head>
<body>
<br>
<center>
<div class="container">
<div align="left">
        <a style="padding:12px" class="btn btn-warning" href="admin_welcome.php">ADMIN HOMEPAGE</a>
      </div>
      <h2> TOTAL ORDERS</h2>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<br>
<div class="table table-responsive">
  <table class="table table-striped">
  <tr>
    <th>ORDER_ID</th>
    <th>EMAIL</th>
    <th>PRODUCT ID</th>
    <th>NAME</th>
    <th>QUANTITY</th>
    <th>PRICE</th>

    <th>MOBILE</th>
    <th>ADDRESS</th>
    <th>PAYMENT MODE</th>
    <th>PAYMENT STATUS</th>
    <th>ORDER STATUS</th>
    <th>ACTION</th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["o_id"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["p_id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["qty"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["mobile"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["paymode"]; ?></td>
    <td><?php echo $row["payment_status"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
    <td>
        <a class="btn btn-warning" href="admin_update_order_status.php?o_id=<?php echo $row["o_id"]; ?>">Update</a>
    </td>
</tr>
<?php
$i++;
}
?>

</table>
</div>
</div>
 <?php
}
else{
    echo "No result found";
}
?>
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