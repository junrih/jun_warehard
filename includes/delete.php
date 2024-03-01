<?php
// Connect to your database (Assuming you are using MySQL, adjust accordingly)
$name = $_POST['name'];
$email = $_POST['email'];


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the item ID from the URL
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    // Delete the item from the database
    $sql = "DELETE FROM items WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
