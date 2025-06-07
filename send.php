<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'anotheruser20655@gmail.com';
        $mail->Password   = 'xpkkfurhzixcseou'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient
       $mail->setFrom('anotheruser20655@gmail.com', 'Gaurav Website');
        $mail->addReplyTo($email, $name);
        $mail->addAddress('anotheruser20655@gmail.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Website Contact Form';
        $mail->Body    = "
            <h3>Contact Form Submission</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        echo "✅ Message has been sent successfully!";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
