<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>day 3</title>
    <style>

    body{
        background-color: white;
        margin:100px;
        padding: 0px;
        display: flex;
        justify-content:center;
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
    }
    input[type="submit"]:active{
        background-color:blue;
        color:white;
    }
    p{
        margin-top:600px;
        z-index: 2;
    }


    </style>
</head>
<body>
    <form action="day3.php" method="post">
        <legend>Advanced Calculator</legend>
        <label for=" firstnumber" > Enter the first number: </label>
        <input type=" number" id="firstnumber" name="firstnumber">
        <label for=" secondnumber" > Enter the second number: </label>
        <input type=" number" id="secondnumber" name="secondnumber">
        <h3>select your operator</h3>
       

        <select name="operator" id="operator">
            <option value="+">Addition</option>
            <option value="-">Subtraction</option>
            <option value="*">Multiplication</option>
            <option value="/">Division</option>
            <option value="^">exponential</option>
            <option value="sqrt">squareroot</option>
        </select>

        <input type="submit" name="submit" value="Calculate">



    </form>
    <?php 

    $num_1 = $_POST["firstnumber"];
    $num_2 = $_POST["secondnumber"];
    $addition = null;
    $subtraction = null;
    $multiplication = null;
    $division = null;
    $modulus = null;
    $exponential =null;
    $SquareRoot= null;
    
    
    
    
    $addition = $num_1 + $num_2;
    $subtraction = $num_2 - $num_1;
    $multiplication = $num_1 * $num_2;
    $modulus = $num_1 % $num_2;
    $exponential = pow($num_1,$num_2);
    $SquareRoot= sqrt($num_1);
    $division = $num_1 / $num_2;
    
    
    $operator = $_POST['operator'];
    echo $operator; 
    
    
    if(isset($_POST['submit'])){
        switch ($operator){
            case "+":
                echo " <p> Result = {$addition}</p>";
                break;
        
            case "-":
                echo " <p> Result = {$subtraction}</p>";
                break;
            case "*":
                echo " <p> Result = {$multiplication}</p>";
                break;
        
            case "/":
                echo " <p> Result = { $division}</p>";
                break;
        
            case "%":
                echo " <p> Result = { $modulus}</p>";
                break;
            case "^":
                echo " <p> Result = { $exponential}</p>";
                break;
        
            case "sqrt":
                echo " <p> Result = {$SquareRoot}  for {$num_1}</p>" ;
                break;
        }
    }
    
    if ($num_1 ==0){
    echo "division is invalid use a number greater than 0";
    }
    ?>
</body>
</html>
