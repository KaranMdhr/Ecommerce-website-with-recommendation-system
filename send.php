<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
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
        $mail->setFrom('boyemo728@gmail.com');
        $mail->addAddress($_POST["email"]);

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        $mail->send();
        echo "
            <script>
            alert('Sent successfully');
            document.location.href = 'sendmailform.php';
            </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
