<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

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
		header("location: ./index.php");
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
		window.location.href='login.php';</script>";
	}
	mysqli_close($conn);
}




if(isset($_POST['user_register']))
{
	$id = $_POST['id'];
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$dname = $_POST['d_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email_check = "select * from user where email='$email'";
	$check_result = mysqli_query($conn,$email_check);
	$found = mysqli_fetch_array($check_result);
	$sql = "INSERT INTO user (id,f_name,l_name,d_name,email,password) VALUES (NULL,'$fname','$lname','$dname','$email','$password')";

	if( $found['email'] == $email)
	{

			echo "<script>alert('Email Already registered please enter diffrent email')
			window.location.href='signup.php';</script>";
	}
	else
	{
		$result = mysqli_query($conn, $sql);
		echo "<script>alert('You are sucessfully Registered Now you can log in')
		window.location.href='login.php';</script>";
	}
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
			echo "<script>window.location.href='profile-details.php';</script>";

		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		echo "<script>window.location.href='profile-details.php';</script>";
		mysqli_close($conn);
}


if(isset($_POST['forgate_password']))
{
		$email = $_POST['email'];
		$_SESSION['forget_pass'] = $email;
		$admin_email = "madhubanshop55@gmail.com";

 		$subject = "Reset Password";
  		$comment = rand(2000,9999);
		$rs = "select * from user where email = '$email'";
		$result = mysqli_query($conn, $rs);
		$row = mysqli_fetch_array($result);

	if($row['email'] == $email)
	{
		mysqli_query($conn,"insert into otp_master(id,otp,status)
		values(NULL,'$comment','0')");
		mail( $email, "$subject", $comment, "From:" .$admin_email);
		echo "<script>alert('OTP is sent to your email.')
		window.location.href='client_otp.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid EMAIL !')
		window.location.href='forgot-password.php';</script>";
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
			echo "<script>window.location.href='login.php';</script>";
			unset($_SESSION['forget_pass']);

		}
		else {
			echo $_SESSION['forget_pass'];
			echo "<script>alert('PASSWORD NOT UPDATED.')</script>";
			echo "<script>window.location.href='login.php';</script>";
        }

		mysqli_close($conn);
}


if(isset($_POST['update_password']))
{
		$id=$_POST['id'];
		$password=$_POST['password'];


		$sql = "UPDATE `user` SET `password`='$password' WHERE id= $id";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('PASSWORD UPDATED.')</script>";
			echo "<script>window.location.href='profile-details.php';</script>";

		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		echo "<script>window.location.href='profile-details.php';</script>";
		mysqli_close($conn);
}

if(isset($_POST['contact']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];


	$sql = "INSERT INTO contact (id,name,email,subject,phone,message) VALUES ('$id','$name','$email','$subject','$phone','$message')";

	if( mysqli_query($conn, $sql))
	{

			echo "<script>alert('Your data sucessfully sent.')
			window.location.href='contact.php';</script>";
	}
	else
	{

		echo "<script>alert('Your data not sent.')
		window.location.href='contact.php';</script>";
	}
	mysqli_close($conn);
}


?>