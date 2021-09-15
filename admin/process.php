<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

//USER REGISTRATION CODE
if(isset($_POST['user_register']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email_check = "select * from user where email='$email'";
	$check_result = mysqli_query($conn,$email_check);
	$found = mysqli_fetch_array($check_result);
	$sql = "INSERT INTO user (id,name,email,password) VALUES ('$id','$name','$email','$password')";

	if( $found['email'] == $email)
	{

			echo "<script>alert('Email Already registered please enter diffrent email')
			window.location.href='client_signup.php';</script>";
	}
	else
	{
		$result = mysqli_query($conn, $sql);
		echo "<script>alert('You are sucessfully Registered Now you can log in')
		window.location.href='client_login.php';</script>";
	}
	mysqli_close($conn);
}

//USER LOGIN CODE
if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$id = $_POST['id'];

	$sql = "select * from user where email='$email' and password='$password'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	if( $row['email'] == $email and $row['password'] == $password)
	{
		$_SESSION['login_user'] = $email;
		$_SESSION['login_id'] = $row['id'];
  		$host = $_SERVER['HTTP_HOST'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$timestamp = time();
  		$time_stamp = date("F d, Y h:i:s A", $timestamp);
  		$status=1;
		  mysqli_query($conn,"insert into userlog(u_id,email,userip,login_time,logout_time,status)
		  values('".$_SESSION['login_id']."','".$_SESSION['login_user']."','$uip','$time_stamp','','$status')");
		header("location: ./client_welcome.php");
	}
	else
	{

		$uip=$_SERVER['REMOTE_ADDR'];
		$timestamp = time();
  		$time_stamp = date("F d, Y h:i:s A", $timestamp);
  		$status=0;
		mysqli_query($conn,"insert into userlog(u_id,email,userip,login_time,logout_time,status)
		values('','$email','$uip','$time_stamp','$time_stamp','$status')");
		echo "<script>alert('Please enter valid email and password')
		window.location.href='client_login.php';</script>";
	}
	mysqli_close($conn);
}

//ADMIN LOGIN CODE
if(isset($_POST['admin']))
{

	$uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

	$rs = "select * from admin where uname='$uname' and password='$pwd'";
	$result = mysqli_query($conn, $rs);
	$row = mysqli_fetch_array($result);

	if($row['uname'] == $uname and $row['password'] == $pwd)
	{
		$_SESSION['admin_login_user'] = $uname;
		header("location: ./admin_welcome.php");
	}
	else
	{
		echo "<script>alert('Invalid userid or Password !')
		window.location.href='admin_login.php';</script>";
	}
	mysqli_close($conn);
}

//CATAGORY ADD CODE
if(isset($_POST['add']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$catagory = $_POST['catagory'];
	$img = $_FILES['image']['name'];

	$name_check = "select * from product where name='$name'";
	$check_result = mysqli_query($conn,$name_check);
	$found = mysqli_fetch_array($check_result);
	$sql = "INSERT INTO product (id,name,image,price,catagory)
	VALUES ('$id','$name','$img','$price','$catagory')";

	if( $found['name'] == $name)
	{
		echo "<script>alert('Item already available in database.')</script>";
		echo "<script>alert('Please enter diffrent name')</script>";
		echo "<script>window.location.href='add_cat.php';</script>";
	}
	else{
		$result = mysqli_query($conn,$sql);
		move_uploaded_file($_FILES['image']['tmp_name'],"images/$img");
		echo "<script>alert('New item added successfully !')
		window.location.href='admin_show_available_product.php';</script>";
	}
	mysqli_close($conn);
}

//PRODUCT UPDATE CODE
if(isset($_POST['update']))
{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$price = $_POST['price'];
		$img = $_FILES['image']['name'];
		$catagory = $_POST['catagory'];
		$catagory1 = $_POST['catagory1'];
		$details = $_POST['details'];
		$desc1 = $_POST['desc1'];
		$desc2 = $_POST['desc2'];
		$desc3 = $_POST['desc3'];
		$desc4 = $_POST['desc4'];
		$desc5 = $_POST['desc5'];
		$desc6 = $_POST['desc6'];
		$desc7 = $_POST['desc7'];
		$desc8 = $_POST['desc8'];
		$desc9 = $_POST['desc9'];
		$desc10 = $_POST['desc10'];
		$sf1 = $_POST['sf1'];
		$sf2 = $_POST['sf2'];
		$sf3 = $_POST['sf3'];
		$sf4 = $_POST['sf4'];
		$sf5 = $_POST['sf5'];
		$sf6 = $_POST['sf6'];
		$sf7 = $_POST['sf7'];
		$sf8 = $_POST['sf8'];
		$sf9 = $_POST['sf9'];
		$sf10 = $_POST['sf10'];
		$price0= $_POST['price0'];
		$stock = $_POST['stock'];
		$sql = "UPDATE `product` SET `name`='$name',`image`='$img',`price`='$price',`catagory`='$catagory',`catagory1`='$catagory1',`details`='$details',`desc1`='$desc1',`desc2`='$desc2',`desc3`='$desc3',`desc4`='$desc4',`desc5`='$desc5',`desc6`='$desc6',`desc7`='$desc7',`desc8`='$desc8',`desc9`='$desc9',`desc10`='$desc10',`sf1`='$sf1',`sf2`='$sf2',`sf3`='$sf3',`sf4`='$sf4',`sf5`='$sf5',`sf6`='$sf6',`sf7`='$sf7',`sf8`='$sf8',`sf9`='$sf9',`sf10`='$sf10',`price0`='$price0',`stock`='$stock' WHERE id= $id";
		$sql1 = "UPDATE `product` SET `name`='$name',`price`='$price',`catagory`='$catagory',`catagory1`='$catagory1',`details`='$details',`desc1`='$desc1',`desc2`='$desc2',`desc3`='$desc3',`desc4`='$desc4',`desc5`='$desc5',`desc6`='$desc6',`desc7`='$desc7',`desc8`='$desc8',`desc9`='$desc9',`desc10`='$desc10',`sf1`='$sf1',`sf2`='$sf2',`sf3`='$sf3',`sf4`='$sf4',`sf5`='$sf5',`sf6`='$sf6',`sf7`='$sf7',`sf8`='$sf8',`sf9`='$sf9',`sf10`='$sf10',`price0`='$price0',`stock`='$stock' WHERE id= $id";
		if( $img == NULL)
		{
			if (mysqli_query($conn, $sql1))
			{
				echo "<script>alert('NEW RECORD UPDATED SUCCESSFULLY!')</script>";
				echo "<script>window.location.href='admin_show_available_product.php';</script>";
			}
		}
		else
		{
			if (mysqli_query($conn, $sql))
			{
				move_uploaded_file($_FILES['image']['tmp_name'],"../images/shop/products/$img");
				echo "<script>alert('NEW RECORD UPDATED SUCCESSFULLY!')</script>";
				echo "<script>window.location.href='admin_show_available_product.php';</script>";
			}
			else
			{
				echo "<script>alert('NEW RECORD NOT UPDATED!')</script>";
				echo "<script>window.location.href='admin_show_available_product.php';</script>";
			}
		}
		mysqli_close($conn);
}

//UPDATE ORDER STATUS CODE
if(isset($_POST['update_order_status']))
{
		$id=$_POST['o_id'];
		$o_s=$_POST['order_status'];
		$p_s=$_POST['payment_status'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$timestamp = time();
  		$time_stamp = date("F d, Y h:i:s A", $timestamp);
		$sql = "UPDATE `order1` SET `status`='$o_s',`payment_status`='$p_s' WHERE o_id= $id";
		if (mysqli_query($conn, $sql)) {

		mysqli_query($conn,"insert into order_log(o_id,status,pstatus,timestamp)
		values('$id','$o_s','$p_s','$time_stamp')");
			echo "<script>alert('status updated')</script>";

		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		header("location: ./admin_show_order.php");
		mysqli_close($conn);
}


if(isset($_POST['update_details']))
{
		$id=$_POST['id'];
		$fname=$_POST['f_name'];
		$lname=$_POST['l_name'];
		$dname=$_POST['d_name'];
		$add1=$_POST['add1'];
		$mobile=$_POST['mobile'];


		$sql = "UPDATE `user` SET `f_name`='$fname',`l_name`='$lname',`d_name`='$dname',`add1`='$add1',`mobile`='$mobile' WHERE id= $id";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('status updated')</script>";
			echo "<script>window.location.href='client_update_details.php';</script>";

		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		echo "<script>window.location.href='client_update_details.php';</script>";
		mysqli_close($conn);
}
if(isset($_POST['update_password']))
{
		$id=$_POST['id'];
		$password=$_POST['password'];



		$sql = "UPDATE `user` SET `password`='$password' WHERE id= $id";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('PASSWORD UPDATED.')</script>";
			echo "<script>window.location.href='client_welcome.php';</script>";

		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		echo "<script>window.location.href='client_welcome.php';</script>";
		mysqli_close($conn);
}

if(isset($_POST['forgate_password']))
{
		$email = $_POST['email'];
		$_SESSION['forget_pass'] = $email;
		$rs = "select * from user where email = '$email'";
		$result = mysqli_query($conn, $rs);
		$row = mysqli_fetch_array($result);

	if($row['email'] == $email)
	{
		echo "<script>alert('DEFAULT OTP IS 12345')
		window.location.href='client_otp.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid EMAIL !')
		window.location.href='client_forget_password.php';</script>";
	}
	mysqli_close($conn);
}

if(isset($_POST['update_fpassword']))
{
		$password=$_POST['password'];


		$sql = "UPDATE `user` SET `password`='$password' WHERE email= '" . $_SESSION['forget_pass'] . "'";
		if (mysqli_query($conn, $sql))
		{
			echo "<script>alert('PASSWORD UPDATED.')</script>";
			echo "<script>window.location.href='client_login.php';</script>";
			unset($_SESSION['forget_pass']);

		}
		else {
			echo $_SESSION['forget_pass'];
			echo "<script>alert('PASSWORD NOT UPDATED.')</script>";
			echo "<script>window.location.href='client_login.php';</script>";
        }

		mysqli_close($conn);
}
?>
