<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
$result = mysqli_query($conn,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> AVAILABLE USERS </title>
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
if (mysqli_num_rows($result) > 0) {
?>
<div class="table table-responsive">
  <table class="table table-striped">
  <h2>ALL USER ACCOUNTS</h2>

  <tr>
    <th>ID</th>
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>DISPLAY NAME</th>
    <th>EMAIL</th>
    <th>PASSOWRD</th>
    <th>ADDRESS 1</th>
    <th>MOBILE</th>
    <th>ACTION</th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["f_name"]; ?></td>
    <td><?php echo $row["l_name"]; ?></td>
    <td><?php echo $row["d_name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td> <?php echo $row["password"]; ?> </td>
    <td> <?php echo $row["add1"]; ?> </td>
    <td> <?php echo $row["mobile"]; ?> </td>
    <td>
        <a class="btn btn-danger" href="admin_delete_client_user.php?id=<?php echo $row["id"]; ?>">DELETE</a>
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
else{
    echo "No result found";
}
?>
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