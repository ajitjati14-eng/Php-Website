<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone']))); // Naya Phone field
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        
        $to = "ajitjati768@gmail.com"; 
        $subject = "New Inquiry from: $name";
        
        // Email Body mein phone number add kiya gaya hai
        $body = "You have received a new message from your portfolio contact form.\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n\n";
        $body .= "Message:\n$message\n";
        
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
    // Alert ki jagah success parameter ke saath redirect karein
            header("Location: index.php?status=success");
        } else {
            header("Location: index.php?status=error");
        }
        exit();
    }
}
?>