<?php 
    session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day5</title>
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