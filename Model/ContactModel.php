<?php

class ContactModel {
    public function sendEmail($name, $email, $message) {
        
        $to = 'antcan01@easv365.dk';
        $subject = 'New Contact Form Submission';
        $headers = "From: $name <$email>" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        $mailContent = "Name: $name\nEmail: $email\n\n$message";

        mail($to, $subject, $mailContent, $headers);
    }
}

?>