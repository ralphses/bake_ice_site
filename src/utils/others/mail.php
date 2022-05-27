<?php 

if(isset($_POST['submit'])){
    $to = "email@example.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $full_name = $_POST['full_name'];
    // $last_name = $_POST['last_name'];
    $subject = $_POST['subject'];
    
    // $subject2 = "Copy of your form submission";
    $message = $full_name . " wrote the following:" . "\n\n" . $_POST['message'];
    // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    if(mail($to,$subject,$message,$headers))
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $full_name . ", we will contact you shortly.";

}
    // You can also use header('Location: thank_you.php'); to redirect to another page.
//     }
    // $errors = [];

    // if($_SERVER['REQUEST_METHOD'] === 'POST') {

    //     $name = strip_tags(trim($_POST['con_name']));
    //     $name = str_replace(array("\r","\n"),array(" "," "),$name);
    //     $email = filter_var(strip_tags(trim($_POST['con_email'])), FILTER_SANITIZE_EMAIL);
    //     $subject = strip_tags(trim($_POST['con_subject']));
    //     $message = strip_tags(trim($_POST['con_message']));


    //     if(empty($name) OR empty($email) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $errors[] = 1;
    //         http_response_code(400);
    //         exit;
    //     }

    //     $recipient = 'companyemail@company.com';
    //     $headers = "From: ".$email;
    //     $email_content = "Name: ".$name."\n"."Sender Email: ".$email."\n"."Message: ".$message;

    //     if(mail($recipient, $subject, $message, $headers)) {
    //         http_response_code(200);
    //         $errors[] = 0;
    //     }
    //     else{
    //         http_response_code(500);
    //         $errors[] = 2;
    //     }

    //     echo json_encode($errors);
    // }