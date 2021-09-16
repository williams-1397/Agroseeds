<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['admin_login_user']))
{
/*
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE product set name='" . $_POST['name'] . "', price='" . $_POST['price'] . "', image'" . $_POST['img'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
}*/
$result = mysqli_query($conn,"SELECT * FROM product WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update  Data</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<div class="container">
            <br>
        <div align="left">
        <a style="padding:12px;" class="btn btn-warning" href="admin_show_available_product.php">BACK TO PROCUTS PAGE</a>
        </div>
<form name="frmUser" method="post" action="process.php" enctype="multipart/form-data">
<div style="padding-bottom:5px;">

</div>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<br>
NAME:<input type="text" name="name" required class="txtField" value="<?php echo $row['name']; ?>">
<br>
<br>
OLD IMAGE:<br>
<img src="../images/shop/products/<?php echo $row['image'];?>" height="152" width="152" required>
<br>
<br>
<input onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" name="image" class="txtField" value="">
<br>
NEW IMAGE PREVIEW :
<br>
<br>
<img id="blah" alt="your image" width="152" height="152"/>
<br>
<br>
PRICE :
<input type="text" name="price"  class="txtField" value="<?php echo $row['price']; ?>">
<br>
<br>
CATAGORY :
<input type="text" name="catagory"  class="txtField" value="<?php echo $row['catagory']; ?>">
<br>
<br>
SUB CATAGORY1 :
<input type="text" name="catagory1" class="txtField" value="<?php echo $row['catagory1']; ?>">
<br>
<br>
Details :
<input type="text" name="details" class="txtField" value="<?php echo $row['details']; ?>">
<br>
<br>
Feature1 :
<input type="text" name="desc1"  class="txtField" value="<?php echo $row['desc1']; ?>">
<br>
<br>
Feature2:
<input type="text" name="desc2"  class="txtField" value="<?php echo $row['desc2']; ?>">
<br>
<br>
Feature3 :
<input type="text" name="desc3"  class="txtField" value="<?php echo $row['desc3']; ?>">
<br>
<br>
Feature4 :
<input type="text" name="desc4"  class="txtField" value="<?php echo $row['desc4']; ?>">
<br>
<br>
Feature5 :
<input type="text" name="desc5"  class="txtField" value="<?php echo $row['desc5']; ?>">
<br>
<br>
Feature6 :
<input type="text" name="desc6"  class="txtField" value="<?php echo $row['desc6']; ?>">
<br>
<br>
Feature7 :
<input type="text" name="desc7"  class="txtField" value="<?php echo $row['desc7']; ?>">
<br>
<br>
Feature8 :
<input type="text" name="desc8"  class="txtField" value="<?php echo $row['desc8']; ?>">
<br>
<br>
Feature9 :
<input type="text" name="desc9"  class="txtField" value="<?php echo $row['desc9']; ?>">
<br>
<br>
Feature10 :
<input type="text" name="desc10" class="txtField" value="<?php echo $row['desc10']; ?>">
<br>
<br>

SLIENT Feature1 :
<input type="text" name="sf1"  class="txtField" value="<?php echo $row['sf1']; ?>">
<br>
<br>
SLIENT Feature2:
<input type="text" name="sf2"  class="txtField" value="<?php echo $row['sf2']; ?>">
<br>
<br>
SLIENT Feature3 :
<input type="text" name="sf3"  class="txtField" value="<?php echo $row['sf3']; ?>">
<br>
<br>
SLIENT Feature4 :
<input type="text" name="sf4" class="txtField" value="<?php echo $row['sf4']; ?>">
<br>
<br>
SLIENT Feature5 :
<input type="text" name="sf5"  class="txtField" value="<?php echo $row['sf5']; ?>">
<br>
<br>
SLIENT Feature6 :
<input type="text" name="sf6"  class="txtField" value="<?php echo $row['sf6']; ?>">
<br>
<br>
SLIENT Feature7 :
<input type="text" name="sf7"  class="txtField" value="<?php echo $row['sf7']; ?>">
<br>
<br>
SLIENT Feature8 :
<input type="text" name="sf8"  class="txtField" value="<?php echo $row['sf8']; ?>">
<br>
<br>
SLIENT Feature9 :
<input type="text" name="sf9"  class="txtField" value="<?php echo $row['sf9']; ?>">
<br>
<br>
SLIENT Feature10 :
<input type="text" name="sf10" class="txtField" value="<?php echo $row['sf10']; ?>">
<br>
<br>
OLD PRICE :
<input type="text" name="price0"  class="txtField" value="<?php echo $row['price0']; ?>">
<br>
<br>
STOCK :
<input type="text" name="stock"  class="txtField" value="<?php echo $row['stock']; ?>">
<br>
<br>
<input class="btn btn-warning" type="submit" name="update" value="UPDATE">

</form>
</center>
</body>
</html>
<?php
}
else{
  echo "<script>alert('PLEASE LOGIN FIRST')
	window.location.href='index.php';</script>";
}
?>