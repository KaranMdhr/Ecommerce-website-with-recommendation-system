<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Get POST data
$customerEmail = $_POST['email'];
$customerName = $_POST['name'];
$productName = $_POST['product'];

// Function to send email
function sendPurchaseConfirmation($customerEmail, $customerName, $productName) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); // Use SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = ''; // SMTP username
        $mail->Password = ''; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable SSL encryption
        $mail->Port = 465; // TCP port to connect to

        // Recipients
        $mail->setFrom('your-email@example.com', 'Your E-Commerce Site');
        $mail->addAddress($customerEmail, $customerName); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Purchase Confirmation';
        $mail->Body    = "Dear $customerName,<br><br>Thank you for purchasing $productName from our e-commerce site!<br><br>Best regards,<br>Your E-Commerce Team";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Call the function to send email
sendPurchaseConfirmation($customerEmail, $customerName, $productName);
?>
