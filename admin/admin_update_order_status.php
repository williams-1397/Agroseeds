<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
/*
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE order1 set status='" . $_POST['order_status'] . "'  WHERE o_id='" . $_POST['o_id'] . "'");
$message = "Record Modified Successfully";
}*/
if(isset($_SESSION['admin_login_user']))
{
$result = mysqli_query($conn,"SELECT * FROM order1 WHERE o_id='" . $_GET['o_id'] . "'");
$row= mysqli_fetch_array($result);

?>
<html>
  <head>
  <title>Update  Data</title>
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div align="center">
    <h2>UPDATE ORDER STATUS</h2>
    <form class="form-group-lg" name="frmUser" method="post" action="process.php" enctype="multipart/form-data">
      <input type="hidden" name="o_id" class="txtField" value="<?php echo $row['o_id']; ?>">
      <br>
      ORDER STATUS :
      <select name="order_status">
        <option value="PENDING">PENDING</option>
        <option value="IN PROCESS">IN_PROCESS</option>
        <option value="READY_TO_DELIVER">READY TO DELIVER</option>
        <option value="OUT_FOR_DELIVERY">OUT FOR DELIVERY</option>
        <option value="DELIVERED">DELEVERD</option>
        <option value="CANCELLED">CANCELLED</option>
      </select>
      <br>
      <br>
      PAYMENT STATUS :
      <select name="payment_status">
        <option value="PENDING">PENDING</option>
        <option value="PAID">PAID</option>
      </select>
      <br>
      <br>
      ORDERED UNITS : <?php echo $row['qty']; ?>
      <br>
      <br>
     DECREEMENT STOCK UNITS:
      <select name="stock_status">
        <option value="0">0</option>
        <option value="1">1</option>
      </select>
      <br>
      <br>
       <input class="btn btn-warning "type="submit" name="update_order_status" value="UPDATE">

    </form>
  </div>
  </body>
</html>
<?php
}
else{
  echo "<script>alert('PLEASE LOGIN FIRST')
	window.location.href='index.php';</script>";
}
?>