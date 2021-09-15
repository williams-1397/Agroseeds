<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
  $result = mysqli_query($conn,"SELECT * FROM product");

/*
$result = mysqli_query($conn,"SELECT * FROM product");*/
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Retrive data</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <center>
    <div class="container">
            <br>
        <div align="left">
        <a style="padding:12px;" class="btn btn-warning" href="admin_welcome.php">ADMIN HOMEPAGE</a>
        </div>

    <?php
      if (mysqli_num_rows($result) > 0)
      {
    ?>
    <div class="table table-responsive">
    <table class="table table-striped">

      <h2>TOTAL PRODUCT TABLE</h2>
      <br>
      </center>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>PHOTO</th>
        <th>PRICE</th>
        <th>CATAGORY</th>
        <th>SUB CATAGORY</th>
        <th>STOCK</th>
        <th>ACTION</th>
      </tr>
    <?php
      $i=0;
      while($row = mysqli_fetch_array($result))
      {
    ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><img style="border:2px solid #e6e6e6;" src="../images/shop/products/<?php echo $row["image"]; ?>" class="img-responsive" height="152" width="152" /></td>
      <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["catagory"]; ?></td>
    <td><?php echo $row["catagory1"]; ?></td>
    <td><?php echo $row["stock"]; ?></td>
      <td>
          <a class="btn btn-danger" href="admin_delete_sweet_process.php?id=<?php echo $row["id"]; ?>">Delete</a>
          <a class="btn btn-warning" href="admin_update_sweet_process.php?id=<?php echo $row["id"]; ?>">Update</a>
      </td>
    </tr>
    <?php
      $i++;
    }
    ?>
    </table>
    </div>
  <?php

  }
  else
  {
    echo "No result found";
  }
}
else{
  echo "<script>alert('PLEASE LOGIN FIRST')
	window.location.href='index.php';</script>";
}
?>
</div>
</body>
</html>