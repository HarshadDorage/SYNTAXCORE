<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $purpose = $_POST['purpose'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $message = $_POST['message'];
    
    // Email details
    $to = "harshaddorage1000@gmail.com";
    $subject = "New Contact Form Submission: $purpose";
    $body = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <h2>Contact Form Details</h2>
        <p><strong>Purpose:</strong> $purpose</p>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Course Interested In:</strong> $course</p>
        <p><strong>Preferred Batch:</strong> $batch</p>
        <p><strong>Message:</strong> $message</p>
    </body>
    </html>
    ";
    
    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to thank you page
        header('Location: thank-you.html');
    } else {
        echo "Error sending message. Please try again later.";
    }
}
?>