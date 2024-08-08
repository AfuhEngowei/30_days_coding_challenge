<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day2</title>
    <style>
            * {
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
        }
       body{background-color: white;
        
        display: block;
        justify-content:center;
        margin-left: 500px;
        align-items:center;
       }
    h3 { 

        text-align: center;
        align-content: center;
        margin-left:25px;
    }
    form{
        justify-content: center;
        padding: 20px;
        background-color: skyblue;
        box-sizing: border-box;
        border-radius: 20px;
        margin-top: 20px;
        margin-left: 100px;
        width: 500px;
        

    }
    .text label{
        margin-left:80px;
    }
    label{
        
       margin-left:80px;
    }
    input[type=submit]{
            background-color:white;
            border: none;
            color: skyblue;
            padding: 10px ;
            text-decoration: none;
            margin-left: 50px;
            cursor: pointer;
            width: 100px;
        }
    input{
            width: 280px;
            height: 40px;
            margin: 8px ;
            margin-left: 80px;
            box-sizing: border-box;
            align-items:center;
            border-radius:10px;
    }
    input[type=radio]{
        width: 20px;
        align-content: center;
    }
    h1{
        margin-bottom: 30px;

    }
    </style>
</head>
<body>
       
    <form action = "day2.php" method = "post">
    <h1 align-text="center"> Personal Information </h1>
    <div class="text" >
        <label> Enter Your First Name:  </label><br>
       <input type = "text"  name = "Firstname"><br> 
       <label> Enter Your Last Name:  </label><br>
       <input type = "text"  name = "Lastname"><br>
       <label> Enter Your email:  </label><br>
       <input type = "email"  name = "email"><br> 
       <label> Enter Your phone number:  </label><br>
       <input type = "number"  name = "number"><br> 
       <label> Enter Your Address:  </label><br>
       <input type = "text"  name = "Address"><br> </div>
        <h3>select your gender:  </h3><br>
       <input type="radio" id="female" name="gender" value="female">
       <label for="female">Female</label><br>
       <input type="radio" id="male" name="gender" value="male">
       <label for="male">Male</label><br>
       <input type="submit" name="submit" value="Submit"> 
       </form>
    <?php  
        if(isset($_POST['submit'])){
        echo " Your fist name is"." ".$_POST["Firstname" ]. " " ."," ;
        echo "Your last name is"." ".$_POST["Lastname" ]. " " ."," ;
        echo "Your email is"." ".$_POST["email" ]. " " ."," ;
        echo "Your phone number is"." ".$_POST["number" ]. " " ."," ;
        echo "Your address is"." ".$_POST["Address" ]. " " ."and". " ";
        echo "your gender is" . " ".  $_POST["gender"]  ;
    }
        else{
            echo"<p> nothing here</p>";
        }
     ?>
</body>
</html>