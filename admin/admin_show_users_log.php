<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
$result = mysqli_query($conn,"SELECT * FROM userlog");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> USER LOG PAGE</title>
 <link rel="stylesheet" href="style.css">
 </head>
<body>
<center>
    <div class="container">
            <br>
        <div align="left">
        <a style="padding:12px;" class="btn btn-warning" href="admin_welcome.php">ADMIN HOMEPAGE</a>
        </div>
        <h2>USERS LOG</h2>
        <div class="text text-danger" align="right">
          Here STATUS 0 shows invalid entries.
        </div>
        <div class="text text-success" align="right">
          Here STATUS 1 shows valid entries.
        </div>

<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="table table-responsive">
  <table class="table table-bordered">


  <tr>
    <td>ID</td>
    <td>USER_ID</td>
    <td>EMAIL</td>
    <td>USER IP ADDRESS</td>
    <td>LOGIN TIME</td>
    <td>LOGOUT TIME</td>
    <td>STATUS</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["u_id"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["userip"]; ?></td>
    <td><?php echo $row["login_time"]; ?></td>
    <td><?php echo $row["logout_time"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
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