<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day 4 challenge</title>
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
    margin-top: 40px;
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


</style>
</head>
<body>
    <form action = "day4.php" method = "post">
        <label for = "username"> Enter your user name: </label>
        <input type = "text" id = "username" name = "username" >
        <label for = "email"> Enter your Email: </label>
        <input type = "email" id = "email" name = "email" >
        <label for = "password"> Enter your Password: </label>
        <input type = "password" id = "password" name = "password" >
        <input type = "submit" name = "submit"  value= "Login">
         </form>

<?php
 
$username = "";

 if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];



    $username = filter_input(INPUT_POST, "username" , 
                               FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email" ,  FILTER_SANITIZE_EMAIL);
    $email = filter_input(INPUT_POST, "email" ,  FILTER_VALIDATE_EMAIL);

    if(empty($username) || empty($email) || empty($password)){
        echo "<p> please enter all of the redentials </p>";
    }
    $usernamelenght = strlen($username); 
    $passwordlenght = strlen($password);
    ctype_upper($password) = false;
    ctype_lower($password) = false;

    if($usernamelenght <= 5 || $usernamelenght >= 16){
        echo "invalid username lenght. Please the number of characters should not be less than 5 and more than 15";
    }
    elseif(($username == trim($username) && strpos(($username) , ' '))){
        echo "there should be no spaces in the user name. replace them with an underscore";
    }
    elseif()


    

    else{
        echo " <p> login successful </p>";
            echo  "Name {$_POST['username']} <br> ";
    }
 }
 

?>
</body>
</html>