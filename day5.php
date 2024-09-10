<?php 
    session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day5</title>
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
    <form action = " day5.php" method = "post">
        <label for= "Guessed number"> Enter any number between 1 and 100</label>
        <input type = "number" name = "guessed_number">
        <input type="submit" name="submit" value="Guess">
        <input type="submit" name="submit" value="reset">
    </form>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $guessed_number = $_POST["guessed_number"];
        $range = rand(1,100);
        $attempts = 0;
        $play = true;
        for($i=$attempts ;$i>5; $i++){
                if(empty($guessed_number)){
                    echo " please enter a number to proceed";
                }
                elseif( $guessed_number == $range){
                    echo " congrats, you won";
                }
                else{
                    echo "opps try again";
                }
        }
        // echo "you are out of moves reset the game to continue";
    }
?>
</body>
</html>