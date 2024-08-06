<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
        
    <form action = "day2.php" method = "post">
        <label> Enter Your First Name:  </label><br>
       <input type = "text"  name = "Firstname"><br> 
       <label> Enter Your Last Name:  </label><br>
       <input type = "text"  name = "Lastname"><br>
       <label> Enter Your email:  </label><br>
       <input type = "email"  name = "email"><br> 
       <label> Enter Your phone number:  </label><br>
       <input type = "number"  name = "number"><br> 
       <label> Enter Your Address:  </label><br>
       <input type = "text"  name = "Address"><br> 
        select your gender:  <br>
       <input type="radio" id="female" name="gender" value="female">
       <label for="female">Female</label><br>
       <input type="radio" id="male" name="gender" value="male">
       <label for="male">Male</label><br>
       <input type="submit" name="submit" value="Submit">
       </form>
    <?php  
    if($_SERVER['REQUEST_METHOD'] == "post"){
        if(isset($_POST['submit']))
        echo "Your fist name is"." ".$_POST["Firstname" ]. " " ."," ;
        echo "Your last name is"." ".$_POST["Lastname" ]. " " ."," ;
        echo "Your email is"." ".$_POST["email" ]. " " ."," ;
        echo "Your phone number is"." ".$_POST["number" ]. " " ."," ;
        echo "Your address is"." ".$_POST["Address" ]. " " ."and" ;
        echo "your gender is" . " ".  $_POST["gender"]  ;
    }
     ?>
</body>
</html>