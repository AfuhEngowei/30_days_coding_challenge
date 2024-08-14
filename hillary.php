<?php
// Start the session
session_start();
$name = "";
$deadline = "";
$name = $_POST["name"];
$deadline = $_POST["deadline"];


// Function to display the data
function displayData() {
    if (!empty($_SESSION['formData'])) {
        echo "<h1>Stored Data</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Actions</th></tr>";
        foreach ($_SESSION['formData'] as $key => $data) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['name']) . "</td>";
            echo "<td>" . htmlspecialchars($data['email']) . "</td>";
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
        $name = $_SESSION['formData'][$id]['name'];
        $email = $_SESSION['formData'][$id]['email'];
        echo "
        <h1>Edit Data</h1>
        <form method='post' action='?action=update&id=$id'>
            <label for='name'>Name:</label>
            <input type='text' id='name' name='name' value='" . htmlspecialchars($name) . "' required>
            <br><br>
            <label for='email'>Email:</label>
            <input type='email' id='email' name='email' value='" . htmlspecialchars($email) . "' required>
            <br><br>
            <input type='submit' value='Update'>
        </form>";
        exit;
    } elseif ($action == 'update') {
        // Update the data
        $_SESSION['formData'][$id] = array('name' => $_POST['name'], 'email' => $_POST['email']);
        echo "Data updated successfully!<br>";
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['action'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Store data in session
    $_SESSION['formData'][] = array('name' => $name, 'email' => $email);

    echo "Data stored in session successfully! <br>";
}

// Display the form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling with PHP</title>
</head>
<body>
    <h1>Submit Your Data</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <?php
    // Display the stored data
    displayData();
    ?>
</body>
</html>