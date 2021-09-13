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
    <script>
        function GEEKFORGEEKS()
        {
            var name = document.forms["RegForm"]["name"];
            var file = document.forms["RegForm"]["file"];
            var price = document.forms["RegForm"]["price"];

            if( document.getElementById("file").files.length == 0 )
            {
                window.alert("Please select image");
            }
            return true;
        }
    </script>
        </head>
    <body>
    <center>

        <div class="container">
            <br>
        <div align="left">
        <a style="padding:12px;" class="btn btn-warning" href="admin_welcome.php">ADMIN HOMEPAGE</a>
        </div>
        <form name="RegForm" method="post" action="process.php" enctype="multipart/form-data" class="form-group">
        <h3>New Product Entry Form</h4>
        <br>
        <input type="hidden" name="id">
        <br>
        NAME :  <input type="text" name="name" required>
        <br>
        <br>

        PRICE :<input type="text" name="price"required>
        <br>
        <br>
		CATAGORY:
		<select name="catagory">
			<option value="CAREALS_AND_PULSES">CAREALS_AND_PULSES</option>
			<option value="FIBRE_AND_OIL_CROPS">FIBRE_AND_OIL_CROPS</option>
			<option value="VEGITABLE_CROPS">VEGITABLE_CROPS</option>
		</select>
		<br>
		<br>
        SELECT IMAGE TO UPLOAD:<br><br>
        <input type="file" name="image" accept="image/*" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
        <br>
        Image Preview <br>
        <br>
        <img id="blah" alt="your image" width="152" height="152"/>
        <br>
        <br>
        <input type="submit" name="add" value="SUBMIT" class="btn btn-success">
        </form>
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