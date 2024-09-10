<?php
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <style>
    body{
    background-color: white;
    margin:100px;
    padding: 0px;
    display: block;
    justify-content:center;
    margin-left: 500px;
    align-items:center;
}
form{
    width: 300px;
    height: 300px;
    padding: 20px;
    background-color: skyblue;
    border-radius: 20px;
    margin-top:100px;
    z-index: 1;
    justify-content:center;


}
legend{
    text-align: center;
    font-size:30px;
    margin-bottom:  20px;
    letter-spacing: 0.5px;
}
label{
    display:block;
    margin-bottom:5px;
    margin-top:10px;
    font-size:18px;
}
input{
    width:280px;
    height:30px;
    border-radius:10px;
}
h3{
    font-size:20px;
}
select{
    margin-bottom: 10px;

}
input[type="submit"]{
    font-size:18px;
    margin-top: 20px;
    width : 100px;
    margin-left: 100px

}
input[type="submit"]:active{
    background-color:blue;
    color:white;
}
p{
    margin-top:20px;
    z-index: 2;
    font-size: 20px;
}
textarea{
    margin-top:10px;
    }
    h4{
        color: red;
    }
</style>
</head>
<body>
    <form action="" method="post">
        <label for="name">Enter your full name </label>
        <input type="text" id="name" name="name">
        <label for="email">Enter a valid email</label>
        <input type="email" id="email" name="email">
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="40"rows="4"></textarea>
        <input type="submit" name="send" value="Submit">
    </form>

<?php
if (isset($_POST['send'])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
//check if input fields are filled or not
    if (empty($name) || empty($email) || empty($message)){
        echo "<h4>please input all fields to continue</h4>";
    }
    // sanitize inputs
    $name = filter_input(INPUT_POST, "name" , 
                              FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,"email",
                                FILTER_SANITIZE_SPECIAL_CHARS);

    // to validate inputs
    $email = filter_input(INPUT_POST, "email" ,  
                                FILTER_VALIDATE_EMAIL);

    $sql="INSERT INTO user ( `id`, `name`, `email`, `message`) VALUES (NULL, '$name', '$email', '$message')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ashleyafuh@gmail.com';                     //SMTP username
    $mail->Password   = 'CRiE77B$IRJBwVH';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 26;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ashleyafuh@gmail.com', 'Mailer');
    $mail->addAddress($email, 'Joe User');     //Add a recipient
   
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message sent';
    $mail->Body    = 'your message has been sent</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }
}
?>
</body>
</html>