<?php

/* Declare admin email address */
$adminEmail = "foo@bar.com";

/* Parse form submission to variables, depends on your form,  */
$name         = $_POST['name'];
$userEmail        = $_POST['email'];
$subject      = $_POST['subject'];
$message      = $_POST['message'];
$emailSubject = $name . " " . $subject;

/* Email header */
$emailHeader = "From: foo@bar.com" . "\r\n" . "Content-Type: text/html; charset=UTF-8"; // To support non-english language

/* Admin email content */
$adminEmailContent = "
<p><br>
Full Name: $name
E-mail: $userEmail
Subject: $subject
<br>
Message:
$message
</p>
";

/* User email content */
$userEmailContent = "
<p><br>
Dear $name,<br>
We have received your enquiry about $subject.<br>
We will get back to you as soon as possible.<br>
Thank you for contacting us.<br>
<br>
This is your message:<br>
$message
</p>
"

/* Send admin email */
$mailAdmin = mail($adminEmail, $emailSubject, $adminEmailContent, $emailHeader);

/* Send user email */
$mailUser = mail($userEmail, $emailSubject, $userEmailContent, $emailHeader);

/* Redirect user */
if($mailAdmin && $mailUser) {
    header('Location: https://www.bar.com/'); // Redirect to this page if succeeded
} else {
    header('Location: https://www.bar.com/error'); // Redirect to this page if failed
}

?>