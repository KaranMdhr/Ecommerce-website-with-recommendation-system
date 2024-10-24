<?php
include_once('db_config.php');
date_default_timezone_set('Asia/Kolkata');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create New Account
function RegisterNewUser($customer_email,$customer_name,$customer_number,$password,$retypepassword)
{

	//Check Email Already Exist Or Not
	global $con;
	$sql121="SELECT `customer_email` FROM `mobee_user` WHERE `customer_email`='".mysqli_real_escape_string($con,$customer_email)."' ";
	$result121=$con->query($sql121);
	if ($result121->num_rows < 1) {
		if(strlen($customer_name)>0 && strlen($customer_number)>0 && strlen($password)>0 && strlen($retypepassword)>0)
		{
			if($password==$retypepassword)
			{
				global $con;
				$sql="INSERT INTO `mobee_user`(`customer_email`, `customer_name`, `customer_number`, `password`) VALUES ('".mysqli_real_escape_string($con,$customer_email)."','".mysqli_real_escape_string($con,$customer_name)."','".mysqli_real_escape_string($con,$customer_number)."','".mysqli_real_escape_string($con,md5($password))."')";
				if($con->query($sql) === true){
					echo "
					<div class='alert alert-success alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					  <strong>success!</strong> you can login your account.
					</div>

					";
				}
			}
			else
			{
				echo "
					<div class='alert alert-danger alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					  <strong>Oh snap!</strong> Password And Retype Password Should Be Same.
					</div>

					";
			}
		}
		else
		{
			echo "
					<div class='alert alert-danger alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					  <strong>Oh snap!</strong> Change a few things up and try submitting again.
					</div>

					";
		}
	}
	else
	{
		echo "
				<div class='alert alert-danger alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Oh snap!</strong> Email Already Exist. <a href='forgot.php'>Forgot Password?</a>
				</div>

				";
	}

	
}

//function create check login
function checklogin($email,$password,$redirect)
{
	global $con;
	$sql="SELECT `customer_email`, `customer_name`, `password`  FROM `mobee_user` WHERE  `customer_email`='".mysqli_real_escape_string($con,$email)."' ";
	$result=$con->query($sql);

	if($result->num_rows>0)
	{
		$row=$result->fetch_assoc();
		if($row['password']==md5($password) && $row['customer_email']==$email)
		{
		
if (session_status() === PHP_SESSION_NONE) {
    // Session is not started
    session_start(); // Start a new session or resume the existing one
}

			$_SESSION["UserEmail"]=$email;
			$_SESSION["UserFullName"]=$row['customer_name'];
			if(strlen($redirect)>0)
			{
				echo "<script>window.open('".$redirect."','_self');</script>";
			}
			else{
			echo "<script>window.open('myaccount.php','_self');</script>";
			}
		}
		else
		{
			echo "
				<div class='alert alert-danger alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Oh snap!</strong> Enter Valid Email Or Password.
				</div>

				";
		}
	}
	else
	{

		echo "
				<div class='alert alert-danger alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Oh snap!</strong> Enter Valid Email Or Password. Or <a href='register.php?name=".base64_encode('Create New Account')."'>Create Account?</a>
				</div>

				";
	}
}


///this function update cart item
function updatecateitem($cart_id,$qty)
{
	global $con;
	$sql="UPDATE `mobee_cart` SET `qty`='".mysqli_real_escape_string($con,$qty)."' WHERE `Cart_ID`='".mysqli_real_escape_string($con,$cart_id)."' ";

	if($con->query($sql)){
		echo "<script>alert('Cart Updated')</script>";
	}
}

// this function detete cart item
function deletecart($id)
{
	global $con;
	$sql="DELETE FROM `mobee_cart` WHERE `Cart_ID`='".base64_decode($id)."' ";

	if($con->query($sql))
	{
		echo "<script>alert('Item Deleted');</script>";
	}
}


//this function place order
function placeorder($txtName,$txtEmail,$txtPhone,$txtAddress,$txtLandmark,$txtPincode,$txtprovince,$txtTotalAmount,$txtCartId,$txtDelivaryCharge,$txtMode)
{
	global $con;

	if($txtMode=="Online")
	{
		$sql="INSERT INTO `mobee_order`(`cart_id`, `order_by`, `email`, `phone`, `address`, `landmark`, `pin`, `province`, `totalamount`, `deliverycharge`, `date`, `time`, `mode`) VALUES ('".mysqli_real_escape_string($con,$txtCartId)."','".mysqli_real_escape_string($con,$txtName)."','".mysqli_real_escape_string($con,$txtEmail)."','".mysqli_real_escape_string($con,$txtPhone)."','".mysqli_real_escape_string($con,$txtAddress)."','".mysqli_real_escape_string($con,$txtLandmark)."','".mysqli_real_escape_string($con,$txtPincode)."','".mysqli_real_escape_string($con,$txtprovince)."','".mysqli_real_escape_string($con,$txtTotalAmount)."','".mysqli_real_escape_string($con,$txtDelivaryCharge)."','".mysqli_real_escape_string($con,date('d-m-Y'))."','".mysqli_real_escape_string($con,date('H:i'))."','".mysqli_real_escape_string($con,$txtMode)."')";

	}
	else
	{
		$sql="INSERT INTO `mobee_order`(`cart_id`, `order_by`, `email`, `phone`, `address`, `landmark`, `pin`, `province`, `totalamount`, `deliverycharge`, `date`, `time`, `mode`,`payment`) VALUES ('".mysqli_real_escape_string($con,$txtCartId)."','".mysqli_real_escape_string($con,$txtName)."','".mysqli_real_escape_string($con,$txtEmail)."','".mysqli_real_escape_string($con,$txtPhone)."','".mysqli_real_escape_string($con,$txtAddress)."','".mysqli_real_escape_string($con,$txtLandmark)."','".mysqli_real_escape_string($con,$txtPincode)."','".mysqli_real_escape_string($con,$txtprovince)."','".mysqli_real_escape_string($con,$txtTotalAmount)."','".mysqli_real_escape_string($con,$txtDelivaryCharge)."','".mysqli_real_escape_string($con,date('Y-m-d'))."','".mysqli_real_escape_string($con,date('H:i'))."','".mysqli_real_escape_string($con,$txtMode)."','1')";
	}

	
	$result=$con->query($sql);
	$OrderId="#ORDmobee".mysqli_insert_id($con);
	if($result>0)
	{
		if($txtMode=="Online")
		{
			//Online Code Here
			echo "<script>window.open('ccavenue.php?oderid=".base64_encode($OrderId)."','_self');</script>";
		}
		else
		{
		
		unset($_SESSION['uniqueSessionID']);

		try{
			$mail = new PHPMailer(true);


			$message = '<html><body>';
			$message .= '<h1 style="color:#f40;">You Have A New Order From Website</h1>';
			$message .= '<p style="color:#080;font-size:18px;">Order Id- '.$OrderId;
			$message .= '</p></body></html>';

			 // Server settings
			 $mail->isSMTP(); // Use SMTP
			 $mail->Host = 'smtp.gmail.com';
			 $mail->SMTPAuth = true; // Enable SMTP authentication
			 $mail->Username = ''; // SMTP username
			 $mail->Password = ''; // SMTP password
			 $mail->SMTPSecure = 'ssl'; // Enable SSL encryption
			 $mail->Port = 465; // TCP port to connect to
	 
			 // Recipients
			 $mail->setFrom('');
			 $mail->addAddress($txtEmail);
	 
			 // Content
			 $mail->isHTML(true); // Set email format to HTML
			 $mail->Subject ="New Order From Website-- Order Id-'.$OrderId";
			 $mail->Body = $message;
	 
			 $mail->send();
			 echo "
				 <script>
				 alert('Order Placed Successfully');
				 </script>
			 ";
			
		}catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		// $to = $txtEmail;
		// $subject = 'New Order From Website-- Order Id-'.$OrderId;
		// $from = 'order@mobeekolkata.com';
		 
		// // To send HTML mail, the Content-type header must be set
		// $headers  = 'MIME-Version: 1.0' . "\r\n";
		// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		 
		// // Create email headers
		// $headers .= 'From: '.$from."\r\n".
		//     'Reply-To: '.$from."\r\n" .
		//     'X-Mailer: PHP/' . phpversion();
		 
		// // Compose a simple HTML email message
		// $message = '<html><body>';
		// $message .= '<h1 style="color:#f40;">You Have A New Order From Website</h1>';
		// $message .= '<p style="color:#080;font-size:18px;">Order Id- '.$OrderId;
		// $message .= '</p></body></html>';
		 
		// Sending email
		// if(mail($to, $subject, $message, $headers)){
		//     echo 'Your mail has been sent successfully.';
		// } else{
		//     echo 'Unable to send email. Please try again.';
		// }

		// this section send mail to customer
		// $mailbody="Dear Customer(s),\n
		// Thank you for placing an order at www.mobeekolkata.com \n
		// Your order no is ".$OrderId."\n
		// Please log in to www.mobeekolkata.com to track your order status.\n
		// Looking forward to serve you again.\n\n

		// Thanks & Regards,\n
		// mobee Team\n
		// Kolkata\n
		// (+91) 91634 88628\n
		// Look Good! Do Good.'
		// ";

		// $by ='From: orders@mobeekolkata.com'."\r\n".
        //  'Reply-To: orders@mobeekolkata.com'."\r\n" .
        //   'X-Mailer: PHP/' . phpversion();

		// mail($txtEmail, "Thank you for placing an order at www.mobeekolkata.com", $mailbody, $by);

			// echo "<script>window.open('payment_success.php?name=T3JkZXIgU3VjZXNz','_self');</script>";
		}
	}
}


//function to add new review
function createreview($product_id,$title,$details,$rate)
{
	global $con;
	$sql="INSERT INTO `product_review`(`product_id`, `review_by(email)`, `review_by(name)`, `title`, `details`, `rate`) VALUES ('".mysqli_real_escape_string($con,$product_id)."','".mysqli_real_escape_string($con,$_SESSION['UserEmail'])."','".mysqli_real_escape_string($con,$_SESSION['UserFullName'])."','".mysqli_real_escape_string($con,$title)."','".mysqli_real_escape_string($con,$details)."','".mysqli_real_escape_string($con,$rate)."')";
	if($con->query($sql) === true){
					echo "
					<div class='alert alert-success alert-dismissible' role='alert'>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					  <strong>success!</strong> Review Added.
					</div>

					";
				}
}

//function to add rating
function ratingView($product_id) {
    global $con;

    // Query to get the average rating
    $sql = "SELECT AVG(rate) AS average_rating, COUNT(rate) AS total_reviews FROM `product_review` WHERE product_id = '" . mysqli_real_escape_string($con, $product_id) . "'";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $average_rating = round($row['average_rating'], 2); // Round to 2 decimal places
        $total_reviews = $row['total_reviews'];

        // Display the average rating and total reviews
        echo "<div class='rating'>";
        echo "<strong>Average Rating: </strong>" . ($average_rating ? $average_rating : "No rating yet") . " / 5<br>";
        echo "<strong>Total Reviews: </strong>" . $total_reviews;
        echo "</div>";
    } else {
        echo "<div class='rating'><strong>No reviews yet</strong></div>";
    }
}

?>