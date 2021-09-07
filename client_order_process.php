<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['login_user']))
{
if(!empty($_SESSION["shopping_cart"]))
						{

							foreach($_SESSION["shopping_cart"] as $keys => $values)
							{
								if(isset($_POST['oreder_confirm']))
								{
								$mobile = $_POST['mobile'];
								$address = $_POST['address'];
								$paymode = $_POST['pay_mode'];
								$timestamp = time();
  								$time_stamp = date("F d, Y h:i:s A", $timestamp);
								$email = $_SESSION['login_user'];
								$id1 = $values["item_id"];
                                $id2 = $values["item_name"];
                                $id3 = $values["item_quantity"];
								$id4 = $values["item_price"];

                                $sql = "INSERT INTO order1(email,p_id, name, qty ,price,status,mobile,address,paymode,payment_status,order_timestamp) VALUES ('$email','$id1','$id2','$id3',$id4,'PENDING','$mobile','$address','$paymode','PENDING','$time_stamp')";
                                mysqli_query($conn, $sql);
								}
							}
							unset($_SESSION['shopping_cart']);
							//echo "<script>alert('ORDER SUCESSFULLY PLACED.')</script>";
							$status12='1';
							$_SESSION['status1'] = $status12;
							echo "<script>window.location.href='confirmation.php';</script>";
						}
						else
						{
							echo "<script>alert('PUT SOME PROCUTS INTO CART FIRST')</script>";
							echo "<script>window.location.href='client_my_cart.php';</script>";
							error_reporting(E_ERROR | E_PARSE);
						}
?>
<?php
}
else
{
    echo "<script>window.location.href='404.php';</script>";
}
?>