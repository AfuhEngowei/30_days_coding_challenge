<?php
// Start the session
session_start();

// Function to display the data
function displayData() {
    if (!empty($_SESSION['formData'])) {
        echo "<h1>Stored Data</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Task</th><th>Deadline</th><th>Actions</th></tr>";
        foreach ($_SESSION['formData'] as $key => $data) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['task']) . "</td>";
            echo "<td>" . htmlspecialchars($data['deadline']) . "</td>";
            echo "<td>
                    <a href='?action=edit&id=$key'>Edit</a> |
                    <a href='?action=delete&id=$key'>Delete</a>
                 </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data stored in session.";
    }
}

// Handle CRUD actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'delete') {
        // Delete the data
        unset($_SESSION['formData'][$id]);
        echo "Data deleted successfully!<br>";
    } elseif ($action == 'edit') {
        // Edit the data
        $task = $_SESSION['formData'][$id]['task'];
        $deadline = $_SESSION['formData'][$id]['deadline'];
        echo "
        <h1>Edit Data</h1>
        <form method='post' action='?action=update&id=$id'>
            <label for='task'>Task:</label>
            <input type='text' id='task' name='task' value='" . htmlspecialchars($task) . "' required>
            <br><br>
            <label for='deadline'>Deadline:</label>
            <input type='date' id='deadline' name='deadline' value='" . htmlspecialchars($deadline) . "' required>
            <br><br>
            <input type='submit' value='Update'>
        </form>";
        exit;
    } elseif ($action == 'update') {
        // Update the data
        $_SESSION['formData'][$id] = array('task' => $_POST['task'], 'deadline' => $_POST['deadline']);
        echo "Data updated successfully!<br>";
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['action'])) {
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];

    // Store data in session
    $_SESSION['formData'][] = array('task' => $task, 'deadline' => $deadline);

    echo "Data stored in session successfully! <br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
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
   margin-right:50px;
    font-size:18px;
}
input{
    width:280px;
    height:30px;
    margin-bottom:30px ;
    
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
table, th, td {
  border: 1px solid;
}



    </style>
</head>
<body>
    
<form action = "input.php" method = "post">
        <label for = "task" > Enter task title:</label>
        <input type = " text" id = "task" name = " task"> 
        <label for = "deadline" > Enter task deadline:</label>
        <input type = "date" id = "deadline" name = "deadline"> 
        <input type = "checkbox" name = "submit"  value= "Completed">
        <input type = "submit" name = "submit"  value= "create">
    </form>
    <?php
    if (isset($_POST["submit"])){
        $result = displayData();
        header("location:http://localhost/mywebsite/challenge/dashboard.php");

    }

    ?>
</body>
</html>